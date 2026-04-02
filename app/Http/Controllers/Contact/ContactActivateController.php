<?php

namespace App\Http\Controllers\Contact;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactActivateController extends Controller
{
    public function __invoke(Contact $contact)
    {
        $contact->restore();
        return redirect()->route('contacts.index')->with('success', 'Contact activated successfully.');
    }
}
