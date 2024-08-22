<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;
use Illuminate\Support\Facades\Auth;

class CursoController extends Controller
{
    // Exibe o formulário de criação de curso
    public function create()
    {
        return view('create-course');
    }

    // Armazena o novo curso no banco de dados
    public function store(Request $request)
    {
        // Validação dos dados do curso
        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'required|string',
            'data_inicio' => 'required|date',
            'data_fim' => 'required|date|after_or_equal:data_inicio',
            'preco' => 'required|numeric|min:0',
        ]);

        // Criação do curso com dados validados
        Curso::create([
            'nome' => $request->nome,
            'descricao' => $request->descricao,
            'data_inicio' => $request->input('data_inicio'), // Usar input diretamente
            'data_fim' => $request->input('data_fim'), // Usar input diretamente
            'preco' => $request->input('preco'),
            'professor_id' => Auth::guard('professor')->user()->id, // Associar o curso ao professor autenticado
        ]);

        return redirect()->route('professor.dashboard')->with('status', 'Curso criado com sucesso!');
    }
    public function edit(Curso $curso)
    {
        return view('edit-course', compact('curso'));
    }

    public function update(Request $request, Curso $curso)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'required|string',
            'data_inicio' => 'required|date',
            'data_fim' => 'required|date|after_or_equal:data_inicio',
            'preco' => 'required|numeric|min:0',
        ]);

        $curso->update($request->all());

        return redirect()->route('professor.cursos')->with('status', 'Curso atualizado com sucesso!');
    }
    public function listarCursos()
{
    $cursos = Curso::all(); // Busca todos os cursos cadastrados
    return view('aluno.cursos', compact('cursos'));
}

}
