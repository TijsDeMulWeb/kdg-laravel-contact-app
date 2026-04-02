<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginUserRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __invoke(LoginUserRequest $request)
    {
        $request->validated();

        if (Auth::attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();

            return redirect('/contacts');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match'
        ]);
    }
}
