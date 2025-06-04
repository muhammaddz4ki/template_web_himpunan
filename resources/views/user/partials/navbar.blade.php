<!-- ======= Header ======= -->
<header id="header" class="fixed-top d-flex align-items-center header-transparent" style="background-color:#c2041d; border-bottom:3px solid #ababab;">
  <div class="container-fluid">

    <div class="row justify-content-center align-items-center">
      <div class="col-xl-11 d-flex align-items-center justify-content-between">
        <h1 class="logo"><a href="/" style="text-decoration: none; color: #eee;"><img src="/img/logokomi.png" class="img-fluid"> PC IMM Lampura</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

        <nav id="navbar" class="navbar">
          <ul >
            <!-- @auth 
              @if (in_array(auth()->user()->role_id, [1, 2]))
                <li ><a class="nav-link scrollto" href="/admin" >Dashboard</a></li>
              @endif
            @endauth -->
            <li><a class="nav-link scrollto {{ '/' ==request()->path()? 'active' :''}}" href="/">Beranda</a></li>
            <li class="dropdown"><a href="/#about"><span>Tentang</span> <i class="bi bi-chevron-down"></i></a>
              <ul>
                <li><a href="/#about">Tentang Kami</a></li>
                <li><a href="/pengurus">Pengurus</a></li>
                <li><a href="/tentang/struktur-organisasi">Struktur Organisasi</a></li>
              </ul>
            </li>
            <li><a class="nav-link scrollto {{ 'blog' == request()->path()? 'active' : '' }}" href="/post">Blog</a></li>
            <li><a class="nav-link scrollto {{ 'galeri' ==request()->path()? 'active' :''}}" href="/galeri">Galeri</a></li>
            <!-- <li><a class="nav-link scrollto {{ 'perpus' ==request()->path()? 'active' :''}}" href="/perpus">Perpustakaan</a></li> -->
            <li><a class="nav-link scrollto {{ 'calendar' ==request()->path()? 'active' :''}}" href="/calendar">Agenda</a></li>
            <!-- <li><a class="nav-link scrollto {{ 'contact' == request()->path()? 'active' : '' }}" href="/contact">Aspirasi</a></li>
            <li> -->
              @guest
                  @if (Route::has('login'))
                      <a class="nav-link scrollto {{ 'profile' ==request()->path()? 'active' :''}}" href="{{ route('login') }}">{{ __('Login') }}</a>
                  @endif
              @else
                  <li class="nav-item dropdown pe-3 pl-lg-3">
                      <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                          <!-- <span >{{ Str::limit($user->username, 6) }}</span><i class="bi bi-chevron-down"></i> -->
                          <span >Akun Saya</span><i class="bi bi-chevron-down"></i>
                      </a><!-- End Profile Iamge Icon -->
                      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                          <li class="dropdown-header">
                              <img src="{{ asset('sim-pcimm-lampura/public/storage/img/' . $user->img ) }}" style="width: 40px; height:40px; object-fit:cover " alt="Profile" class="rounded-circle">
                              &nbsp; <span class="fw-bold">{{ $user->username }}</span>
                          </li>

                          <hr class="m-0 p-0">

                          @auth 
                            @if (in_array(auth()->user()->role_id, [1, 2]))
                              <li>
                                <a class="dropdown-item d-flex align-items-start" href="/admin">
                                    <span>Dashboard</span>
                                </a>
                              </li>
                            @endif
                          @endauth

                          <li>
                              <a class="dropdown-item d-flex align-items-center" href="/profile">
                                  <span>My Profile</span>
                              </a>
                          </li>
                          <!-- <li>
                            <a class="dropdown-item d-flex align-items-center" href="/account">
                              <span>Account Settings</span>
                            </a>
                          </li> -->
                          <!-- @auth 
                              @if (in_array(auth()->user()->role_id, [1, 2, 3]))
                                  <li>
                                      <a class="dropdown-item d-flex align-items-center" href="/uploads">
                                          <span>Uploads</span>
                                      </a>
                                  </li>
                              @endif
                          @endauth -->

                          <hr class="m-0 p-0">

                          <li>
                            <a class="dropdown-item d-flex align-items-center" href="/logout">
                              <span>Logout</span>
                            </a>
                          </li>
                      </ul><!-- End Profile Dropdown Items -->
                  </li><!-- End Profile Nav -->
              @endguest
          </li>
              {{-- <li><a href="/logout">logout</a></li> --}}
          </ul>
          <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

      </div>
    </div>
  </div>
</header><!-- End Header -->