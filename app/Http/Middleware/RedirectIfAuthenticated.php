<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        // Si no se especifican guards, usa 'web' como predeterminado
        $guards = empty($guards) ? ['web'] : $guards;

        foreach ($guards as $guard) {
            // Verifica si el usuario ya está autenticado con el guard actual
            if (Auth::guard($guard)->check()) {
                return redirect(RouteServiceProvider::HOME); // Redirige al home si está autenticado
            }
        }

        // Permite continuar al siguiente middleware si no está autenticado
        return $next($request);
    }
}
