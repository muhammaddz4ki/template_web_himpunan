@section('title', 'Struktur Organisasi')
@extends('admin.layout')

@section('content')
<div class="card info-card sales-card">
    <div class="container my-3">
        <h4 class="my-5">Daftar Struktur Organisasi</h4>

        <a href="{{ route('struktur-organisasi.create') }}" class="btn btn-primary mb-3">
            <i class="bi bi-plus-circle"></i> Tambah Struktur
        </a>

        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tahun</th>
                        <th>Gambar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($structures as $structure)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $structure->year }}</td>
                        <td>
    <img src="{{ url('/sim-pcimm-lampura/public/storage/img/' . $structure->image_path) }}" 
         alt="Struktur {{ $structure->year }}" 
         style="max-width: 150px; height: auto;">
</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('struktur-organisasi.edit', $structure->id) }}" 
                                   class="btn btn-sm btn-warning">
                                    <i class="bi bi-pencil"></i> Edit
                                </a>
                                <form action="{{ route('struktur-organisasi.destroy', $structure->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" 
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus?')">
                                        <i class="bi bi-trash"></i> Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection