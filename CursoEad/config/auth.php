<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Authentication Guard
    |--------------------------------------------------------------------------
    |
    | Este guard é o padrão para todas as autenticações. Você pode alterar isso
    | para usar um guard diferente como padrão.
    |
    */

    'defaults' => [
        'guard' => 'web', // O guard padrão para autenticação geral
        'passwords' => 'users', // O provider para recuperação de senha
    ],

    /*
    |--------------------------------------------------------------------------
    | Guards de Autenticação
    |--------------------------------------------------------------------------
    |
    | Aqui você pode definir todos os guards de autenticação para sua aplicação.
    | Um guard define como os usuários são autenticados para cada requisição.
    |
    */

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],

        'professor' => [
            'driver' => 'session',
            'provider' => 'professores',
        ],

        'aluno' => [
            'driver' => 'session',
            'provider' => 'alunos',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Providers de Usuários
    |--------------------------------------------------------------------------
    |
    | Todos os providers de usuários definidos para os guards. Providers
    | especificam como os usuários são realmente recuperados do banco de dados.
    |
    */

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
        ],

        'professores' => [
            'driver' => 'eloquent',
            'model' => App\Models\Professor::class,
        ],

        'alunos' => [
            'driver' => 'eloquent',
            'model' => App\Models\Aluno::class,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Password Reset Configurations
    |--------------------------------------------------------------------------
    |
    | Aqui você pode definir as configurações de recuperação de senha.
    | A configuração inclui o provedor e a tabela de recuperação.
    |
    */

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],

        'professores' => [
            'provider' => 'professores',
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],

        'alunos' => [
            'provider' => 'alunos',
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Password Confirmation Timeout
    |--------------------------------------------------------------------------
    |
    | O tempo de espera antes de exigir uma nova confirmação de senha após
    | uma operação sensível.
    |
    */

    'password_timeout' => 10800,

];
