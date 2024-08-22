<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfessorController;
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CursoController;

// Rota para a página inicial
Route::get('/', [HomeController::class, 'index'])->name('home');

// Rotas para autenticação de alunos
Route::get('login/aluno', function () {
    return view('auth.login-aluno');
})->name('login.aluno');

Route::post('login/aluno', [LoginController::class, 'loginAluno'])->name('login.aluno.submit');

// Rotas para autenticação de professores
Route::get('login/professor', function () {
    return view('auth.login-professor');
})->name('login.professor');

Route::post('login/professor', [LoginController::class, 'loginProfessor'])->name('login.professor.submit');

// Rota para selecionar entre registro de aluno ou professor
Route::get('register', function () {
    return view('auth.register'); // Certifique-se de que esta view existe
})->name('register');

// Rotas para registro de aluno e professor
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
    Route::get('/professor/dashboard', [ProfessorController::class, 'dashboard'])->name('professor.dashboard');
    Route::get('/professor/cursos', [ProfessorController::class, 'cursos'])->name('professor.cursos');
    // Outras rotas protegidas para professores
});

// Rotas de recursos para professores (CRUD completo)
Route::resource('professores', ProfessorController::class);

// Adicione outras rotas conforme necessário
Route::group(['middleware' => ['auth:aluno']], function () {
    Route::get('/aluno/dashboard', [AlunoController::class, 'dashboard'])->name('aluno.dashboard');
    // Outras rotas protegidas para alunos
});

// Rotas para o painel do professor (protegidas por middleware)
Route::group(['middleware' => ['auth:professor']], function () {
    Route::get('/professor/dashboard', [ProfessorController::class, 'dashboard'])->name('professor.dashboard');
    // Outras rotas protegidas para professores
});

Route::post('logout/aluno', [LoginController::class, 'logoutAluno'])->name('logout.aluno');
Route::post('logout/professor', [LoginController::class, 'logoutProfessor'])->name('logout.professor');

// Rotas para criação de curso
Route::group(['middleware' => ['auth:professor']], function () {
    Route::get('/curso/create', [CursoController::class, 'create'])->name('cursos.create');
    Route::post('/curso', [CursoController::class, 'store'])->name('cursos.store');
});

// Rotas para o painel do professor (protegidas por middleware)
Route::group(['middleware' => ['auth:professor']], function () {
    Route::get('/professor/dashboard', [ProfessorController::class, 'dashboard'])->name('professor.dashboard');
    Route::get('/professor/cursos', [ProfessorController::class, 'cursos'])->name('professor.cursos');
    // Outras rotas protegidas para professores
});
