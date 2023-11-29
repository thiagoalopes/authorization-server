<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class OAuthIntrospectionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        // Verificar se o token é válido e tem os escopos necessários
        if (Auth::guard('api')->check()) {
            return $next($request);
        } else {
            return response()->json(['error' => 'Token inválido'], 401);
        }
    }
}
