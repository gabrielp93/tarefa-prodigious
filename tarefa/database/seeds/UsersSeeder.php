<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //inserir usuario no db
        User::create([
            'name'     => 'João Souza',
            'email'    => 'johns@tarefa.com',
            'password' => bcrypt('joao12345'),
        ]);
    }
}
