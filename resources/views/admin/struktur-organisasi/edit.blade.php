@section('title', 'Edit Struktur Organisasi')
@extends('admin.layout')

@section('content')
<div class="card info-card sales-card">
    <div class="container">
        <h4 class="text-center mb-4 mt-5">Edit Struktur Organisasi</h4>

        <form action="{{ route('struktur-organisasi.update', $struktur_organisasi->id) }}" 
              method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="year" class="form-label">Tahun *</label>
                        <input type="number" class="form-control @error('year') is-invalid @enderror" 
                               id="year" name="year" value="{{ old('year', $struktur_organisasi->year) }}" 
                               min="2000" max="{{ date('Y') + 1 }}" required>
                        @error('year')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" 
                                  id="description" name="description" 
                                  rows="3">{{ old('description', $struktur_organisasi->description) }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="image_path" class="form-label">Gambar Baru</label>
                        <input type="file" class="form-control @error('image_path') is-invalid @enderror" 
                               id="image_path" name="image_path">
                        @error('image_path')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="text-muted">Biarkan kosong jika tidak ingin mengubah gambar</small>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="text-center">
                        <p class="fw-bold">Gambar Saat Ini:</p>
                        @if(file_exists(public_path('storage/img/' . $struktur_organisasi->image_path)))
                            <img src="{{ url('/sim-pcimm-lampura/public/storage/img/' . $struktur_organisasi->image_path) }}" 
                                 alt="Struktur {{ $struktur_organisasi->year }}"
                                 class="img-fluid rounded" style="max-height: 800px;">
                        @else
                            <p class="text-muted">Belum ada gambar yang diunggah.</p>
                        @endif
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-between mt-4">
                <a href="{{ route('struktur-organisasi.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save"></i> Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
