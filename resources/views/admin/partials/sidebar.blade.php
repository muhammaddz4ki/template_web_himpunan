

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

           
     <!-- <li class="nav-item">
      <a class="nav-link collapsed" href="/">
        <i class="bi bi-globe"></i>
        <span>Go to Website</span>
      </a>
    </li> -->
    <!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link {{ request()->is('/admin') ? ' active' : ' collapsed' }}"  href="/admin">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      {{-- @auth 
        @if (in_array(auth()->user()->role_id, [1]))
          <li class="nav-item">
            <a class="nav-link {{ request()->is('admin/kader*') ? ' active' : ' collapsed' }}" href="/admin/kader">
              <i class="bi bi-person"></i>
              <span>Kader</span>
            </a>
          </li>
        @endif
      @endauth --}}


              
      <li class="nav-item">
       <hr>
     </li>

      <li class="nav-item">
       <a class="nav-link {{ request()->is('admin/user*') ? ' active' : ' collapsed' }}" href="/admin/user">
         <i class="bi bi-people"></i>
         <span>Kader</span>
       </a>
     </li><!-- End Profile Page Nav -->

     <!-- <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-menu-button-wide"></i><span>Kaderisasi</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="/admin/kadermapaba/">
            <i class="bi bi-circle"></i><span>Kader DAD</span>
          </a>
        </li>
        <li>
          <a href="/admin/kaderpkd/">
            <i class="bi bi-circle"></i><span>Kader DAM</span>
          </a>
        </li>
        <li>
          <a href="/admin/kaderpkl/">
            <i class="bi bi-circle"></i><span>Kader DAP</span>
          </a>
        </li>
        <li>
          <a href="/admin/kaderpkn/">
            <i class="bi bi-circle"></i><span>Kader PPK</span>
          </a>
        </li>
      </ul>
    </li> -->
    <!-- End Components Nav -->

    
    @auth 
    @if (in_array(auth()->user()->role_id, [1, 2]))
    <li class="nav-item">
      <a class="nav-link{{ request()->is('admin/rayon*') ? ' active' : ' collapsed' }}" href="/admin/rayon">
        <i class="bi bi-exclude"></i>
        <span>Rayon</span>
      </a>
    </li>          
    @endif
  @endauth


  
      <li class="nav-item">
       <hr>
     </li>

     
     <li class="nav-item">
      <a class="nav-link {{ request()->is('admin/galeri*') ? ' active' : ' collapsed' }}" href="/admin/galeri">
        <i class="bi bi-images"></i>
        <span>Galeri</span>
      </a>
    </li><!-- End Profile Page Nav -->

          
    <!-- <li class="nav-item">
     <a class="nav-link {{ request()->is('admin/perpus*') ? ' active' : ' collapsed' }}" data-bs-target="#tables-books" data-bs-toggle="collapse" href="#">
       <i class="bi bi-book-half"></i></i><span>Perpustkaan</span><i class="bi bi-chevron-down ms-auto"></i>
     </a>
     <ul id="tables-books" class="nav-content collapse " data-bs-parent="#tables-books">
       <li>
         <a href="/admin/categorybooks/">
           <i class="bi bi-circle"></i><span>Category</span>
         </a>
       </li>
       <li>
         <a href="/admin/perpus">
           <i class="bi bi-circle"></i><span>Books</span>
         </a>
       </li>
     </ul>
   </li> -->
   <!-- End Tables Nav -->

   <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-layout-text-window-reverse"></i><span>Blog</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="/admin/post">
          <i class="bi bi-circle"></i><span>Daftar Blog</span>
        </a>
      </li>
      <li>
        <a href="/admin/post/category">
          <i class="bi bi-circle"></i><span>Kategori Blog</span>
        </a>
      </li>
      <li>
        <a href="/admin/post/tag">
          <i class="bi bi-circle"></i><span>Tag</span>
        </a>
      </li>
    </ul>
  </li><!-- End Tables Nav -->

      <li class="nav-item">
        <a class="nav-link {{ request()->is('admin/calendar*') ? ' active' : ' collapsed' }}" href="/admin/calendar">
          <i class="bi bi-calendar-date"></i>
          <span>Agenda</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <!-- <li class="nav-item">
        <a class="nav-link {{ request()->is('admin/hbn*') ? ' active' : ' collapsed' }}" href="/admin/hbn">
          <i class="bi bi-bookmark-check"></i>
          <span>Hari Besar</span>
      </a>
      </li> -->
      <!-- End Profile Page Nav -->

      <li>
       <hr>
      </li>



      {{-- <li class="nav-item">
        <a class="nav-link {{ request()->is('admin/perpus*') ? ' active' : ' collapsed' }}" href="/admin/perpus">
          <i class="bi bi-book-half"></i>
          <span>Perpustakaan</span>
        </a>
      </li> --}}
      <!-- End Profile Page Nav -->

      @auth 
      @if (in_array(auth()->user()->role_id, [1]))

      <li class="nav-item">
       <a class="nav-link {{ request()->is('admin/administrator*') ? ' active' : ' collapsed' }}" href="/admin/administrator">
         <i class="bi bi-people"></i>
         <span>Admin</span>
       </a>
     </li>
     <!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link {{ request()->is('admin/page*') ? ' active' : ' collapsed' }}" href="/admin/page">
          <i class="bi bi-menu-button-wide"></i><span>Banner Slider</span></i>
          {{-- <span>Pages</span> --}}
        </a>
      </li><!-- End Profile Page Nav -->
      
      <!-- <li class="nav-item">
        <a class="nav-link {{ request()->is('admin/quotes*') ? ' active' : ' collapsed' }}" href="/admin/quotes">
          <i class="bi bi-chat-left-text"></i><span>Quotes</span></i>
          {{-- <span>Pages</span> --}}
        </a>
      </li> -->
      <!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link {{ request()->is('admin/pengurus*') ? ' active' : ' collapsed' }}" href="/admin/pengurus">
          <i class="bi bi-person-lines-fill"></i><span>Pengurus</span></i>
          {{-- <span>Pages</span> --}}
        </a>
      </li>
<!-- End Profile Page Nav -->
      <li class="nav-item">
    <a class="nav-link {{ request()->is('struktur-organisasi*') ? 'active' : 'collapsed' }}"
   data-bs-toggle="collapse" href="#organization-structures-collapse">
    <i class="bi bi-diagram-3"></i>
    <span>Struktur Organisasi</span>
    <i class="bi bi-chevron-down ms-auto"></i>
</a>
    <div id="organization-structures-collapse" class="collapse {{ request()->is('organization-structures*') ? 'show' : '' }}">
        <ul class="nav-content">
            <li>
                <a href="{{ route('struktur-organisasi.store') }}" 
                   class="{{ request()->is('struktur-organisasi') ? 'active' : '' }}">
                    <i class="bi bi-list-ul"></i>
                    <span>Daftar Struktur</span>
                </a>
            </li>
            <li>
                <a href="{{ route('struktur-organisasi.create') }}" 
                   class="{{ request()->is('struktur-organisasi/create') ? 'active' : '' }}">
                    <i class="bi bi-plus-circle"></i>
                    <span>Tambah Baru</span>
                </a>
            </li>
        </ul>
    </div>
</li>
      <!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link {{ request()->is('admin/laporan/kader') ? ' active' : ' collapsed' }}" href="/admin/laporan/kader">
          <i class="bi bi-book"></i><span>Laporan</span></i>
        </a>
      </li>
  
<!-- End Profile Page Nav -->
      <li class="nav-item">
    <a class="nav-link {{ request()->is('admin/unverified-users*') ? ' active' : ' collapsed' }}" 
       href="{{ route('admin.user.verify.index') }}">
        <i class="bi bi-person-check"></i>
        <span>Verifikasi</span>
        @if($unverifiedCount = \App\Models\User::where('is_verified', false)->count())
            <span class="badge bg-danger">{{ $unverifiedCount }}</span>
        @endif
    </a>
</li>

      <!-- End Profile Page Nav -->
      @endif
    @endauth

        <li>
         <div>
          <a class="dropdown-item d-flex align-items-center" href="/logout">
           <i class="bi bi-box-arrow-right btn btn-success m-4"><span>Logout</span></i>
         </a>
         </div>
        </li>

{{-- 
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Forms</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="forms-elements.html">
              <i class="bi bi-circle"></i><span>Form Elements</span>
            </a>
          </li>
          <li>
            <a href="forms-layouts.html">
              <i class="bi bi-circle"></i><span>Form Layouts</span>
            </a>
          </li>
          <li>
            <a href="forms-editors.html">
              <i class="bi bi-circle"></i><span>Form Editors</span>
            </a>
          </li>
          <li>
            <a href="forms-validation.html">
              <i class="bi bi-circle"></i><span>Form Validation</span>
            </a>
          </li>
        </ul>
      </li><!-- End Forms Nav -->

        <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Tables</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="tables-general.html">
              <i class="bi bi-circle"></i><span>General Tables</span>
            </a>
          </li>
          <li>
            <a href="tables-data.html">
              <i class="bi bi-circle"></i><span>Data Tables</span>
            </a>
          </li>
        </ul>
      </li> 
      <!-- End Tables Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-bar-chart"></i><span>Charts</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="charts-chartjs.html">
              <i class="bi bi-circle"></i><span>Chart.js</span>
            </a>
          </li>
          <li>
            <a href="charts-apexcharts.html">
              <i class="bi bi-circle"></i><span>ApexCharts</span>
            </a>
          </li>
          <li>
            <a href="charts-echarts.html">
              <i class="bi bi-circle"></i><span>ECharts</span>
            </a>
          </li>
        </ul>
      </li><!-- End Charts Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-gem"></i><span>Icons</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="icons-bootstrap.html">
              <i class="bi bi-circle"></i><span>Bootstrap Icons</span>
            </a>
          </li>
          <li>
            <a href="icons-remix.html">
              <i class="bi bi-circle"></i><span>Remix Icons</span>
            </a>
          </li>
          <li>
            <a href="icons-boxicons.html">
              <i class="bi bi-circle"></i><span>Boxicons</span>
            </a>
          </li>
        </ul>
      </li><!-- End Icons Nav -->

      <li class="nav-heading">Pages</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="users-profile.html">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-faq.html">
          <i class="bi bi-question-circle"></i>
          <span>F.A.Q</span>
        </a>
      </li><!-- End F.A.Q Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-contact.html">
          <i class="bi bi-envelope"></i>
          <span>Contact</span>
        </a>
      </li><!-- End Contact Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-register.html">
          <i class="bi bi-card-list"></i>
          <span>Register</span>
        </a>
      </li><!-- End Register Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-login.html">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>Login</span>
        </a>
      </li><!-- End Login Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-error-404.html">
          <i class="bi bi-dash-circle"></i>
          <span>Error 404</span>
        </a>
      </li><!-- End Error 404 Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-blank.html">
          <i class="bi bi-file-earmark"></i>
          <span>Blank</span>
        </a>
      </li><!-- End Blank Page Nav -->
  --}}
    </ul>

  </aside><!-- End Sidebar-->
