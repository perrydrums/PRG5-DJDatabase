<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        // If the user hasn't got the role
        if($request->user()) {
            if(!$request->user()->hasRole($role)) {
                return response("Sorry, you are not allowed to access this page :(", 401);
            }
            return $next($request);
        }
        return response("Please log in first", 401);
    }
}
