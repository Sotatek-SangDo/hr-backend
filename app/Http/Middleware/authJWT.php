<?php

namespace App\Http\Middleware;

use App\Repositories\CustomUserRepository;
use Auth0\SDK\Exception\CoreException;
use Auth0\SDK\Exception\InvalidTokenException;
use Closure;
use Auth;

class authJWT
{
    protected $userRepository;

    /**
     * CheckJWT constructor.
     *
     * @param Auth0UserRepository $userRepository
     */
    public function __construct(CustomUserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $auth0 = \App::make('auth0');

        $accessToken = $request->bearerToken();
        try {
            $tokenInfo = $auth0->decodeJWT($accessToken);
            $user = $this->userRepository->getUserByDecodedJWT($tokenInfo);
            if (!$user) {
                return response()->json(["message" => "Unauthorized user"], 401);
            }
            Auth::login($user);
        } catch (InvalidTokenException $e) {
            return response()->json(["message" => $e->getMessage(), 'error' => "invalid"], 401);
        } catch (CoreException $e) {
            return response()->json(["message" => $e->getMessage(), 'error' => "cor"], 401);
        }

        return $next($request);
    }
}
