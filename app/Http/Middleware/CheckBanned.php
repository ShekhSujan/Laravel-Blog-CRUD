<?php

namespace App\Http\Middleware;

use App\Enums\StatusEnum;
use Closure;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CheckBanned
{

    public function handle(Request $request, Closure $next)
    {

        if (auth()->check() && (auth()->user()->status == StatusEnum::Inactive)) {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            Toastr::error('Your Account is suspended, please contact Admin', 'Danger');
            return redirect()->route('login');
        }

        return $next($request);
    }
}
