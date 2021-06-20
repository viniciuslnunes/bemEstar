@extends('layouts.master')
@section('title','Detalhes do cliente')

@section('content')
<div class="card">
    <div class="card-header bg-dark">
        Detalhes do formulário
    </div>
    <div class="card-body">
        <table class="table">
            <tbody>
                <tr>
                    <td>Nome do formulário: {{$forms->nome_formulario}}</td>
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
                <ol>
        </div>
    </div>
</div>

<script>
    let iteration = 0;
    let appendedQuestions = [];

    const forms = document.getElementById('forms');
    const questions = document.getElementById('questions');

    forms.addEventListener('click', event => showFormQuestions(event), false);

    function showFormQuestions(event) {
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