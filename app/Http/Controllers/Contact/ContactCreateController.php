<?php

namespace App\Http\Controllers\Contact;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactCreateController extends Controller
{
    public function __invoke()
    {
        return view('contacts.create');
    }
}
