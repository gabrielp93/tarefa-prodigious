@extends('adminlte::page')

@section('title', 'TarefaBank - Trocar de Senha')

@section('content_header')


<h1><strong>Trocar de Senha</strong></h1>

<ol class="breadcrumb">
    <li><a href="{{route('admin.home')}}">Home</a></li>
    <li><a href="{{route('profile.changepwd')}}">Mudar Senha</a></li>
</ol>
@stop

@section('content')
    <div class="box box-success">

            
 
    <form  method="POST" action="{{route('changepwd.store')}}" > 
        {{ csrf_field() }}
        <div class="box-body">
            @include('admin.include.messages')
            <div class="form-group">
                <label for="id_pwd1">Nova Senha</label>
                <input type="password" class="form-control" name="pwd1" id="id_pwd1" pattern=".{8,}" title="Mínimo de 8 caracteres" placeholder="Nova Senha">
            </div>
          <div class="form-group">
            <label for="id_pwd2">Repetir a Senha</label>
            <input type="password" class="form-control" name="pwd2" id="id_pwd2" pattern=".{8,}" title="Mínimo de 8 caracteres" placeholder="Confirmar Senha">
          </div>
        </div>
        <!-- /.box-body -->

        <div class="box-footer">
          <button type="submit" class="btn btn-success">Confirmar</button>
        </div>
    </form>
    </div>
@stop