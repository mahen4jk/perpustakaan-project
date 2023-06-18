<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    //
    public function MasterPetugas() {
        $petugas = User::all();
        return view ('admin.petugas.petugas', compact('petugas'));
    }
}
