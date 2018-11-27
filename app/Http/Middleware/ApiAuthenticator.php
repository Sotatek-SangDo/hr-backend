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
        if(!User::isApiToken($request['api_token']) || !self::isSignature($request)) {
            return response()->json(['status' => false, 'errors' => 'Unauthenticate' ]);
        }
        return $next($request);
    }

    private function isSignature($request)
    {
        $signature = $request['signature'];
        $path = $request->path();
        $method = $request->method();
        $payload = "{$method} {$path}";
        logger('hash ====> '. hash_hmac('sha256', $payload, $request['api_token']) );
        return $signature === hash_hmac('sha256', $payload, $request['api_token']);
    }
}
