<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- Se você estiver usando CSS -->
</head>
<body>
    <div class="container">
        <h1>Cadastro</h1>
        <p>Escolha o tipo de conta para se registrar:</p>
        <div class="registration-options">
            <a href="{{ route('register.aluno') }}" class="btn btn-primary">Cadastrar como Aluno</a>
            <a href="{{ route('register.professor') }}" class="btn btn-secondary">Cadastrar como Professor</a>
        </div>
    </div>

    <!-- Adicione o seu CSS ou qualquer outro conteúdo necessário -->
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            background-color: #f4f4f4;
        }
        .container {
            text-align: center;
        }
        .registration-options {
            margin-top: 20px;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            margin: 5px;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
        }
        .btn-primary {
            background-color: #007bff;
        }
        .btn-secondary {
            background-color: #6c757d;
        }
        .btn-primary:hover, .btn-secondary:hover {
            opacity: 0.8;
        }
    </style>
</body>
</html>
