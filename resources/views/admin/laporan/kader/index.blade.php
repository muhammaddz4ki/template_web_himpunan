@section('title') {{ 'Laporan' }}@endsection
@extends('admin.layout')
@section('content')

<div class="container">
    <h1>Data Laporan</h1>

    <!-- Form Filter -->
    <form action="{{ route('admin.laporan.kader.filter') }}" method="POST" class="mb-4">
        @csrf
        <div class="row">
            <div class="col-md-4">
                <label for="rayon_id">Jenis Laporan</label>
                <select name="rayon_id" id="rayon_id" class="form-control" required>
                    <option value="">-- Pilih Jenis Laporan --</option>

                    <optgroup label="Laporan Kader Berdasarkan Rayon">
                        <option value="all" {{ request('rayon_id') == 'all' ? 'selected' : '' }}>Semua Rayon</option>
                        @foreach ($rayons as $rayon)
                            <option value="{{ $rayon->id }}" {{ request('rayon_id') == $rayon->id ? 'selected' : '' }}>
                                {{ $rayon->rayon }}
                            </option>
                        @endforeach
                    </optgroup>

                    <optgroup label="Laporan Berita PC-IMM Lampura">
                        <option value="blog" {{ request('rayon_id') == 'blog' ? 'selected' : '' }}>Laporan Blog / Artikel</option>
                    </optgroup>
                </select>
            </div>
            <div class="col-md-3">
                <label for="tanggal_awal">Tanggal Awal:</label>
                <input type="date" name="tanggal_awal" id="tanggal_awal" class="form-control" 
                    value="{{ request('tanggal_awal') }}">
            </div>
            <div class="col-md-3">
                <label for="tanggal_akhir">Tanggal Akhir:</label>
                <input type="date" name="tanggal_akhir" id="tanggal_akhir" class="form-control"
                    value="{{ request('tanggal_akhir') }}">
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary mt-4"><i class="bi bi-filter"></i> Filter Data</button>
            </div>
        </div>
    </form>

    <hr />

    @if(request()->isMethod('post'))
        <div class="alert alert-info">
            <p class="mb-0">
                <strong>Filter Berdasarkan:</strong>
                @if(request('rayon_id'))
                    @if(request('rayon_id') == 'all')
                        <strong>Rayon:</strong> Semua Rayon
                    @elseif(request('rayon_id') == 'blog')
                        <strong>Jenis Laporan:</strong> Blog / Berita
                    @else
                        @php
                            $rayon = \App\Models\Rayon::find(request('rayon_id'));
                        @endphp
                        @if($rayon)
                            <strong>Rayon:</strong> {{ $rayon->rayon }}
                        @else
                            <strong>Rayon:</strong> Tidak ditemukan
                        @endif
                    @endif
                @endif
                @if(request('tanggal_awal') && request('tanggal_akhir'))
                    @if(request('rayon_id')) | @endif
                    Tanggal: {{ \Carbon\Carbon::parse(request('tanggal_awal'))->format('d/m/Y') }} -
                    {{ \Carbon\Carbon::parse(request('tanggal_akhir'))->format('d/m/Y') }}
                @endif
            </p>
            <p class="mb-0">
                @if(request('rayon_id') == 'blog')
                    <strong>Total Data:</strong> {{ $posts->count() }} Blog / Berita
                @else
                    <strong>Total Data:</strong> {{ $kader->count() }} Kader
                @endif
            </p>
        </div>
    @endif

    <!-- Tombol Cetak PDF -->
    @if(request()->isMethod('post') && (($posts->isNotEmpty() && request('rayon_id') == 'blog') || ($kader->isNotEmpty() && request('rayon_id') != 'blog')))
        <button class="btn btn-danger mb-4" id="export-pdf-btn">
            <a href="{{ route('laporan.kader.export-pdf', [
                'rayon_id' => request('rayon_id'),
                'tanggal_awal' => request('tanggal_awal'),
                'tanggal_akhir' => request('tanggal_akhir')
            ]) }}" target="_blank" class="text-white fw-bold text-decoration-none">
                <i class="bi bi-printer"></i> Cetak PDF
            </a>
        </button>
    @endif

    <!-- Tabel Laporan Kader -->
    @if(request('rayon_id') != 'blog' && $kader->isNotEmpty())
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>NPM</th>
                    <th>Kelamin</th>
                    <th>Rayon</th>
                    <th>Prodi</th>
                    <th>Alamat</th>
                    <th>WhatsApp</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kader as $item)
                    <tr>
                        <td>{{ $item->name ?? '-' }}</td>
                        <td>{{ $item->nim ?? '-' }}</td>
                        <td>
                            @php
                                $gender = '-';
                                if ($item->kelamin == 'L') {
                                    $gender = 'Laki-Laki';
                                } elseif ($item->kelamin == 'P') {
                                    $gender = 'Perempuan';
                                }
                            @endphp
                            {{ $gender }}
                        </td>
                        <td>{{ $item->rayon->rayon ?? '-' }}</td>
                        <td>{{ $item->prodi ?? '-' }}</td>
                        <td>{{ $item->alamat ?? '-' }}</td>
                        <td>{{ $item->wa ?? '-' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    
    <!-- Tabel Laporan Blog -->
    @elseif(request('rayon_id') == 'blog' && $posts->isNotEmpty())
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Kategori</th>
                    <th>Penulis</th>
                    <th>Status</th>
                    <th>Tanggal Publikasi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->title ?? '-' }}</td>
                        <td>{{ $post->category->title ?? '-' }}</td>
                        <td>{{ $post->user->name ?? '-' }}</td>
                        <td>{{ $post->active ? 'Aktif' : 'Tidak Aktif' }}</td>
                        <td>{{ \Carbon\Carbon::parse($post->created_at)->format('d/m/Y H:i') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Data tidak ditemukan. Silakan coba filter dengan kriteria lain.</p>
    @endif
</div>
@endsection