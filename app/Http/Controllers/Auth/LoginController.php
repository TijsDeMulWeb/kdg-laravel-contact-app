<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginUserRequest;
use App\Models\User;
use Illuminate\Auth\Events\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function login(LoginUserRequest $request)
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

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('auth.login');
    }
}
