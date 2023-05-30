<?php

namespace App\Http\Controllers\halindex;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class profil_perpus extends Controller
{
    //
    public function ProfSejarah()
    {
        # code...
        return view('halindex.profile.profil');
    }

    public function VisiMisi()
    {
        # code...
        return view('halindex.profile.visimisi');
    }

}
