<?php

namespace App\Http\Middleware;

use Closure;

class VerifyAdminSession
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
        if (!$request->session()->has('loggedAdmin')){
            return redirect()->route('login.admin');
        }
        return $next($request);
    }
}
