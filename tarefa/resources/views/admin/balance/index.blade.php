@extends('adminlte::page')

@section('title', 'TarefaBank - Saldo')

@section('content_header')
    
  <style>
    div#operacoes{
      padding: 10px;
    }
  </style>

  <h1>Bem-vindo(a) {{$name}}!</h1>

  <ol class="breadcrumb">
    <li><a href="{{route('admin.home')}}">Home</a></li>
    <li><a href="{{route('admin.balance')}}">Saldo</a></li>
  </ol>
@stop

@section('content')
    <div class="small-box bg-green">
      <div class="inner">
        <h3>R$ {{number_format($balance, 2,',','')}}</h3>
      </div>
      <div class="icon">
        <i class="ion ion-stats-bars"></i>
      </div>
        <a href="{{route('admin.historic')}}" class="small-box-footer">Extrato <i class="fa fa-arrow-circle-right"></i></a>
    </div>
    <div id="operacoes">
      @if ($balance > 0)
        <a href="{{route('balance.transfer')}}" class="btn btn-warning">Transferir</a> 
      @endif
      <a href="{{route('balance.deposit')}}" class="btn btn-primary">Depositar</a>
      @if ($balance > 0)
        <a href="{{route('balance.draw')}}" class="btn btn-danger">Sacar</a>
      @endif
    </div>

    @include('admin.include.messages')

    

@stop