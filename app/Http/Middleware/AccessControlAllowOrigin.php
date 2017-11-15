<?php

namespace App\Http\Middleware;

use Closure;

class AccessControlAllowOrigin
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


        header('Access-Control-Allow-Origin', '*');
        header('Access-Control-Allow-Headers', 'Origin, Content-Type, Cookie, Accept');
        header('Access-Control-Allow-Methods', 'GET, POST, PATCH, PUT, OPTIONS');
        header('Access-Control-Allow-Credentials', 'true');
        return $next($request);

    }
}
