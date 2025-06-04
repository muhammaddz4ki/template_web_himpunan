@section('title') {{ 'Profile' }}@endsection
@extends('user.layout')
@section('content')
    
<div class="container my-4" style="padding-top: 5rem">
  
  <header class="pt-3 pb-5 bg-white">
    <div class="container d-flex align-items-center justify-content-between">
        <div class="d-flex align-items-center">
            <img src="{{ asset('sim-pcimm-lampura/public/storage/img/'. $profile->img) }}" alt="Profile Image" class="rounded-circle mr-4 profile-image-desktop" style="width: 125px; height: 125px; object-fit: cover;">
            <div class="d-flex flex-column">
                <h1 class="h4 font-weight-bold">
                  {{ $profile->username }} 
                  @if($profile->centang == '1')
                    <i class="fas fa-check-circle text-primary"></i>
                  @endif
                </h1>
                <div class="d-flex align-items-center">
                    <span class="mr-4"><strong>{{ $countpost }}</strong> Artikels</span>
                    <span class="mr-4"><strong>{{ $countgaleri }}</strong> photos</span>
                </div>
                  @if($profile->kaderisasi == 'Belum DAD')
                    <button class="btn btn-sm btn-danger pb-0">Belum DAD</button>
                  @endif   
                  @if($profile->kaderisasi == 'DAD')
                    <button class="btn btn-sm btn-success pb-0">Kader DAD</button>
                  @endif   
                  @if($profile->kaderisasi == 'DAM')
                    <button class="btn btn-sm btn-success pb-0">Kader DAM</button>
                  @endif   
                  @if($profile->kaderisasi == 'DAP')
                    <button class="btn btn-sm btn-success pb-0">Kader DAP</button>
                  @endif   
                  @if($profile->kaderisasi == 'PPK')
                    <button class="btn btn-sm btn-success pb-0">Kader PPK</button>
                  @endif   
                <p class="mt-2">{{ $profile->bio }}</p>

                <!-- Medsos -->
                <div class="social-links">
                  <a href="{{ $user->twitter }}" target="_blank" class="twitter">
                    <i class="bi bi-twitter"></i>
                  </a>
                  <a href="{{ $user->fb }}" target="_blank" class="facebook">
                    <i class="bi bi-facebook"></i>
                  </a>
                  <a href="{{ $user->ig }}" target="_blank" class="instagram">
                    <i class="bi bi-instagram"></i>
                  </a>
                  <a href="https://wa.me/{{ $user->wa }}" target="_blank" class="whatsapp">
                    <i class="bi bi-whatsapp"></i>
                  </a>
                </div>
            </div>
        </div>
    </div>
</header>

	<br>
	<section class="galeri">
		<div class="galeri-info">
			<div class="li-2">
				<ul class="list-inline">
					<li><b><hr></b></li>
					<li><b></b></li>
					<li><b>{{ $countgaleri }}</b> Photo Terbaru</li>
					<li><b></b>dari {{ $profile->username }}</li>
          <li><b><hr></b></li>
				</ul>
			</div>
		</div>
		<div class="container">
			<div class="galeri-grid">

        <div class="row">
          @foreach ($profilegaleri as $item)
          <div class="col-lg-3">
            <div class="galeri-item">
              <img src="{{ asset('sim-pcimm-lampura/public/storage/img/'. $item->img) }}" alt="Gallery Image" class="img-fluid">
            </div>
          </div>
          @endforeach
        </div>

			</div>
		</div>
  </div>
	</section>

  @endsection
