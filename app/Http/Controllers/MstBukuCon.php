<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MstBukuCon extends Controller
{
    //
    public function MasterBuku()
    {
        # code...
        return view('admin.masterbuku.masterbuku');
    }

    public function formbuku()
    {
        # code...
        return view('admin.masterbuku.formbuku');
    }
}
