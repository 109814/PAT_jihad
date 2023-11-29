<?php

use App\Http\Controllers\kelola_menu;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\log_aktivitas;
use App\Http\Controllers\kelolaUserController;
use App\Http\Controllers\Auth\RegisteredUserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('bootstrap.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Menu
    Route::get('/kelolamenu', [kelola_menu::class, 'index'])->name('kelolamenu');
    Route::get('/tambah_menu', [kelola_menu::class, 'create']);
        Route::post('/tambah_menu', [kelola_menu::class, 'store'])->name('tambah_menu');



        //edit menu
        Route::get('/editMenu/{id}', [kelola_menu::class, 'edit'])->name('editMenu');
        Route::post('/editMenu/{id}', [kelola_menu::class, 'update'])->name('updateMenu');
        Route::delete('/editMenu/{id}', [kelola_menu::class, 'destroy'])->name('destroyMenu');



    // User
    Route::get('kelolauser', [kelolaUserController::class, 'kelolauser'])->name('kelolauser');
    Route::get('/tambah_pengguna', [RegisteredUserController::class, 'create']);
        Route::post('/tambah_pengguna', [RegisteredUserController::class, 'store'])->name('tambah_user');
    // User Edit
    Route::get('/tambah_pengguna/{id}/edit', [RegisteredUserController::class, 'edit'])->name('users.edit');
    Route::put('/tambah_pengguna/{id}', [RegisteredUserController::class,'update'])->name('users.update');

    // Belanja
    Route::get('/belanja', [kelola_menu::class, 'tambahkekeranjang']);
        Route::post('/belanja', [kelola_menu::class, 'prosesBelanja'])->name('user.belanja');

    // Log Aktivitas
    Route::get('/logAktivitas', [log_aktivitas::class, 'index']);

});

require __DIR__.'/auth.php';
