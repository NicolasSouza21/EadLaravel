<!-- resources/views/aluno/meus-cursos.blade.php -->

@extends('layouts.app') <!-- Altere conforme o layout utilizado -->

@section('content')
    <div class="container">
        <h1>Meus Cursos</h1>

        @if($cursos->isEmpty())
            <p>Você ainda não está inscrito em nenhum curso.</p>
        @else
            <ul>
                @foreach($cursos as $curso)
                    <li>
                        <h3>{{ $curso->nome }}</h3>
                        <p>{{ $curso->descricao }}</p>
                        <p>Início: {{ $curso->data_inicio->format('d/m/Y') }}</p>
                        <p>Fim: {{ $curso->data_fim->format('d/m/Y') }}</p>
                        <p>Preço: R$ {{ number_format($curso->preco, 2, ',', '.') }}</p>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection
