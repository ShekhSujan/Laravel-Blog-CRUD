<?php

namespace App\Http\Controllers\Auth;

use App\Enums\RoleEnum;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\JsonResponse;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }



    public function login(Request $request)
    {
        $input = $request->all();
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);

        $fieldType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        if (auth()->attempt(array($fieldType => $input['username'], 'password' => $input['password']))) {

            Toastr::success('Logged in Successfully', 'Success');
            if (auth()->check()) {
                $userRole = auth()->user()->role;
                if ($userRole === RoleEnum::User) {
                    return redirect(RouteServiceProvider::HOME);
                } elseif ($userRole === RoleEnum::Admin || $userRole === RoleEnum::Superadmin) {
                    return redirect(RouteServiceProvider::DASHBOARD);
                }
            }


        } else {
            Toastr::error('Username Or Password Are Wrong.', 'Danger');
            return redirect()->route('login');
        }
    }
}
