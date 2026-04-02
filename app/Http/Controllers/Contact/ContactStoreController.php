<?php

namespace App\Http\Controllers\Contact;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use Illuminate\Support\Facades\Auth;

class ContactStoreController extends Controller
{
    public function __invoke(ContactRequest $request)
    {

        Auth::user()->contacts()->create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
        ]);

        return redirect()->route('contacts.index')->with('success', 'Contact succesvol toegevoegd!');
    }
}
