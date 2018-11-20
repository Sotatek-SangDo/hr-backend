<?php

namespace App\Http\Middleware;

use Closure;
use App\User;

class ApiAuthenticator
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
        if(!User::isApiToken($request['api_token'])) {
            return response()->json(['status' => false, 'errors' => 'Unauthenticate' ]);
        }
        return $next($request);
    }
}
