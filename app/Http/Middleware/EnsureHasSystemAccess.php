<?php
// app/Http/Middleware/EnsureHasSystemAccess.php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureHasSystemAccess
{
    public function handle(Request $request, Closure $next)
    {
        if (! $request->user() || ! $request->user()->can('access.system')) {
            // Opción: desloguear y redirigir (si tienes login)
            if (auth()->check()) auth()->logout();

            return redirect()->route('login', absolute: false)
                ->withErrors(['email' => 'Tu usuario no tiene acceso al sistema.']);

        }
        return $next($request);
    }
}
