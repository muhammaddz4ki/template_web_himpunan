@section('title') {{ 'Profile' }}@endsection
@extends('user.layout')
@section('content')
<div class="container my-4" style="padding-top: 5rem">
  
  <header class="pt-3 pb-5 bg-white">
    <div class="container d-flex align-items-center justify-content-between">
        <div class="d-flex align-items-center">
            <img src="{{ asset('sim-pcimm-lampura/public/storage/img/'. $profile->img) }}" alt="Profile Image" class="rounded-circle mr-4 profile-image-desktop" style="width: 125px; height: 125px; object-fit: cover;">
            <div class="d-flex flex-column">
                <h3 class="h3 font-weight-bold m-0 p-0">
                  {{ $profile->name }} 
                </h3>
                <h3 class="h6 m-0 p-0">
                  <span>@</span>{{ $profile->username }} 
                  @if($profile->centang == '1')
                    <i class="fas fa-check-circle text-primary"></i>
                  @endif
                </h3>
                <br>
                <div class="d-flex align-items-center justify-content-start" style="margin-top:-20px;">
                  <a href="/account" class="btn btn-dark sm" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;" ><i class="bi bi-pencil-square"></i> Edit profile</a>
                  @auth 
                    @if (in_array(auth()->user()->role_id, [1, 2, 3, 4, 5]))
                      <a href="/uploads" class="btn btn-dark sm m-2" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;" ><i class="bi bi-cloud-arrow-up"></i> Uploads</a>
                    @endif
                  @endauth
                  <!-- <a href="/kta/user/download/pdf/{{ $profile->id }}/my-kta/" class="btn btn-dark sm" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;" ><i class="bi bi-printer"></i> Cetak KTA</a> -->
                </div>
                <div class="d-flex align-items-center">
                    <span class="mr-4"><strong>{{ $countpost }}</strong> Artikels</span>
                    <span class="mr-4"><strong>{{ $countgaleri }}</strong> photos</span>
                    <!-- Menu Perpus /  Library Dihapus -->
                </div>
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
					<li><b></b>dari <span>@</span>{{ $profile->username }}</li>
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
<script>
$('textarea#summernote').summernote({
  placeholder: 'Sahabat bisa membuat tulisan disini',
  tabsize: 2,
  height: 100,
  toolbar: [
        ['font', ['bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['insert', ['link', 'picture', 'hr']],
        ['view', ['fullscreen', 'codeview']],
      ],
    });
</script>
  @endsection