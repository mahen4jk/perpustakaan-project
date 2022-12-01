<?php

namespace App\Http\Controllers;

use App\MdBuku;
use Illuminate\Http\Request;

class DashController extends Controller
{
    public function Dashboard()
    {
        # menampilkan halaman dashboard
        // $buku = MdBuku::all();
        return view('admin.dashboard');
    }
}
