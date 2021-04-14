<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @param string|null $guard
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $guard = null)
    {
        if (Auth::check()) {
            // Adminの場合
            if (Auth::getUser()->is_admin) return redirect()->route('admin.index');

            // 一般ユーザーの場合
            return redirect()->route('home.mypage');
        }
        return $next($request);
    }
}
