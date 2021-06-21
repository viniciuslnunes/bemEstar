@extends('layouts.master')
@section('title','Adicionar proposta')

@section('content')
<div class="card">
    <div class="card-header bg-dark">
        Adicionar avaliação
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

        <form method="post" action="{{ route('avaliacoes.store') }}">
            <div class="row">
                <div class="col">
                    @csrf
                    <label for="client_id">Cliente:</label>
                    <select class="custom-select" name="client_id">
                        @foreach($clientes as $cliente)
                            <option value="{{ $cliente->id }}">{{$cliente->nome_empresa}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col">
                    <label for="form_id">Formulário:</label>
                    <select id="forms" class="custom-select" name="form_id" id="forms">
                        @foreach($forms as $form)
                            <option value="{{ $form->id }}">{{$form->nome_formulario}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col">
                    <label for="data_parcelas">Data:</label>
                    <input type="date" class="form-control" name="data_parcelas" />
                </div>
            </div>
            <div class="row mt-4 d-flex justify-content-center">

            <b>Itens do formulário</b>
            </div>
            <div class="row mt-4 d-flex justify-content-center">
                <div class="col" style="display: flex; justify-content: center;">
                    <ol id="questions" style="padding: 0;">
                    <ol>
                </div>
            </div>

            <br>
            <div class="row d-flex justify-content-center">
            <button type="submit" class="btn btn-primary mr-4">Salvar e sair </button>
            <button type="submit" class="btn btn-primary">Salvar e continuar</button>
            </div>
        </form>
    </div>
</div>

<script>

    let iteration = 0;
    let appendedQuestions = [];

    const forms = document.getElementById('forms');
    const questions = document.getElementById('questions');

    forms.addEventListener('click', event => showFormQuestions(event), false);

    function showFormQuestions (event) {
        let selectedForm = JSON.parse(event.target.value);

        if (iteration > 0) {
            appendedQuestions.forEach(question => {
                question.remove();
            });
        }

        selectedForm.quest_form.forEach(question => {
            let option = document.createElement('option');
            option.text = question.quest;
            option.value = question.id;

            questions.appendChild(option);

            appendedQuestions.push(option);
        });
        
        iteration++;
    }
</script>
@endsection