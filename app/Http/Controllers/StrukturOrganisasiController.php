<?php

namespace App\Http\Controllers;

use App\Models\OrganizationStructure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class StrukturOrganisasiController extends Controller
{
    public function index()
    {
        $structures = OrganizationStructure::orderBy('year', 'desc')->get();
        return view('admin.struktur-organisasi.index', compact('structures'));
    }

    public function create()
    {
        return view('admin.struktur-organisasi.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'year' => 'required|integer|min:2000|max:' . (date('Y') + 1),
            'description' => 'nullable|string',
            'image_path' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Di method store()
if ($request->hasFile('image_path')) {
    $file = $request->file('image_path');
    $newFileName = 'struktur_' . $validated['year'] . '_' . now()->timestamp . '.' . $file->getClientOriginalExtension();
    
    // Simpan ke folder yang sama dengan pengurus
    $file->move(public_path('storage/img'), $newFileName);
    $validated['image_path'] = $newFileName;
}

        OrganizationStructure::create($validated);

        Alert::success('Success', 'Struktur Organisasi berhasil ditambahkan');
        return redirect()->route('struktur-organisasi.index');
    }

    public function edit(OrganizationStructure $struktur_organisasi)
    {
        return view('admin.struktur-organisasi.edit', compact('struktur_organisasi'));
    }

    public function update(Request $request, OrganizationStructure $struktur_organisasi)
    {
        $validated = $request->validate([
            'year' => 'required|integer|min:2000|max:' . (date('Y') + 1),
            'description' => 'nullable|string',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('image_path')) {
            // Delete old image
            if ($struktur_organisasi->image_path) {
                $oldImagePath = public_path('/storage/img/') . $struktur_organisasi->image_path;
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
            
            // Store new image
            $extension = $request->image_path->getClientOriginalExtension();
            $newFileName = 'struktur_' . $validated['year'] . '_' . now()->timestamp . '.' . $extension;
            $request->file('image_path')->move(public_path('/storage/img'), $newFileName);
            $validated['image_path'] = $newFileName;
        }

        $struktur_organisasi->update($validated);

        Alert::success('Success', 'Struktur Organisasi berhasil diperbarui');
        return redirect()->route('struktur-organisasi.index');
    }

    public function destroy(OrganizationStructure $struktur_organisasi)
    {
        // Delete image file
        if ($struktur_organisasi->image_path) {
            $imagePath = public_path('/storage/img/') . $struktur_organisasi->image_path;
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        
        $struktur_organisasi->delete();

        Alert::success('Success', 'Struktur Organisasi berhasil dihapus');
        return redirect()->route('struktur-organisasi.index');
    }

    public function show(Request $request)
    {
        $listTahun = OrganizationStructure::select('year')
                        ->distinct()
                        ->orderBy('year', 'desc')
                        ->pluck('year');

        $selectedYear = $request->year ?? $listTahun->first();

        $structure = OrganizationStructure::where('year', $selectedYear)->first();

        $user = auth()->user();

        return view('user.struktur-organisasi', [
            'structure' => $structure,
            'listTahun' => $listTahun,
            'selectedYear' => $selectedYear,
            'user' => $user,
        ]);
    }
}