<?php

namespace App\Http\Middleware;

use Closure;

class TeamMiddleware
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
        $team = $request->route('team'); //$request->route()->getParameter('post')

        if(\Auth::check() == false)
            return redirect('/');           
        if(\Auth::user()->cant('update', $team ))
            return redirect('/');

        return $next($request);

    }

}
