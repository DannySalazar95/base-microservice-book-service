<?php

namespace App\Http\Middleware;

use App\Exceptions\JwtNoExistsException;
use Closure;
use Illuminate\Http\Request;

class JwtHeader
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param \Closure $next
     * @return mixed
     * @throws JwtNoExistsException
     */
    public function handle(Request $request, Closure $next)
    {
        if (!$request->hasHeader(config('jwt.header_name'))) {
            throw new JwtNoExistsException();
        }
        return $next($request);
    }
}
