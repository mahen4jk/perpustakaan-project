<?php

namespace App\Http\Controllers\halindex;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class index extends Controller
{
    //
    public function tampilandepan()
    {
        # code...
        return view('halindex.index');
    }
}
