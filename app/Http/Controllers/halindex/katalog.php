<?php

namespace App\Http\Controllers\halindex;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class katalog extends Controller
{
    //
    public function halkatalog()
    {
        # code...
        return view('halindex.katalog.katalog');
    }
}
