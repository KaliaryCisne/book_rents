<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Factory;

class Authenticate
{
    protected $auth;

    public function __construct(Factory $auth)
    {
        $this->auth = $auth;
    }

    public function handle($request, Closure $next, $guard = null)
    {
        if ($this->auth->guard($guard)->guest()) {
            return response()->json(['status' => 'fail', 'message' => 'Unauthorized'], 401);
        }

        return $next($request);
    }
}
