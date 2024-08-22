<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Exibe o formulário de login para alunos.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function showAlunoLoginForm()
    {
        return view('auth.login-aluno');
    }

    /**
     * Exibe o formulário de login para professores.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function showProfessorLoginForm()
    {
        return view('auth.login-professor');
    }

    /**
     * Processa o login de um aluno.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function loginAluno(Request $request)
    {
        $input = $request->all();

        // Validação manual
        if (!isset($input['email']) || !filter_var($input['email'], FILTER_VALIDATE_EMAIL)) {
            return back()->withErrors(['email' => 'O campo email é obrigatório e deve ser um endereço de email válido.']);
        }

        if (!isset($input['password']) || strlen($input['password']) < 8) {
            return back()->withErrors(['password' => 'O campo senha é obrigatório e deve ter no mínimo 8 caracteres.']);
        }

        if (Auth::guard('aluno')->attempt(['email' => $input['email'], 'password' => $input['password']])) {
            return redirect()->route('aluno.dashboard');
        }

        return back()->withErrors(['email' => 'Credenciais inválidas.']);
    }

    /**
     * Processa o login de um professor.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function loginProfessor(Request $request)
    {
        $input = $request->all();

        // Validação manual
        if (!isset($input['email']) || !filter_var($input['email'], FILTER_VALIDATE_EMAIL)) {
            return back()->withErrors(['email' => 'O campo email é obrigatório e deve ser um endereço de email válido.']);
        }

        if (!isset($input['password']) || strlen($input['password']) < 8) {
            return back()->withErrors(['password' => 'O campo senha é obrigatório e deve ter no mínimo 8 caracteres.']);
        }

        if (Auth::guard('professor')->attempt(['email' => $input['email'], 'password' => $input['password']])) {
            return redirect()->route('professor.dashboard');
        }

        return back()->withErrors(['email' => 'Credenciais inválidas.']);
    }

    /**
     * Faz o logout do usuário autenticado.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        return redirect('/');
    }

    public function logoutAluno(Request $request)
    {
        Auth::guard('aluno')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home')->with('status', 'Você foi desconectado com sucesso.');
    }

    public function logoutProfessor(Request $request)
    {
        Auth::guard('professor')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home')->with('status', 'Você foi desconectado com sucesso.');
    }
}

