@extends('layouts.app')

@section('title', 'Bem-vindo à Plataforma de Cursos Online')

@section('content')
<div class="container">
    <h1>Bem-vindo à Plataforma de Cursos Online</h1>
    <div class="buttons">
        <a href="{{ route('login.aluno') }}" class="btn btn-primary">Login como Aluno</a>
        <a href="{{ route('login.professor') }}" class="btn btn-primary">Login como Professor</a>
        <a href="{{ route('register') }}" class="btn btn-secondary">Cadastrar-se</a>
    </div>
</div>
@endsection
