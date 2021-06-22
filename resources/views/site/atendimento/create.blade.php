@extends('layouts.master')
@section('title', 'Bem estar - Iniciar atendimento')

@section('content')
<div class="card">
    <div class="card-header bg-dark">
        {{ $client->nome_empresa }}
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

        <form method="POST" enctype="multipart/form-data" action="{{ route('atendimento.store') }}">
        @csrf
        	@foreach($questions as $question)
        	<div class="row">
        		<div class="col-lg-12">
        			<legend>{{ $loop->iteration }} - {{ $question->quest }}</legend>
        		</div>
        		
        	</div>
            <div class="row">
            	<div class="col-lg-12">
                    <label for="nota">Nota</label>
                    <input type="text" class="form-control" name="assessments_create[{{ $loop->iteration }}][nota]" />
                </div>
                    <input type="hidden" class="form-control" name="assessments_create[{{$loop->iteration}}][quest_id]" value="{{$question->id}}"/>
                <div class="col-lg-12">
                    <label for="answer">Observações</label>
                    <input type="text" class="form-control" name="assessments_create[{{$loop->iteration}}][answer]" />
                </div>
                <div class="col-lg-12">
                    <label for="image">Imagem</label>
                    <input type="file" id="image" class="form-control" name="assessments_create[{{$loop->iteration}}][image]" />
                </div>
            </div>
            @endforeach
            <div class="row">
            	<div class="col-lg-12">
            		<button type="submit" class="btn btn-primary">Salvar</button>
            	</div>
            	
            </div>
            
        </form>
    </div>
</div>
@endsection