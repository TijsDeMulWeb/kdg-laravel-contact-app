<?php

namespace App\Http\Controllers\Contact;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ContactEditController extends Controller
{
    public function __invoke(Request $request, Contact $contact)
    {
        if ($contact->user_id !== Auth::id()) {
            abort(403, 'Unauthorized');
        }

        return view('contacts.edit', [
            'contact' => $contact
        ]);
    }
}
