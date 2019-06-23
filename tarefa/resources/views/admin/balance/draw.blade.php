@extends('adminlte::page')

@section('title', 'TarefaBank - Saque')

@section('content_header')

<h1>Saque</h1>

<ol class="breadcrumb">
        <li><a href="{{route('admin.home')}}">Home</a></li>
        <li><a href="{{route('admin.balance')}}">Saldo</a></li>
        <li><a href="{{route('balance.draw')}}">Saque</a></li>
</ol>
@stop

@section('content')

<form method="POST" action="{{route('draw.store')}}">
    {{ csrf_field() }}
    <div class="form-group">
            <input type="number" name="amount" placeholder="Valor do Saque" min='0' step='.01' required class="form-control">       
    </div>
    <div class="form-group">
            <button type="submit" class="btn btn-danger">Sacar</button>
    </div>
    @include('admin.include.messages')  
</form>

@stop