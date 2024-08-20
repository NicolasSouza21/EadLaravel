<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfessorAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Verifica se o usuário está autenticado com o guard 'professor'
        if (Auth::guard('professor')->check()) {
            return $next($request);
        }

        // Se não estiver autenticado, redireciona para a página de login de professor
        return redirect()->route('professor.login');
    }
}


