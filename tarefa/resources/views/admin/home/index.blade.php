@extends('adminlte::page')

@section('title', 'TarefaBank - Painel')

@section('content_header')

<style>
        .fill {
            width: 200px;
            height: 200px;
            border: #00a65a solid 2px;
            background-image:url('../storage/users/{{auth()->user()->photo_profile}}');
            background-position: 50% 50%;
            margin: auto;
            margin-top: 10px; 
            border-radius: 50%;
            background-size: cover;
            background-repeat: no-repeat;
        }

        .blank {
            width: 200px;
            height: 200px;
            border: #00a65a solid 2px;
            background-image:url('../storage/users/blank-profile.png');
            background-position: 50% 50%;
            margin: auto;
            margin-top: 10px; 
            border-radius: 50%;
            background-size: cover;
            background-repeat: no-repeat;
        }

</style>
<h1>Bem-vindo(a) {{$name}}</h1>

<ol class="breadcrumb">
    <li><a href="{{route('admin.home')}}">Home</a></li>
</ol>
@stop

@section('content')
    <p>Você está <i>logado(a)!</i></p>
    @if (auth()->user()->photo_profile != null)
    <div class="fill"></div>
    @else
    <div class="blank"></div>
    @endif
@stop