Ferramentas necess�rias:
	-Docker Desktop (https://www.docker.com/)
	-No Windows: alguma ferramenta que permita usar comandos Unix como PowerShell ou Git Bash

Clonando reposit�rio:
git clone https://github.com/gabrielp93/tarefa-prodigious.git

Clonar Laradock dentro do reposit�rio "tarefa-prodigious":
git clone https://github.com/Laradock/laradock.git laradock

Configurar o Laradock (cd laradock/):
-Primeiro criar o arquivo .env: cp env-example .env
-Copiar o arquivo "laravel_tarefa.conf" para laradock/nginx/sites

Adicionar host: (Windows - Windows\System32\drivers\etc\hosts , Unix  - etc\hosts)
- 127.0.0.1 laravel_tarefa.dev.com


Dentro do terminal Unix:
- dar cd no diret�rio laradock
	- subir os containers: docker-compose up -d nginx mysql phpmyadmin
- criar o banco de dados pelo navegador: entrar no phpmyadmin por localhost:8080
	- Servidor: mysql ou laradock_mysql_1
	- Usuario: root
	- Senha: root
- Entrar na op�ao IMPORTAR e selecionar o arquivo "create_database.txt"

- entrar no workspace: docker-compose exec workspace bash (as vezes � necess�rio utilizar a palavra "winpty" no inicio do comando)
- entrar na pasta do projeto: cd tarefa/
- criar tabelas: php artisan migrate
- criar link: php artisan storage:link


Fun��es da aplica��o:
- Cadastrar usu�rio
- Perfil do Usu�rio:
	- poss�vel trocar o nome, e-mail, carregar imagem de perfil e excluir conta;
	- mudar a senha do usu�rio;
- Op��o de Conta Corrente:
	- mostrar o saldo dispon�vel do usu�rio;
	- Depositar e Sacar: atualiza valor de saldo do usu�rio;
	- Transferir: transfere uma quantia para outro usu�rio;
		- � necess�rio saber o n�mero da conta do alvo (id da tabela users) e o e-mail.


