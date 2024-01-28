<?php

namespace App\Http\Middleware;

use App\Enums\RoleEnum;
use App\Providers\RouteServiceProvider;
use Brian2694\Toastr\Facades\Toastr;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {

            if (Auth::guard($guard)->check() && auth()->user()->role == RoleEnum::User) {
                Toastr::success('Logged in Successfully', 'Success');
                return redirect(RouteServiceProvider::HOME);
            } elseif (Auth::guard($guard)->check() && auth()->user()->role == RoleEnum::Admin || Auth::guard($guard)->check() && auth()->user()->role == RoleEnum::Superadmin) {

                Toastr::success('Logged in Successfully', 'Success');
                return redirect(RouteServiceProvider::DASHBOARD);
            }
        }

        return $next($request);
    }
}
