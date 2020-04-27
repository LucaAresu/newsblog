<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use function redirect;

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
        if(!$request->user()->isStaff()) {
            return redirect('/');
        }
        return $next($request);
    }
}
