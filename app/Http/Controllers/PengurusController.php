<?php

namespace App\Http\Controllers;

use App\Models\Pengurus;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class PengurusController extends Controller
{
    public function show(Request $request)
{
    $user = Auth::user();

    // Ambil semua tahun unik dari kolom 'tahun' secara descending (terbesar ke terkecil)
    $listTahun = Pengurus::select('tahun')
                    ->distinct()
                    ->orderBy('tahun', 'desc')
                    ->pluck('tahun');

    // Ambil tahun terbesar sebagai default jika tidak ada parameter tahun
    $selectedYear = $request->tahun ?? $listTahun->first();

    // Ambil data pengurus berdasarkan tahun yang dipilih
    $penguruses = Pengurus::where('tahun', $selectedYear)->get();

    return view('user.pengurus', [
        'user' => $user,
        'penguruses' => $penguruses,
        'listTahun' => $listTahun,
        'selectedYear' => $selectedYear 
    ]);
}

    public function index(Request $request)
    {
        $penguruses = Pengurus::latest()->get();
        return view('admin.pengurus.index', compact('penguruses'));
    }

    public function create()
    {
        return view('admin.pengurus.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'jabatan'  => 'required|string|max:255',
            'tahun'    => 'required|integer|min:2000|max:' . (date('Y') + 1),
            'img'      => 'nullable|image|max:2048',
        ]);

        $penguruses = $request -> all();
      $request->file('img')->getClientOriginalExtension();
      if ($request->img) {
        $extension = $request->img->getClientOriginalExtension();
        $newFileName = 'pengurus' . '_' . $request->name . '-' . now()->timestamp . '.' . $extension;
        $request->file('img')->move(public_path('/storage/img'), $newFileName);
        $penguruses['img'] = $newFileName;
    }
      $penguruses = Pengurus::create($penguruses);
      Alert::success('Mantap IMMawan & IMMawati', 'Pengurus Berhasil Ditambahkan');
      return redirect('/admin/pengurus');
    }

    public function edit($id)
    {
        $penguruses = Pengurus::findOrFail($id);
        return view('admin.pengurus.edit', compact('penguruses'));
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'jabatan'  => 'required|string|max:255',
            'tahun'    => 'required|integer|min:2000|max:' . (date('Y') + 1),
            'img'      => 'nullable|image|max:2048',
        ]);

        $pengurusToUpdate = Pengurus::findOrFail($id);
        $pengurusData = $request->all();

        if ($request->hasFile('img')) {
            $extension = $request->img->getClientOriginalExtension();
            $newFileName = 'pengurus_update' . '_' . $request->name . '-' . now()->timestamp . '.' . $extension;
            $request->file('img')->move(public_path('/storage/img'), $newFileName);
            $pengurusData['img'] = $newFileName;
        }

        $pengurusToUpdate->update($pengurusData);

        Alert::success('Mantap IMMawan & IMMawati', 'Pengurus Berhasil Diubah');
        return redirect('/admin/pengurus');
    }

    public function destroy($id)
    {
        $pengurus = Pengurus::findOrFail($id);
        $pengurus->delete();

        Alert::success('Mantap IMMawan & IMMawati', 'Pengurus Berhasil Dihapus');
        return redirect('/admin/pengurus/');
    }
}
