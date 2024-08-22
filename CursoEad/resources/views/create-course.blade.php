@extends('layouts.app')

@section('title', 'Criar Curso')

@section('content')
<link rel="stylesheet" href="{{ asset('css/curso.css') }}">

    <h1>Criar Novo Curso</h1>

    <form action="{{ route('cursos.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nome">Nome do Curso:</label>
            <input type="text" id="nome" name="nome" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="descricao">Descrição:</label>
            <textarea id="descricao" name="descricao" class="form-control" rows="4" required></textarea>
        </div>

        <div class="form-group">
            <label for="data_inicio">Data de Início:</label>
            <input type="date" id="data_inicio" name="data_inicio" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="data_fim">Data de Fim:</label>
            <input type="date" id="data_fim" name="data_fim" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="preco">Preço:</label>
            <input type="number" id="preco" name="preco" class="form-control" step="0.01" required>
        </div>

        <button type="submit" class="btn-main">Criar Curso</button>
    </form>
@endsection
