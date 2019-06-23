@extends('adminlte::page')

@section('title', 'TarefaBank - Transferência')

@section('content_header')

<style>

    .form-control{
        display: inline-block;
    }

</style>

<h1>Transferência</h1>

<ol class="breadcrumb">
    <li><a href="{{route('admin.home')}}">Home</a></li>
    <li><a href="{{route('admin.balance')}}">Saldo</a></li>
    <li><a href="{{route('balance.transfer')}}">Transferência</a></li>
</ol>
@stop

@section('content')

<form method="POST" action="{{route('transfer.store')}}">
    {{ csrf_field() }}
    <div class="form-group row">
        <div class="col-xs-2">
            <input type="number" name="account" placeholder="Número da Conta" min='0' required class="form-control"> 
        </div>
        <div class="col-xs-2">
            <input type="email" name="emailDest" placeholder="E-mail do Destinatário" min='0' required class="form-control"> 
        </div>
              
    </div>
    <div class="form-group">
            <button type="submit" class="btn btn-warning">Confirma</button>
    </div>
    @include('admin.include.messages') 
    
</form>

@stop