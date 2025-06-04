<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Rayon;

/**
 * Summary of LoginController
 */
class LoginController extends Controller
{
    public function login()
    {
        if (auth()->check()) {
            return redirect('/profile');
        }
    
        return view('auth.login');
    }
    public function authenticate(Request $request)
{
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $user = Auth::user();
        
        // Cek apakah user sudah diverifikasi oleh admin
        if (!$user->is_verified) {
            Auth::logout();
            Alert::info('Akun Belum Diverifikasi', 'Akun Anda sedang menunggu verifikasi admin. Silakan tunggu atau hubungi admin.');
            return redirect()->route('verification.notice'); // Redirect ke halaman not-verified
        }
        
        // Authentication passed...
        Alert::success('Mantap IMMawan & IMMawati', 'Anda Berhasil Masuk');
        return redirect()->intended('/profile');
    } else {
        // Authentication failed...
        $user = User::where('email', $credentials['email'])->first();

        if (!$user) {
            return redirect()->back()->with('error', 'Email atau Password Salah');
        } else {
            return redirect()->back()->with('error', 'Email atau Password Salah');
        }
    }
}
    public function validasi()  {
      return view('auth.verifikasi-register');
    }



    public function validasii(Request $request)
    {
      $nim = $request->input('nim');
      $user = User::where('nim', $nim)->first();
    
      if ($user) {
        if ($user->email) {
          Alert::info('NIM/NPM Sudah Terdaftar', 
          'Anda Sudah Memiliki Akun, Tinggal Login Saja');
          return redirect()->route('login');
        } else {
          // dd($user); sampai sini sudah benar
          return redirect()->route('register', ['user' => $user]);
        }
      } else {
        Alert::error('Maaf Sahabat', 'NIM/NPM Anda belum terdaftar. 
        Mohon minta admin untuk melakukan 
        pendaftaran NIM/NPM terlebih dahulu, lalu registrasi kembali.');
        return redirect()->route('login');
      }
    }
    
    // public function register($user, Request $request) {
    //   $usertoRegis = User::find($user);
    //   // dd($user);
    //   // dd($usertoRegis);
    //   return view('auth.register', compact('usertoRegis'));
    // }
    public function register() {

      $rayons = Rayon::all()->sortBy('rayon');

      return view('auth.register', compact('rayons'));
    }
    
    public function store(Request $request)
  {
      // Rule validasi untuk semua field yang dibutuhkan
      $rules = [
          'name' => 'required',
          'nim' => 'required|unique:users,nim|regex:/^\d{3,12}P?$/',  // Menggunakan regex
          'username' => 'required|unique:users,username',
          'email' => 'required|unique:users,email',
          't_lahir' => 'required',
          'ttl' => 'required|date',
          'kelamin' => 'required',
          'wa' => 'required',
          'rayon_id' => 'required',
          'prodi' => 'required',
          'kaderisasi' => 'required',
          'role_id' => 'required',
          'password' => 'required|min:6|confirmed',
          // 'password' => 'required|min:6|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/|confirmed',
      ];

      $messages = [
          'name.required' => 'Nama lengkap wajib diisi.',
          'nim.required' => 'NIM/NPM wajib diisi.',
          'nim.unique' => 'NIM/NPM sudah digunakan.',
          'nim.regex' => 'NIM/NPM harus berupa angka dan boleh diakhiri dengan huruf "P".',
          'username.required' => 'Username wajib diisi.',
          'username.unique' => 'Username sudah digunakan.',
          'email.required' => 'Email wajib diisi.',
          'email.unique' => 'Email sudah digunakan.',
          't_lahir.required' => 'Kota kelahiran wajib diisi.',
          'ttl.required' => 'Tanggal lahir wajib diisi.',
          'kelamin.required' => 'Jenis kelamin wajib dipilih.',
          'wa.required' => 'Nomor Telp/WA wajib diisi.',
          'rayon_id.required' => 'Rayon wajib dipilih.',
          'prodi.required' => 'Jurusan wajib dipilih.',
          'kaderisasi.required' => 'Jenjang kaderisasi wajib dipilih.',
          'role_id.required' => 'Status keanggotaan wajib dipilih.',
          'password.required' => 'Password wajib diisi.',
          'password.min' => 'Password minimal 6 karakter.',
          // 'password.regex' => 'Password harus terdiri dari huruf kapital, huruf kecil, dan angka.',
          'password.confirmed' => 'Konfirmasi password tidak cocok.',
      ];

      // Validasi input
      $request->validate($rules, $messages);

      // Buat user baru
      $user = new User();
      $user->name = $request->name;
      $user->nim = $request->nim;
      $user->username = $request->username;
      $user->email = $request->email;
      $user->t_lahir = $request->t_lahir;
      $user->ttl = $request->ttl;
      $user->kelamin = $request->kelamin;
      $user->wa = $request->wa;
      $user->rayon_id = $request->rayon_id;
      $user->prodi = $request->prodi;
      $user->kaderisasi = $request->kaderisasi;
      
      // Simpan informasi jenjang kaderisasi sesuai pilihan
      if ($request->kaderisasi == 'DAD' && $request->thn_mapaba) {
          $user->thn_mapaba = $request->thn_mapaba;
      } elseif ($request->kaderisasi == 'DAM' && $request->thn_pkd) {
          $user->thn_pkd = $request->thn_pkd;
      } elseif ($request->kaderisasi == 'DAP' && $request->thn_pkl) {
          $user->thn_pkl = $request->thn_pkl;
      } elseif ($request->kaderisasi == 'PPK' && $request->thn_pkn) {
          $user->thn_pkn = $request->thn_pkn;
      }
      
      $user->role_id = $request->role_id;
      $user->password = bcrypt($request->password);
      $user->save();

      Alert::success('Pendaftaran berhasil! Akun Anda akan diverifikasi oleh admin dalam 24 jam.');
      return redirect()->to('/login');
  }

    

    /**
     * Summary of logout
     * @param Request $request
     * @return RedirectResponse
     */
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect ('/');
    }

}
