@extends('layouts.app')

@section('title', 'Editar Curso')

@section('content')
    <h1>Editar Curso</h1>

    <form action="{{ route('cursos.update', $curso->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nome">Nome do Curso:</label>
            <input type="text" id="nome" name="nome" class="form-control" value="{{ $curso->nome }}" required>
        </div>

        <div class="form-group">
            <label for="descricao">Descrição:</label>
            <textarea id="descricao" name="descricao" class="form-control" required>{{ $curso->descricao }}</textarea>
        </div>

        <div class="form-group">
            <label for="data_inicio">Data de Início:</label>
            <input type="date" id="data_inicio" name="data_inicio" class="form-control" value="{{ $curso->data_inicio }}" required>
        </div>

        <div class="form-group">
            <label for="data_fim">Data de Fim:</label>
            <input type="date" id="data_fim" name="data_fim" class="form-control" value="{{ $curso->data_fim }}" required>
        </div>

        <div class="form-group">
            <label for="preco">Preço:</label>
            <input type="number" id="preco" name="preco" class="form-control" value="{{ $curso->preco }}" step="0.01" required>
        </div>

        <button type="submit" class="btn-main">Atualizar Curso</button>
    </form>
@endsection
