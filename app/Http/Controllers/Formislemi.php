<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Formislemi extends Controller
{
    public function gorunum()
    {
        return view('form');
    }
}
