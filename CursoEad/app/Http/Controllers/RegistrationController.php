<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aluno;
use App\Models\Professor;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{
    public function registerAluno(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:alunos,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        Aluno::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('home')->with('status', 'Cadastro de aluno realizado com sucesso!');
    }

    public function registerProfessor(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:professores,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        Professor::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('home')->with('status', 'Cadastro de professor realizado com sucesso!');
    }
}
