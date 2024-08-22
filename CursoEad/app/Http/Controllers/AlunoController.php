<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AlunoController extends Controller
{



    /**
     * Exibe o dashboard do aluno.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function dashboard()
    {
        $aluno = Auth::guard('aluno')->user();
        return view('aluno.dashboard', compact('aluno'));
    }

    /**
     * Exibe a lista de cursos em que o aluno está inscrito.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function cursos()
    {
        $aluno = Auth::guard('aluno')->user();
        $cursos = $aluno->cursos; // Assume que o relacionamento está definido no modelo Aluno

        return view('aluno.cursos', compact('cursos'));
    }

    /**
     * Exibe os detalhes de um curso específico.
     *
     * @param int $cursoId
     * @return \Illuminate\Contracts\View\View
     */
    public function showCurso($cursoId)
    {
        $curso = Curso::findOrFail($cursoId);
        $aluno = Auth::guard('aluno')->user();

        if (!$aluno->cursos->contains($curso)) {
            return redirect()->route('aluno.cursos')->withErrors('Você não está inscrito neste curso.');
        }

        return view('aluno.curso-detalhes', compact('curso'));
    }

    public function listarCursos()
    {
        // Buscar todos os cursos cadastrados
        $cursos = Curso::all();

        // Retornar a view com a lista de cursos
        return view('aluno.lista-cursos', compact('cursos'));
    }

    // app/Http/Controllers/AlunoController.php

// app/Http/Controllers/AlunoController.php

// app/Http/Controllers/AlunoController.php

public function inscreverCurso(Request $request, $cursoId)
{
    // Obtém o curso pelo ID
    $curso = Curso::findOrFail($cursoId);

    // Obtém o aluno autenticado
    $aluno = Auth::guard('aluno')->user();

    // Verifica se o aluno está autenticado
    if (!$aluno) {
        return redirect()->route('login.aluno')->with('error', 'Você precisa estar logado para se inscrever em um curso.');
    }

    // Verifica se o aluno já está inscrito no curso
    if ($aluno->cursos->contains($cursoId)) {
        return redirect()->route('aluno.cursos')->with('error', 'Você já está inscrito neste curso.');
    }

    // Adiciona o curso à lista de cursos do aluno
    $aluno->cursos()->attach($cursoId);

    return redirect()->route('aluno.cursos')->with('success', 'Inscrição realizada com sucesso.');
}

public function meusCursos()
    {
        $aluno = Auth::guard('aluno')->user();
        $cursos = $aluno->cursos; // Recupera os cursos aos quais o aluno está inscrito

        return view('aluno.meus-cursos', compact('cursos'));
    }



}





