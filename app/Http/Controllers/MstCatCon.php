<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MstCatCon extends Controller
{
    //
    public function MasterKategori()
    {
        # code...
        return view('admin.masterkategori.masterkategori');
    }
}
