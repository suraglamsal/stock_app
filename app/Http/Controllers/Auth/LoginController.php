<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    // multi-table login
    protected function attemptLogin(Request $request)
    {

        // users table
        if (Auth::guard('web')->attempt(
            $this->credentials($request),
            $request->filled('remember')
        )) {

            return true;
        }

        // role_user table
        if (Auth::guard('role_user')->attempt(
            $this->credentials($request),
            $request->filled('remember')
        )) {

            return true;
        }

        return false;
    }

    // redirect according to role
    protected function redirectTo()
    {

        // users table
        if (Auth::guard('web')->check()) {

            $user = Auth::guard('web')->user();

            if ($user->role == 'admin') {
                return '/home';
            }

            if ($user->role == 'user') {
                return '/product';
            }
        }

        // role_user table
        if (Auth::guard('role_user')->check()) {

            $user = Auth::guard('role_user')->user();

            if ($user->role == 's_keeper') {
                return '/product';
            }
        }

        return '/';
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}