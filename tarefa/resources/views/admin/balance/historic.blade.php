@extends('adminlte::page')

@section('title', 'TarefaBank - Extrato')

@section('content_header')

<h1>Extrato</h1>

<ol class="breadcrumb">
        <li><a href="{{route('admin.home')}}">Home</a></li>
        <li><a href="{{route('admin.historic')}}">Extrato</a></li>
</ol>
@stop

@section('content')
<div class="box box-success">
        <div class="box-header">
                <form method="POST" action="{{route('historic.search')}}">
                {{ csrf_field() }} <!-- obrigado para metodo post -->
                        <div class="form-group row">
                                <div class="col-xs-2">
                                        <label for="date_id"> Filtro por Data: </label> 
                                        <input type="date" name="date" id='date_id' class="form-control"> 
                                </div>
                                <div class="col-xs-2">
                                        <label for="type_id"> Filtro por Tipo: </label>
                                        <select name="type" id='type_id' class="form-control">
                                                <option value="">Selecione Tipo</option>
                                                @foreach ($types as $key => $type)
                                                        <option value="{{$key}}">{{$type}}</option>
                                                @endforeach
                                        </select>
                                </div>
                        </div> 
                        <button type="submit" class="btn btn-primary">Pesquisar</a> 
                </form>
        </div>
        <div class="box-body">

                <table class="table table-hover">
                        <thead>
                                <tr class="success">
                                        <th>Valor</th>
                                        <th>Tipo</th>
                                        <th>Data</th>
                                        <th>Destinatário</th>
                                </tr>
                        </thead>
                        <tbody>
                                @foreach ($extracts as $extract)
                                        <tr>
                                                <td>R$ {{number_format($extract->amount,2,',','')}}</td>
                                                <td>{{$extract->typeFormat($extract->type)}}</td>
                                                <td>{{date("d/m/Y (H:i:s)",strtotime($extract->created_at))}}</td>
                                                <td>
                                                        @if ($extract->user_id_trans)
                                                                {{$extract->userTransfer->name}}    
                                                        @else
                                                                -
                                                        @endif
                                                        
                                                </td>
                                        </tr>
                                @endforeach

                        </tbody>
                </table>
                @if (isset($allFilterData))
                        {{ $extracts->appends($allFilterData)->links() }} <!-- paginacao com filtro --> 
                @else
                        {{ $extracts->links() }} <!-- paginacao --> 
                @endif

                
        </div>

</div>


@stop