<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     */
    public function handle( Request $request, Closure $next )
    {
        if (Auth::user() &&  Auth::user()->roleId === 1) {
            return $next( $request );
        }

        return response(status: 404);
    }
}
