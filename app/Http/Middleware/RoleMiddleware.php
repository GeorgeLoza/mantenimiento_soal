<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware // Cambia el nombre por claridad
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @param  mixed  ...$roles Roles permitidos
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (!in_array(auth()->user()->rol, $roles)) {
            abort(403, 'No tienes permiso para acceder a esta página.');
        }
        
        return $next($request);
    }
}
