<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsNotAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (\Auth::check() && \Auth::getUser()->is_admin) {
            return redirect()->route('admin.index');
        }
        return $next($request);
    }
}
