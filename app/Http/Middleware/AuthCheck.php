<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!session()->has('User') && ($request->path() != 'auth/login' && $request->path() != 'auth/register')) {
            return redirect(route('auth.login'))->with('fail', 'You have to login first !');
        }
        if (session()->has('User') && ($request->path() == 'auth/login' || $request->path() == 'auth/register')) {
            return back();
        }
        // clear cache (can not access previous page, if logout)
        return $next($request)->header('Cache-Control', 'no-cache, no-store, max-age=0, must-revalidate')
            ->header('Pragma', 'no-cache')
            ->header('Expires', 'Sat 01 Jan 1990 00:00:00 GMT');
    }
}
