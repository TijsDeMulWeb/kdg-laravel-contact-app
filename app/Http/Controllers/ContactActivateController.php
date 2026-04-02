<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactActivateController extends Controller
{
    public function __invoke(Contact $contact)
    {
        $contact->restore();
        return redirect('/contacts');
    }
}
