<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class kelolaUserController extends Controller
{
    public function index() {

        return view('bootstrap.link.kelola_user');
    }


    public function kelolauser(){

        $kelolauser = User::with('role')->get();


        return view('bootstrap.link.kelola_user', compact('kelolauser'));
    }
}
