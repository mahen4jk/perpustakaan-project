<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KembaliCon extends Controller
{
    //
    public function viewkembali()
    {
        # code...
        return view('admin.sirkulasi.pengembalian');
    }
}
