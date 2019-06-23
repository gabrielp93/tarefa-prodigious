@extends('adminlte::page')

@section('title', 'TarefaBank - Depósito')

@section('content_header')

<h1>Depósito</h1>

<ol class="breadcrumb">
        <li><a href="{{route('admin.home')}}">Home</a></li>
        <li><a href="{{route('admin.balance')}}">Saldo</a></li>
        <li><a href="{{route('balance.deposit')}}">Depósito</a></li>
</ol>
@stop

@section('content')

<form method="POST" action="{{route('deposit.insert')}}">
    {{ csrf_field() }}
    <div class="form-group">
            <input type="number" name="amount" placeholder="Valor do Depósito" min='0' step='.01' required class="form-control">   
    </div>
    <div class="form-group">
            <button type="submit" class="btn btn-primary">Depositar</button>
    </div>
    @include('admin.include.messages')
    
</form>

@stop