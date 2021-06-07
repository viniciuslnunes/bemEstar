@extends('layouts.site')
@section('header')
            <h1>Adicionar Cliente</h1>
        @endsection
@section('content')
                <form method="post">
                @csrf
                <div class="form-group">
                <label for="nome">Nome</label>
                    <input type="text" class="form-control" name="nome" id="nome">

                </div>
                <button class="btn btn-primary">Adicionar</button>
                </form>
@endsection