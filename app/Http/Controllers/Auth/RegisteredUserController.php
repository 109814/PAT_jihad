<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('bootstrap.link.tambah_user');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
        public function store(Request $request): RedirectResponse
        {
            $request->validate([
                'nik' => ['required', 'string', 'max:255'],
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
                'no_hp' => ['required', 'string', 'max:255'],
            ]);

            $user = User::create([
                'nik' => $request->nik,
                'name' => $request->name,
                'email' => $request->email,
                'no_hp' => $request->no_hp,
                'password' => Hash::make($request->password),
            ]);

            event(new Registered($user));

            Auth::login($user);

            return redirect(RouteServiceProvider::HOME);
        }

        public function edit($id)
    {
        $user = User::find($id);
        return view('bootstrap.link.useredit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        // $user->update([
        //     'name' => $request->input('name'),
        //     'nik' => $request->input('nik'),
        //     'email' => $request->input('email'),
        //     'no_hp' => $request->input('no_hp'),
        // ]);

         // Hapus semua peran sebelum menambahkan yang baru
        $user->roles()->detach();

        // Tambahkan peran yang dipilih dari formulir
        $user->assignRole($request->input('role'));

        return redirect()->route('kelolauser')->with('success', 'User updated successfully');
    }
}
