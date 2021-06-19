@extends('layouts.master')
@section('title','Detalhes do cliente')

@section('content')
<div class="card">
    <div class="card-header bg-dark">
        Detalhes do cliente
    </div>
    <div class="card-body">
        <table class="table">
            <tbody>
                <tr>
                    <td>Nome do cliente:</td>
                    <td>{{$clientes->nome_empresa}}</td>
                </tr>
                <tr>
                    <td>CNPJ:</td>
                    <td>{{$clientes->cnpj}}</td>
                    <td>Responsável:</td>
                    <td>{{$clientes->nome_responsavel}}</td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td>{{$clientes->email}}</td>
                    <td>Celular:</td>
                    <td>{{$clientes->celular}}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection