<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Inertia\Inertia;
use Inertia\Response;
use RealRashid\SweetAlert\Facades\Alert;

class RegisteredUserController extends Controller
{
    /**
     * Tampilkan halaman register.
     */
    public function create(): Response
    {
        return Inertia::render('Auth/Register');
    }

    /**
     * Proses registrasi user baru.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'nim' => 'required|string|max:20|unique:users',
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            't_lahir' => 'required|string|max:255',
            'ttl' => 'required|date',
            'kelamin' => 'required|string|in:L,P',
            'wa' => 'required|string|max:20',
            'rayon_id' => 'required|exists:rayons,id',
            'prodi' => 'required|string|max:255',
            'kaderisasi' => 'required|string|max:50',
            'role_id' => 'required|numeric|in:3,4,5',
        ]);

        $user = User::create([
            'name' => $request->name,
            'nim' => $request->nim,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            't_lahir' => $request->t_lahir,
            'ttl' => $request->ttl,
            'kelamin' => $request->kelamin,
            'wa' => $request->wa,
            'rayon_id' => $request->rayon_id,
            'prodi' => $request->prodi,
            'kaderisasi' => $request->kaderisasi,
            'role_id' => $request->role_id,
            'is_verified' => false, // Akun belum diverifikasi
            'thn_mapaba' => $request->thn_mapaba ?? null,
            'thn_pkd' => $request->thn_pkd ?? null,
            'thn_pkl' => $request->thn_pkl ?? null,
            'thn_pkn' => $request->thn_pkn ?? null,
        ]);

        event(new Registered($user));

        Alert::success('Pendaftaran Berhasil', 'Akun Anda berhasil dibuat. Silakan tunggu verifikasi dari admin sebelum dapat login.');
        return redirect()->route('login');
    }
}