<?php

namespace App\Http\Middleware;

use Closure;

class Jwt
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!auth()->user()) {
            return response()->json([
                'msg' => 'You are not logged in!'
            ], 401);
        }

        return $next($request);
    }
}
