<?php

namespace App\Http\Controllers\Contact;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ContactIndexController extends Controller
{
    public function __invoke()
    {
        return view('contacts.index', [
            'contacts' => Auth::user()->contacts()->withTrashed()->paginate(5)
        ]);
    }
}
