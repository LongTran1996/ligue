<?php

namespace App\Http\Middleware;

use Closure;

class TeamAdminMiddleware
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
        if(\Auth::check() == false)
            return redirect('/');           
        if(\Auth::user()->hasTeamAdminRole() == false)
            return redirect('/');  
        
        return $next($request);
    }
}
