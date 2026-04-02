<?php

namespace App\Http\Controllers\Auth\Register;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterStoreController extends Controller
{
    public function __invoke(RegisterUserRequest $request)
    {
        $request->validated();

        $user = User::create([
            'first_name' => $request->firstName,
            'last_name' => $request->lastName,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]); 

        Auth::login($user);

        return redirect(route('contacts.index'));
    }
}
