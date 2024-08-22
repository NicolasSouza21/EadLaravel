<!-- resources/views/professor/dashboard.blade.php -->

@extends('layouts.app') <!-- Ou outro layout que você estiver usando -->

@section('content')
<div class="container">
    <h1>Bem-vindo, {{ $professor->name }}</h1>
    <p>Seu email: {{ $professor->email }}</p>

    <!-- Adicione mais informações e funcionalidades específicas para o professor aqui -->

</div>
@endsection
