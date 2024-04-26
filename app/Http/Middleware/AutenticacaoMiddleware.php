<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AutenticacaoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        session_start();

        if (isset($_SESSION['id']) && $_SESSION['id'] != '') {
            return $next($request);
        } else {
            return redirect()->back()->with('message','Email ou Senha inválidos');
        }
    }
}
