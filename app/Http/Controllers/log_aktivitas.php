<?php
namespace App\Http\Controllers;

use App\Models\LogAktivitas;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
// use App\Models\log_aktivitas;
use Illuminate\Http\Request;

class log_aktivitas extends Controller
{
    public function index()
    {
        $log_aktivitas = Auth::user()->logAktivitas;
        return view('bootstrap.link.log_aktivitas', compact('log_aktivitas'));
    }

}
