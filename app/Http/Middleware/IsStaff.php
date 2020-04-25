<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class isStaff
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
        //dd($request->user()->role);
        if($request->user()->role === 'user')
            return redirect()->route('/');
        return $next($request);
    }
}
