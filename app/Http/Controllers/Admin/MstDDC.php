<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\MdDDC;
use Illuminate\Http\Request;

class MstDDC extends Controller
{
    //
    public function masterddc()
    {
        # code...
        $ddc = MdDDC::all();
        return view('admin.masterddc.masterddc', ['ddc' => $ddc]);
    }
}
