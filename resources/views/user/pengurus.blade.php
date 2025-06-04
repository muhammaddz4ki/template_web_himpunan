@section('title') {{ 'Pengurus' }} @endsection
@extends('user.layout')

@section('content')
<div class="text-center">
  <h4 class="pt-5"></h4>
</div>

<div class="container my-4">
  <section id="portfolio">
    <div class="container" data-aos="fade-up">

      <header class="section-header" style="padding: 5rem">
        <h3 style="text-transform: none">PENGURUS 
          <br> PC IMM Lampung Utara <br>
          Universitas Muhammadiyah Kotabumi <br> 
          Masa Bakti {{ $selectedYear }}/{{ $selectedYear + 1 }}
        </h3>
      </header>

      {{-- Filter Tahun --}}
      <div class="row justify-content-center mb-5">
        <div class="col-md-8 col-lg-6">
          <div class="filter-card p-4 shadow-lg rounded-3" style="background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);">
            <form action="{{ route('pengurus.tahun') }}" method="GET" class="row g-3 align-items-center">
              <div class="col-md-8">
                <div class="input-group input-group-lg">
                  <span class="input-group-text bg-white border-end-0">
                    <i class="bi bi-calendar-range text-danger"></i>
                  </span>
                  <select name="tahun" id="tahun" class="form-select select2 border-start-0 py-2">
                    @foreach ($listTahun as $tahun)
                        <option value="{{ $tahun }}" {{ $tahun == $selectedYear ? 'selected' : '' }}>
                            {{ $tahun }}/{{ $tahun + 1 }}
                        </option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <button type="submit" class="btn btn-primary btn-lg w-100 filter-btn">
                  <i class="bi bi-funnel-fill me-2"></i>Filter
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>

      {{-- Daftar Pengurus --}}
      <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="200">
        @forelse ($penguruses as $pengurus)
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card border-0 shadow-sm h-100 hover-effect">
              <div class="portfolio-wrap">
                <figure class="m-0 position-relative">
                  <img src="{{ asset('sim-pcimm-lampura/public/storage/img/' . $pengurus->img) }}" 
                       class="img-fluid w-100"
                       alt="{{ $pengurus->name }}"
                       style="height: 300px; object-fit: cover; box-shadow: 0px 0px 5px rgba(0,0,5,0.4);">

                  <div class="portfolio-links d-flex justify-content-center align-items-center position-absolute top-0 start-0 w-100 h-100" 
                       style="background: rgba(0,0,0,0.4); opacity: 0; transition: 0.3s;">
                    <a href="{{ asset('sim-pcimm-lampura/public/storage/img/' . $pengurus->img) }}" 
                       data-lightbox="portfolio" 
                       data-title="{{ $pengurus->name }}" 
                       class="text-white mx-2 fs-4">
                      <i class="bi bi-plus"></i>
                    </a>
                    @if ($pengurus->ig)
                    <a href="{{ $pengurus->ig }}" class="text-white mx-2 fs-4" title="Instagram" target="_blank">
                      <i class="bi bi-instagram"></i>
                    </a>
                    @endif
                  </div>
                </figure>
              </div>
              <div class="card-body text-center">
                <h5 class="card-title mb-1 fw-bold">{{ $pengurus->name }}</h5>
                <p class="text-uppercase fw-bold text-danger mb-0">{{ $pengurus->jabatan }}</p>
              </div>
            </div>
          </div>
        @empty
          <div class="col-12">
            <div class="alert alert-info text-center py-3">
              <i class="bi bi-info-circle-fill me-2"></i> Tidak ada data pengurus untuk masa bakti ini.
            </div>
          </div>
        @endforelse
      </div>

    </div>
  </section>
</div>

{{-- ======================= STYLING ======================= --}}
<style>
  .filter-card {
    border: none;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
  }

  .filter-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
  }

  .filter-btn {
    background: linear-gradient(135deg, #dc3545 0%, #b02a37 100%);
    border: none;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
  }

  .filter-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(220, 53, 69, 0.4);
  }

  .filter-btn::after {
    content: '';
    position: absolute;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: rgba(255,255,255,0.1);
    transform: rotate(45deg);
    transition: all 0.3s ease;
  }

  .filter-btn:hover::after {
    left: 100%;
  }

  .portfolio-wrap {
    position: relative;
    overflow: hidden;
    border-radius: 8px 8px 0 0;
  }

  .portfolio-links {
    position: absolute;
    inset: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    background: rgba(0, 0, 0, 0.5);
    opacity: 0;
    transition: 0.3s;
  }

  .hover-effect:hover .portfolio-links {
    opacity: 1;
  }

  .hover-effect {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
  }

  .hover-effect:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
  }

  .select2-container--default .select2-selection--single {
    height: 46px;
    border: 1px solid #ced4da !important;
    border-left: none !important;
  }

  .select2-container--default .select2-selection--single .select2-selection__rendered {
    line-height: 46px;
    padding-left: 10px;
  }

  .select2-container--default .select2-selection--single .select2-selection__arrow {
    height: 44px;
  }
</style>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
  $(document).ready(function() {
    $('.select2').select2({
      placeholder: "Pilih Masa Bakti",
      allowClear: true,
      width: '100%'
    });
  });
</script>
@endpush
@endsection
