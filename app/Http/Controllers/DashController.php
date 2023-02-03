<?php

namespace App\Http\Controllers;

use App\MdBuku;
use App\MdAnggota;
use Illuminate\Http\Request;

class DashController extends Controller
{
    public function Dashboard()
    {
        # menampilkan halaman dashboard
        $buku = MdBuku::count();
        $anggota = MdAnggota::count();
        //$anggota = MdAnggota::count();
        return view('admin.dashboard',compact('buku','anggota'));
    }
}
