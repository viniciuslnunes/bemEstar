@extends('layouts.master')
@section('title','Editar Atendimento')
@section('subtitle','Editar Atendimento')


@section('content')
<div class="card">
    <div class="card-body">
        <div>
            <p>Nome do Cliente:</p>
            <select class="custom-select" name="client_id">
                @foreach($clientes as $cliente)
                    <option {{ $cliente->id === $assessment->client->id ? 'selected' : '' }} value="{{ $cliente->id }}">{{$cliente->nome_empresa}}</option>
                @endforeach
            </select>
            <p>Data de inicio: {{ date('d/m/Y', strtotime($assessment->data_inicio)) }}</p>
        </div>
        <table class="table">
            <tbody>
                @if (count($assessment->form->questForm) > 0)
                    <tr>
                        <td>Pergunta</td>
                        <td>Nota</td>
                        <td>Resposta</td>
                        <td>Imagem</td>
                    </tr>
                    @foreach ($assessment->form->questForm as $i => $question)
                        <tr>
                            <td>{{ $i + 1 }} - {{ $question->quest }}</td>
                            @if ($question->answer)
                                <td>
                                    <input type="text" name="nota" value="{{ $question->answer->nota }}">
                                </td>
                                <td>
                                    <textarea name="answer" cols="30" rows="5">{{ $question->answer->answer }}</textarea>
                                </td>
                                @if (count($question->answer->images) > 0)
                                    <td>
                                        @foreach ($question->answer->images as  $image)
                                            <div id="images" style="display: flex;">
                                                <img src="{{ asset('storage/img-avaliacoes/' . $image->image) }}" style="width: 100px;">
                                            </div>
                                            <div class="row">
                                                <input id="add" type="file" multiple>
                                                &nbsp;
                                                <p id="delete" style="cursor: pointer; color: red;">Deletar</p>
                                            </div>
                                        @endforeach
                                    </td>
                                @else
                                    <td>
                                        Sem imagem
                                    </td>
                                @endif
                            @else
                                <td>
                                    <td>
                                        <td>
                                            Não há respostas
                                        </td>
                                    </td>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td>
                            Não há perguntas cadastradas
                        </td>
                    </tr>
                @endif

            </tbody>
        </table>
    </div>
</div>

<script>
    const add = document.getElementById('add');
    add.addEventListener('change', (event) => addNewImage(event));

    function addNewImage(event) {
        const url = window.URL.createObjectURL(event.target.files[0]);
        const link = document.createElement('img');
        link.src = url;

        const imageDiv = document.getElementById('images');
        imageDiv.appendChild(link);
    }
</script>

@endsection