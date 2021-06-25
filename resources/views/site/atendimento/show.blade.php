@extends('layouts.master')
@section('title','Detalhes do atendimento')

@section('content')
<div class="card">
    <div class="card-header bg-dark">
        Detalhes do atendimento
    </div>
    <div class="card-body">
        <div>
            <p>Nome do Cliente: {{ $assessment->client->nome_empresa }}</p>
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
                                <td>{{ $question->answer->nota }}</td>
                                <td>{{ $question->answer->answer }}</td>
                                @if (count($question->answer->images) > 0)
                                    <td>
                                        @foreach ($question->answer->images as $image)
                                            <img src="{{ asset('storage/img-avaliacoes/' . $image->image) }}" style="width: 100px;">
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
@endsection