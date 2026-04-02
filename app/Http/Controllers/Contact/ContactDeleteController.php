<?php

namespace App\Http\Controllers\Contact;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;

class ContactDeleteController extends Controller
{
    public function __invoke(Contact $contact)
    {
        if ($contact->user_id !== Auth::id()) {
            abort(403, 'Unauthorized');
        }

        $contact->delete();

        return redirect(route('contacts.index'))->with('success', 'Contact succesvol verwijderd!');
    }
}
