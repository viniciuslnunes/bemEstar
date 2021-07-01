@extends('layouts.master')
@section('title','Editar Atendimento')
@section('subtitle','Editar Atendimento')


@section('content')
<div class="card">
    <div class="card-body">
        <div id="app">
            <app-edit-questions
                :assessment-data="'{{ $assessment ? $assessment->toJson() : '{}' }}'"
                :clientes-data="'{{ $clientes ? $clientes->toJson() : '{}' }}'"
            />
        </div>
    </div>
</div>

@endsection