<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;


class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        if (Auth::user()->role != 'admin') {
            abort(403);
        }
        return $next($request);
    }
}
