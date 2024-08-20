<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfessorController;
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegistrationController;

// Rota para a página inicial
Route::get('/', [HomeController::class, 'index'])->name('home');

// Rotas para autenticação
Route::get('login/aluno', function () {
    return view('auth.login-aluno');
})->name('login.aluno');

Route::get('login/professor', function () {
    return view('auth.login-professor');
})->name('login.professor');

// Rotas para registro
Route::get('register/aluno', function () {
    return view('auth.register-aluno');
})->name('register.aluno');

Route::get('register/professor', function () {
    return view('auth.register-professor');
})->name('register.professor');

// Rotas para processamento de registro
Route::post('register/aluno', [RegistrationController::class, 'registerAluno'])->name('register.aluno.submit');
Route::post('register/professor', [RegistrationController::class, 'registerProfessor'])->name('register.professor.submit');

// Rotas para o painel do aluno (protegidas por middleware)
Route::group(['middleware' => ['auth:aluno']], function () {
    Route::get('/aluno/dashboard', [AlunoController::class, 'dashboard'])->name('aluno.dashboard');
    Route::get('/aluno/cursos', [AlunoController::class, 'cursos'])->name('aluno.cursos');
    // Outras rotas protegidas para alunos
});

// Rotas para o painel do professor (protegidas por middleware)
Route::group(['middleware' => ['auth:professor']], function () {
    // Adicione aqui as rotas protegidas para professores
    Route::get('/professor/dashboard', [ProfessorController::class, 'dashboard'])->name('professor.dashboard');
    Route::get('/professor/cursos', [ProfessorController::class, 'cursos'])->name('professor.cursos');
    // Outras rotas protegidas para professores
});

// Rotas de recursos para professores (CRUD completo)
Route::resource('professores', ProfessorController::class);

// Adicione outras rotas conforme necessário
