<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use DB;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        $user = $request->user();

        if (!$user || $user->role !== $role) {
            return redirect()->route('showlogin')->with('error', 'Bạn không có quyền truy cập.');
        }

        return $next($request);
    }

}
