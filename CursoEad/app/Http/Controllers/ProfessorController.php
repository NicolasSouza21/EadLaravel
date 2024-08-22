<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Professor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function dashboard()
    {
        $professor = Auth::guard('professor')->user();
        return view('professor.dashboard', compact('professor'));
    }

    public function cursos()
    {
        // Obter o ID do professor autenticado
        $professorId = Auth::guard('professor')->user()->id;

        // Buscar cursos onde professor_id corresponde ao ID do professor autenticado
        $cursos = Curso::where('professor_id', $professorId)->get();

        return view('professor.cursos', compact('cursos'));
    }
}
