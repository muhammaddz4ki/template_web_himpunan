@section('title', 'Struktur Organisasi')
@extends('user.layout')

@section('content')
<div class="container my-5">
    <section id="portfolio">
        <div class="container" data-aos="fade-up">

            <header class="section-header">
                <h3>STRUKTUR ORGANISASI PC IMM LAMPUNG UTARA</h3>
                <p>Masa Bakti {{ $selectedYear }}/{{ $selectedYear + 1 }}</p>
            </header>

            <div class="row justify-content-center mb-5">
                <div class="col-md-8 col-lg-6">
                    <div class="filter-card p-4 shadow rounded">
                        <form action="{{ route('struktur-organisasi.show') }}" method="GET" class="row g-3">
                            <div class="col-md-8">
                                 <select name="tahun" id="tahun" class="form-select select2 border-start-0 py-2">
                    @foreach ($listTahun as $tahun)
                        <option value="{{ $tahun }}" {{ $tahun == $selectedYear ? 'selected' : '' }}>
                            {{ $tahun }}/{{ $tahun + 1 }}
                        </option>
                    @endforeach
                  </select>
                            </div>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-danger btn-lg w-100 filter-btn">
  <i class="bi bi-funnel-fill me-2"></i>Filter
</button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                @if($structure)
                    <div class="col-lg-10">
                        <div class="card shadow-sm border-0">
                            <div class="card-body text-center p-4">
                                
                                @if(file_exists(public_path('storage/img/' . $structure->image_path)))
    <img src="{{ url('/sim-pcimm-lampura/public/storage/img/' . $structure->image_path) }}" 
         alt="Struktur {{ $structure->year }}"
         class="img-fluid rounded" style="max-height: 800px;">
@else
    <div class="alert alert-warning">
        <i class="bi bi-exclamation-triangle-fill me-2"></i> 
        Gambar struktur organisasi tidak ditemukan.
    </div>
@endif

                                
                                @if($structure->description)
                                <div class="mt-4 text-start">
                                    <p>{{ $structure->description }}</p>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @else
                    <div class="col-12">
                        <div class="alert alert-info text-center py-4">
                            <i class="bi bi-info-circle-fill me-2"></i> 
                            Tidak ada data struktur organisasi untuk tahun {{ $selectedYear }}
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
</div>

<style>
    .filter-card {
        background: #f8f9fa;
        border-radius: 10px;
    }
    
    .section-header h3 {
        color: #dc3545;
        font-weight: 700;
    }
    
    .card {
        border-radius: 15px;
        transition: transform 0.3s ease;
    }
    
    .card:hover {
        transform: translateY(-5px);
    }
</style>
@endsection