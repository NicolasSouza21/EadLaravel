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

 

}
