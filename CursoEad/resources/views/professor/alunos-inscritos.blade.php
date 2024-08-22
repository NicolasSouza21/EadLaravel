<!-- resources/views/professor/alunos-inscritos.blade.php -->

@extends('layouts.app')

@section('title', 'Alunos Inscritos')

@section('content')
    <h1>Alunos Inscritos no Curso: {{ $curso->nome }}</h1>

    @if($alunos->isEmpty())
        <p>Não há alunos inscritos neste curso.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                @foreach($alunos as $aluno)
                    <tr>
                        <td>{{ $aluno->id }}</td>
                        <td>{{ $aluno->nome }}</td>
                        <td>{{ $aluno->email }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
