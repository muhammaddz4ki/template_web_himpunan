<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Rayon;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\View;
use Barryvdh\DomPDF\PDF;

class LaporanKaderController extends Controller
{
    public function index()
    {
        $rayons = Rayon::all();
        $kader = collect(); // Kosongkan hasil awal kader
        $posts = collect(); // Kosongkan hasil awal blog/berita

        return view('admin.laporan.kader.index', compact('kader', 'posts', 'rayons'));
    }

    public function filter(Request $request)
    {
        if ($request->method() !== 'POST') {
            abort(405, 'Method Not Allowed');
        }

        session([
            'filter_rayon_id' => $request->rayon_id,
            'filter_tanggal_awal' => $request->tanggal_awal,
            'filter_tanggal_akhir' => $request->tanggal_akhir
        ]);

        $rayons = Rayon::all();
        $kader = collect();
        $posts = collect();

        // Cek apakah laporan yang dipilih adalah "Laporan Blog / Berita"
        if ($request->rayon_id == 'blog') {
            $query = Post::query(); // Gunakan model Post untuk laporan Blog/Berita
            
            // Filter berdasarkan tanggal jika tersedia
            if ($request->filled('tanggal_awal') && $request->filled('tanggal_akhir')) {
                $query->whereBetween('created_at', [
                    $request->tanggal_awal . ' 00:00:00', 
                    $request->tanggal_akhir . ' 23:59:59'
                ]);
            }
            
            $posts = $query->get();
        } else {
            $query = User::whereBetween('role_id', [2, 16]);

            
            // Filter berdasarkan tanggal jika tersedia
            if ($request->filled('tanggal_awal') && $request->filled('tanggal_akhir')) {
                $query->whereBetween('created_at', [
                    $request->tanggal_awal . ' 00:00:00', 
                    $request->tanggal_akhir . ' 23:59:59'
                ]);
            }

            // Filter berdasarkan rayon
            if ($request->filled('rayon_id') && $request->rayon_id !== 'all') {
                $query->where('rayon_id', $request->rayon_id);
            }
            
            $kader = $query->get();
        }

        return view('admin.laporan.kader.index', compact('kader', 'posts', 'rayons'));
    }

    public function exportPdf(Request $request) 
    {
        $rayon_id = session('filter_rayon_id');
        $tanggal_awal = session('filter_tanggal_awal');
        $tanggal_akhir = session('filter_tanggal_akhir');

        if ($rayon_id == 'blog') {
            $query = Post::query(); // Export PDF untuk laporan Blog/Berita
            
            if ($tanggal_awal && $tanggal_akhir) {
                $query->whereBetween('created_at', [
                    $tanggal_awal . ' 00:00:00', 
                    $tanggal_akhir . ' 23:59:59'
                ]);
            }
            
            $posts = $query->get();
            $kader = collect(); // Empty collection for kader
        } else {
            $query = User::whereBetween('role_id', [2, 16]);
            
            if ($tanggal_awal && $tanggal_akhir) {
                $query->whereBetween('created_at', [
                    $tanggal_awal . ' 00:00:00', 
                    $tanggal_akhir . ' 23:59:59'
                ]);
            }

            if ($rayon_id && $rayon_id !== 'all') {
                $query->where('rayon_id', $rayon_id);
            }
            
            $kader = $query->get();
            $posts = collect(); // Empty collection for posts
        }

        // Format filter yang aktif
        $filter_message = 'Filter data berdasarkan: ';
        if ($rayon_id) {
            if ($rayon_id === 'all') {
                $filter_message .= 'Semua Rayon';
            } elseif ($rayon_id === 'blog') {
                $filter_message .= 'Laporan Blog / Berita';
            } else {
                $rayon_name = Rayon::find($rayon_id)->rayon ?? 'Tidak Diketahui';
                $filter_message .= 'Rayon: ' . $rayon_name;
            }
        }
        if ($tanggal_awal && $tanggal_akhir) {
            $filter_message .= ' | Tanggal: ' . Carbon::parse($tanggal_awal)->format('d/m/Y') . ' - ' . Carbon::parse($tanggal_akhir)->format('d/m/Y');
        }

        $pdf = app('dompdf.wrapper')->loadView('admin.laporan.kader.pdf', compact('kader', 'posts', 'filter_message', 'rayon_id'));
        return $pdf->stream('laporan.pdf');
    }
}