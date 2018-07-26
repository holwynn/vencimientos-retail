<?php

namespace App\Http\Middleware;
use Illuminate\Http\Response;

use Closure;

class EasyAuth
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
        if ($request->input('password') != 'mypass') {
            return new Response([
                'msg' => 'You are unauthorized'
            ], 404);
        }

        return $next($request);
    }
}
