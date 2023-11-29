<?php

namespace App\Http\Controllers;

use App\Models\menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class kelola_menu extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menu = menu::all();
        return view('bootstrap.link.kelola_menu', compact('menu'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('bootstrap.link.tambah_menu');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'jenis' => 'required|in:makanan,minuman',
        ]);
        // ini logika unutk ketika user mengisi from menu di tabel name sudah automatis terisi user yang sedang login
        $loggedInUser = Auth::user();
        menu::create([
            'nama' => $request->input('nama'),
            'harga' => $request->input('harga'),
            'jenis' => $request->input('jenis'),
            // ini yang mengisinya
            'name' => $loggedInUser->name,
        ]);
        return redirect()->route('kelolamenu');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id_menu)
    {
        //
        $menu = menu::find($id_menu);
        return view('bootstrap.link.edit_menu', compact('menu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id_menu)
    {
        $menu = menu::find($id_menu);
        $menu->update($request->all());

        return redirect()->route('kelolamenu')->with('sucsess', 'Menu Berhasil di Edit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_menu)
    {
        $menu = menu::find($id_menu);
        $menu->delete();

        return redirect()->route('kelolamenu')->with('success', 'Data berhasil dihapus');
    }

    public function tambahKeKeranjang()
{
    $makanan = Menu::where('jenis', 'makanan')->get();
    $minuman = Menu::where('jenis', 'minuman')->get();
    return view('bootstrap.link.belanja', compact('makanan', 'minuman'));
}


public function prosesBelanja(Request $request)
{
    // Proses logika untuk menangani penambahan menu
    $menu = $request->input('menu'); // Array menu yang dipilih
    $jumlahBeli = $request->input('jumlah_beli'); // Jumlah beli yang diinput

    // Proses logika sesuai kebutuhan

    // Redirect atau tampilkan halaman yang sesuai
    return redirect()->route('user.belanja');
}


}
