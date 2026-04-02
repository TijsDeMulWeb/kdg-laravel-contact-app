<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use Illuminate\Support\Facades\Auth;

class ContactStoreController extends Controller
{
    public function __invoke(ContactRequest $request)
    {
        $request->validated();

        Auth::user()->contacts()->create([
            'first_name' => $request->firstName,
            'last_name' => $request->lastName,
            'email' => $request->email,
        ]);

        return redirect('/contacts')->with('success', 'Contact succesvol toegevoegd!');
    }
}
