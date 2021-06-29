@extends('layouts.master')
@section('title','Bem Estar - Adicionar Atendimento')
@section('subtitle','Adicionar Atendimento')


@section('content')
<div class="card">
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

        <form method="post" action="{{ route('avaliacoes.store') }}" id="formAssessments">
            <div class="row">
                <div class="col">
                    @csrf
                    <label for="client_id">Cliente:</label>
                    <select class="custom-select" name="client_id">
                        <option value="">Cliente</option>
                        @foreach($clientes as $cliente)
                        <option value="{{ $cliente->id }}">{{$cliente->nome_empresa}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col">
                    <label for="form_id">Formulário:</label>
                    <select id="forms" class="custom-select" name="form_id" id="forms" onchange="selectOnChange(this)">
                        <option value="">Formulário</option>
                        @foreach($forms as $form)
                        <option value="{{ $form->id }}">{{$form->nome_formulario}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col">
                    <label for="data_inicio">Data:</label>
                    <input type="date" class="form-control" name="data_inicio" />
                </div>
            </div>
            <div class="row mt-4 d-flex justify-content-center">

                <b>Itens do formulário</b>
            </div>
            <div class="row mt-4 d-flex justify-content-center">
                <div class="col" style="display: flex; justify-content: center;">
                    <ol id="questions" style="padding: 0;">

                    </ol>

                </div>
            </div>

            <br>
            <div class="row d-flex justify-content-center">
                <button class="btn btn-primary mr-4">
                <a href="{{ URL::route('avaliacoes.index') }}" style="color: white;">
                Salvar e sair
                </a>
                 </button>
                <button type="submit" class="btn btn-primary">Salvar e continuar</button>
            </div>
        </form>
    </div>
</div>

<script>

    const selectOnChange = (select = new HTMLSelectElement()) => {
        const questions = document.querySelector('#questions');
        const lis = document.querySelectorAll('#questions li');
        
        // Pegando todos os formulários
        const {
            value
        } = select
        const forms = <?php echo json_encode($forms); ?>;

        // Filtrando o formulário ativo
        const {
            quest_form
        } = forms.filter(form => String(form.id) === String(value))[0]

        // Removendo linhas existentes caso tenha
        if (lis.length) lis.forEach(li => li.remove())

        // Adicionando linha na tag <ol/>
        quest_form.forEach(quest => {
            const li = document.createElement('li')
            li.innerText = quest.quest
            questions.appendChild(li)
        })
    }
</script>
@endsection 