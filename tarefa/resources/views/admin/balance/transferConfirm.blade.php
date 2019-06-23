@extends('adminlte::page')

@section('title', 'TarefaBank - Confirmação')

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

<div class="box">
    <div class="box-header">
    <p>Transferência será realizada para o Usuário <strong>{{$receiver->name}}</strong></p>
    <p>Saldo Disponível: <strong>R$ {{number_format($balance,'2')}}</strong></p>
    </div>    

    <div class="box-body">
        <form method="POST" action="{{route('transfer.confirm')}}">
            {{ csrf_field() }}

            <input type="hidden" name="receiverId" value="{{$receiver->id}}">

            <div class="form-group row">
                <div class="col-xs-2">
                    <input type="number" name="amount" placeholder="Valor da Transferência" min='0' step='.01' required class="form-control"> 
                </div>          
            </div>
            <div class="form-group">
                    <button type="submit" class="btn btn-warning">Confirma</button>
            </div>
            @include('admin.include.messages') 
            
        </form>
    </div>

</div>

@stop