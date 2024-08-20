<?php

namespace App\Http\Controllers;

use App\Models\Professor;
use Illuminate\Http\Request;

class ProfessorController extends Controller
{
    public function index()
    {
        $professores = Professor::all();
        return view('professores.index', compact('professores'));
    }

    public function create()
    {
        return view('professores.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|max:255',
            'email' => 'required|email|unique:professores,email',
            'senha' => 'required|min:8',
        ]);

        $professor = new Professor();
        $professor->nome = $validated['nome'];
        $professor->email = $validated['email'];
        $professor->senha = bcrypt($validated['senha']);
        $professor->save();

        return redirect()->route('professores.index');
    }

    // Outros métodos como edit, update e destroy seriam implementados aqui.
}
