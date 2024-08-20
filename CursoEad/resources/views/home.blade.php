<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plataforma de Cursos Online</title>
    <link rel="stylesheet" href="{{ asset('public/css/app.css') }}"> <!-- Se você estiver usando CSS -->
</head>
<body>
    <div class="container">
        <h1>Bem-vindo à Plataforma de Cursos Online</h1>
        <div class="buttons">
            <a href="{{ route('login.aluno') }}" class="btn btn-primary">Login como Aluno</a>
            <a href="{{ route('login.professor') }}" class="btn btn-primary">Login como Professor</a>
            <a href="{{ route('register') }}" class="btn btn-secondary">Cadastrar-se</a>
        </div>
    </div>
</body>
</html>
