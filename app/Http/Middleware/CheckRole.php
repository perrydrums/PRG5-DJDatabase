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
    public function handle($request, Closure $next)
    {
        // If user has no role
        if($request->user() === null) {
            return response("Insufficient permissions", 401);
        }
        $actions = $request->route()->getAction();
        $roles;

        // If a page has any permissions
        if(isset($actions['roles'])) {
            $roles = $actions['roles'];
        } else {
            $roles = null;
        }

        // Check if user has the role OR no permissions are set on the page
        if($request->user()->hasAnyRole($roles) || !$roles) {
            return $next($request);
        }
        return response("Insufficient permissions", 401);
    }
}
