@extends('layouts.app')

@section('title', 'Cursos Disponíveis')

@section('content')
    <h1>Cursos Disponíveis</h1>

    @if($cursos->isEmpty())
        <p>Não há cursos disponíveis no momento.</p>
    @else
        <div class="cursos-lista">
            @foreach($cursos as $curso)
                <div class="card-curso">
                    <h2>{{ $curso->nome }}</h2>
                    <p>{{ $curso->descricao }}</p>
                    <p><strong>Início:</strong> {{ \Carbon\Carbon::parse($curso->data_inicio)->format('d/m/Y') }}</p>
                    <p><strong>Fim:</strong> {{ \Carbon\Carbon::parse($curso->data_fim)->format('d/m/Y') }}</p>
                    <p><strong>Preço:</strong> R$ {{ number_format($curso->preco, 2, ',', '.') }}</p>
                    <form action="{{ route('aluno.inscrever', $curso->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn-main">Inscrever-se</button>
                    </form>
                </div>
            @endforeach
        </div>
    @endif
@endsection
