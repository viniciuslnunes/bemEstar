@extends('layouts.master')
@section('title','Detalhes do atendimento')

@section('content')
@section('subtitle','Detalhes do Formulário')

<div class="card">
    <div class="card-body" style="min-height: 20px !important;">
        <table class="table">
            <tbody>
                <tr>
                    <td>Nome do formulário: <b>{{$forms->nome_formulario}}</b></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="row d-flex justify-content-center">
        <b>Itens do formulário</b>
    </div>
    <div class="row mt-4 d-flex justify-content-center">
        <div class="col" style="display: flex; justify-content: center;">
            <ol id="questions" style="padding: 0;">
                @foreach($forms->questForm as $quest)
                <li>{{$quest->quest}}</li>
                @endforeach
            </ol>
        </div>
    </div>
</div>

@endsection