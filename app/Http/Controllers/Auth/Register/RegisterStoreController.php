<?php

namespace App\Http\Controllers\Auth\Register;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisterStoreController extends Controller
{
    public function __invoke(RegisterUserRequest $request)
    {
        $user = User::create($request->validated()); 

        Auth::login($user);

        
        return redirect()->route('contacts.index');
    }
}
