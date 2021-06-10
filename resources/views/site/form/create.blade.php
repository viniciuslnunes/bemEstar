@extends('layouts.master')
@section('content')
<div class="card">
    <div class="card-header bg-dark">
        Adicionar formulário
    </div>
    <div class="card-body">

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form method="POST" action="{{ route('site.formularios.store') }}">
        @csrf
            <div class="row">
                <div class="col">
                
                    <label for="nome_formulario">Nome do formulário</label>
                    <input type="text" name="nome_formulario">
                    
                </div>

                <!-- ADICIONAR USER COMO CRIADOR DO FORM -->

                <!-- <div class="col">
                    <label for="cpf">CNPJ:</label>
                    <input type="text" class="form-control" name="cnpj" />
                </div> -->
            </div>
        <div class="inputs">
        <label for="">questões</label>
            <input name="quest[]" type="text" id="input_quest"/>
            
            <button onclick="createInput()">+</button>
        </div>        
        <button type="submit" class="btn btn-primary">Adicionar formulário</button>
        </form>
    </div>
</div>
@endsection