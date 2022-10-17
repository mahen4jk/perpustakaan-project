<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashController extends Controller
{
    public function Dashboard()
    {
        # menampilkan halaman dashboard
        return view('admin.dashboard');
    }
}
