<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserVerifiedNotification;
use App\Mail\UserRejectedNotification;

class UserVerificationController extends Controller
{
    public function index()
    {
        $unverifiedUsers = User::where('is_verified', false)
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('admin.users.verify', compact('unverifiedUsers'));
    }

    public function verify(User $user)
    {
        $user->update(['is_verified' => true]);

        // Send verification email
        Mail::to($user->email)->send(new UserVerifiedNotification($user));

        Alert::success('Sukses', 'Akun berhasil diverifikasi dan notifikasi telah dikirim ke email pengguna');
        return back();
    }

    public function reject(User $user)
    {
        // Store user email before deletion
        $userEmail = $user->email;
        
        // Send rejection email before deleting
        Mail::to($userEmail)->send(new UserRejectedNotification($user));

        $user->delete();

        Alert::success('Sukses', 'Akun berhasil ditolak, dihapus, dan notifikasi telah dikirim ke email pengguna');
        return back();
    }

    public function show($id)
{
    $user = User::with('rayon')->find($id);
    
    if (!$user) {
        abort(404); // Tampilkan 404 jika user tidak ditemukan
    }
    
    // Debugging - bisa dihapus setelah berhasil
    if (app()->environment('local')) {
        dd($user); // Cek data di local
    }
    
    return view('admin.users.details', compact('user'));
}
}