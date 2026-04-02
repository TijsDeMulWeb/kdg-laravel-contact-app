<?php

namespace App\Http\Controllers\Contact;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactUpdateController extends Controller
{
    public function __invoke(Contact $contact, ContactRequest $request)
    {
        $request->validated();

        if ($contact->user_id !== Auth::id()) {
            abort(403, 'Unauthorized');
        }

        $contact->update([
            'first_name' => $request->firstName,
            'last_name' => $request->lastName,
            'email' => $request->email,
        ]);

        return redirect(route('contacts.index'))->with('success', 'Contact succesvol bijgewerkt!');
    }
}
