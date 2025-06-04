@section('title', 'Tambah Struktur Organisasi')
@extends('admin.layout')

@section('content')
<div class="card info-card sales-card">
    <div class="container">
        <h4 class="text-center mb-4 mt-5">Tambah Struktur Organisasi</h4>

        <form action="{{ route('struktur-organisasi.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="year" class="form-label">Tahun *</label>
                <input type="number" class="form-control @error('year') is-invalid @enderror" 
                       id="year" name="year" value="{{ old('year') }}"
                       min="2000" max="{{ date('Y') + 1 }}" required>
                @error('year')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Deskripsi</label>
                <textarea class="form-control @error('description') is-invalid @enderror" 
                          id="description" name="description" rows="3">{{ old('description') }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="image_path" class="form-label">Gambar Struktur *</label>
                <input type="file" class="form-control @error('image_path') is-invalid @enderror" 
                       id="image_path" name="image_path" required>
                @error('image_path')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <small class="text-muted">Format: JPEG/PNG, Maksimal: 2MB</small>
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('struktur-organisasi.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save"></i> Simpan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection