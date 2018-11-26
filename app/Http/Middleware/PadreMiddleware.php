<?php

namespace App\Http\Middleware;

use App\Model\Alumno;
use Closure;

class PadreMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        \Config::set('auth.table', 'alumnos');
        \Config::set('auth.model', Alumno::class);

        \Config::set('session.cookie', 'student_session');
        \Config::set('session.path', '/tutor/');

        return $next($request);
    }
}
