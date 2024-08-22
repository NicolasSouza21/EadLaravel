<!-- resources/views/aluno/dashboard.blade.php -->

@extends('layouts.app')

@section('title', 'Dashboard Aluno')

@section('content')
<div class="container">
    <h1>Bem-vindo, {{ $aluno->name }}</h1>
    <p>Seu email: {{ $aluno->email }}</p>

    <!-- Adicione mais informações e funcionalidades específicas para o aluno aqui -->

</div>
@endsection
