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
                    <td>{{$clientes->nome_responsavel}}</td>
                </tr>
                <tr>
                    <td>CNPJ:</td>
                    <td>{{$clientes->cnpj}}</td>
                    <td>Responsável:</td>
                    <td>{{$cliente->nome_responsavel}}</td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td>{{$cliente->email}}</td>
                    <td>Celular:</td>
                    <td>{{$clientes->celular}}</td>
                </tr>
                
                <tr>
                    <td colspan="4" style="text-align: center;">Avaliações</td>
                </tr>
                <tr>
                    <td>#</td>
                    <td>Proposta feita em</td>
                    <td>Total R$</td>
                    <td>Status</td>
                </tr>
              
                <tr>
                    <td><a href="#">id1</a></td>
                    <td>26/05/2020</td>
                    <td>1000</td>
                    <td>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection