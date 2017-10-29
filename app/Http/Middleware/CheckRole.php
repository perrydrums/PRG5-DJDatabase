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
     * @param  $role
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        // If the user hasn't got the role
        if($request->user()) {
            if(!$request->user()->hasRole($role)) {
                return redirect()->route('error.access');
            }
            // If the user has the specific role
            return $next($request);
        }
        // If not logged in
        return redirect()->route('error.login');
    }
}
