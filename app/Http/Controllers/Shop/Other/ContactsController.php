<?php

namespace App\Http\Controllers\Shop\Other;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    public function __invoke()
    {
        return view('shop.other.contacts');
    }
}
