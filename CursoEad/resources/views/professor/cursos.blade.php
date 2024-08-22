@extends('layouts.app')

@section('title', 'Meus Cursos')

@section('content')
    <h1>Meus Cursos</h1>

    @if($cursos->isEmpty())
        <p>Você ainda não criou nenhum curso.</p>
    @else
        <div class="card-container">
            @foreach($cursos as $curso)
                <div class="card">
                    <div class="card-header">
                        <h3>{{ $curso->nome }}</h3>
                    </div>
                    <div class="card-body">
                        <p><strong>Descrição:</strong> {{ $curso->descricao }}</p>
                        <p><strong>Data de Início:</strong> {{ \Carbon\Carbon::parse($curso->data_inicio)->format('d/m/Y') }}</p>
                        <p><strong>Data de Fim:</strong> {{ \Carbon\Carbon::parse($curso->data_fim)->format('d/m/Y') }}</p>
                        <p><strong>Preço:</strong> R$ {{ number_format($curso->preco, 2, ',', '.') }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
@endsection
