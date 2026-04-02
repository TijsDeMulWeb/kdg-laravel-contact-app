<?php

namespace App\Http\Controllers\Contact;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use Illuminate\Support\Facades\Auth;

class ContactStoreController extends Controller
{
    public function __invoke(ContactRequest $request)
    {

        Auth::user()->contacts()->create($request->validated());

        return redirect()->route('contacts.index')->with('success', 'Contact succesvol toegevoegd!');
    }
}
