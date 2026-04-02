<?php

namespace App\Http\Controllers\Auth\Login;

use App\Http\Controllers\Controller;

class LoginShowController extends Controller
{
    public function __invoke()
    {
        return view('auth.login');
    }
}
