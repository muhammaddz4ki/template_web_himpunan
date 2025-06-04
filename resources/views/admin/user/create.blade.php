<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User | PC IMM Lampura</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>


@extends('admin.layout')
  @section('content')
  <div class="card info-card sales-card">
      <div class="container">
  
        <div class="text-center pt-5 mt-5">
          <h4>Tambah Kader</h4>
        </div>

        <form action="{{ route('store.user') }}" method="post" enctype="multipart/form-data" >
          @csrf 

          <div class="row pt-4 mt-5">

              <div class="col-md-6">
                <div class="row">
                    <!-- Kolom Nama Lengkap -->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Lengkap Sesuai KTP</label>
                            <input type="text" name="name" class="form-control
                            @error('name') is-invalid @enderror" id="name" placeholder="Nama lengkap kader..." required>

                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Kolom NIM/NPM -->
                    <div class="col-md-6">
                        <div class="mb-3 position-relative">
                            <label for="nim" class="form-label">NIM/NPM</label>
                            <input type="text" name="nim" id="nim" class="form-control @error('nim') is-invalid @enderror" 
                                placeholder="NIM/NPM..." required minlength="3" maxlength="12" oninput="updateSuggestions()" autocomplete="off">

                            @error('nim')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <div id="suggestions" class="dropdown-menu" style="display: none; width: 100%; position: absolute; z-index: 1000;"></div>
                        </div>
                    </div>
                </div>
      
                <div class="row">
                    <!-- Kolom Username -->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" name="username" id="username" class="form-control @error('username') is-invalid @enderror" 
                                placeholder="Username..." required>
                            @error('username')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <!-- Kolom Jenis Kelamin -->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="kelamin" class="form-label">Jenis Kelamin</label>
                            <select name="kelamin" id="kelamin" class="form-select @error('kelamin') is-invalid @enderror">
                                <option disabled selected>-- Pilih Jenis Kelamin --</option>
                                <option value="L">Laki-Laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                            @error('kelamin')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                  <div class="form-group mb-3">
                    <label for="email" class="form-label">Email Aktif</label>
                    <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" placeholder="Email Aktif...">
                    @error('email')
                        <small style="color:red;">{{ $message }}</small>
                    @enderror
                 </div>

                 <div class="row">
                    <!-- Kolom Password -->
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="password" class="form-label">Password</label>
                            <div class="input-group">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password" placeholder="Password...">
                                <button type="button" id="togglePassword" class="btn btn-primary">
                                    <i id="toggleIcon" class="bi bi-eye"></i>
                                </button>
                            </div>
                            @error('password')
                                <small style="color:red;">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <!-- Kolom Konfirmasi Password -->
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="password-confirm" class="form-label">Konfirmasi Password</label>
                            <div class="input-group">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password" placeholder="Konfirmasi Password...">
                                <button type="button" id="toggleConfirmPassword" class="btn btn-primary">
                                    <i id="toggleConfirmIcon" class="bi bi-eye"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
      
                  <!-- <div class="mb-3">
                  <label for="t_lahir" class="form-label">Kota Kelahiran</label>
                  <input type="text" name="t_lahir"id="t_lahir"  class="form-control
                  @error('t_lahir') is-invalid @enderror" id="t_lahir" >
                  
                  @error('t_lahir')
                      <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                  </div>

                  <div class="mb-3">
                    <label for="ttl" class="form-label">Tanggal Lahir</label>
                    <input type="date" name="ttl"id="ttl"  class="form-control
                    @error('ttl') is-invalid @enderror" id="ttl" required>
                    
                    @error('ttl')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div> -->

                  <!-- Form Input Provinsi dihapus -->

                  <!-- <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat Domisili</label>
                    <textarea name="alamat" id="alamat" class="form-control 
                    @error('alamat') is-invalid @enderror" rows="4" ></textarea>
                  
                    @error('alamat')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="mb-3">
                    <label for="pesantren" class="form-label">Nama Pesantren</label>
                    <input type="text" name="pesantren"id="pesantren"  class="form-control
                    @error('pesantren') is-invalid @enderror" id="pesantren" placeholder="Jika Sempat Tinggal Di Pondok">
                    
                    @error('pesantren')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="mb-3">
                    <label for="sma" class="form-label">Nama SMA/Sederajat</label>
                    <input type="text" name="sma"id="sma"  class="form-control
                    @error('sma') is-invalid @enderror" id="sma" required>
                    
                    @error('sma')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div> -->
              </div>
                
              <div class="col-md-6">
                <!-- <div class="mb-3">
                  <label for="thn_lulus" class="form-label">Tahun Lulus SMA/Sederajat</label>
                  <input type="number" name="thn_lulus"id="thn_lulus"  class="form-control
                  @error('thn_lulus') is-invalid @enderror" id="thn_lulus" required>
                  
                  @error('thn_lulus')
                      <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>

                <div class="mb-3">
                  <label for="thn_kuliah" class="form-label">Tahun Kuliah</label>
                  <input type="number" name="thn_kuliah"id="thn_kuliah"  class="form-control
                  @error('thn_kuliah') is-invalid @enderror" id="thn_kuliah" required>
                  
                  @error('thn_kuliah')
                      <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div> -->

                <div class="mb-3">
                    <label for="rayon" class="form-label">Rayon</label>
                    <div>
                        <select id="rayon_id" name="rayon_id" class="form-select" required>
                            <option disabled selected>-- Pilih Rayon --</option>
                            @foreach($rayons as $rayon)
                                <option value="{{ $rayon->id }}">{{ $rayon->rayon }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('rayon_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                  <label for="prodi" class="form-label">Jurusan</label>
                  <div >
                  <select id="prodi" name="prodi" class="form-select" required onchange="showOptions()">
                    <option disabled selected>-- Pilih Jurusan --</option>

                    <option disabled style="font-weight: bold;">FAKULTAS TEKNIK DAN ILMU KOMPUTER</option>
                    <option value="S1 - Sistem dan Teknologi Informasi">S1 - Sistem dan Teknologi Informasi</option>
                    <option value="S1 - Informatika Medis">S1 - Informatika Medis</option>

                    <option disabled style="font-weight: bold;">FAKULTAS KEGURUAN DAN ILMU PENDIDIKAN</option>
                    <option value="S1 - Pendidikan Bahasa & Sastra Indonesia">S1 - Pendidikan Bahasa & Sastra Indonesia</option>
                    <option value="S1 - Pendidikan Bahasa Inggris">S1 - Pendidikan Bahasa Inggris</option>
                    <option value="S1 - Pendidikan Matematika">S1 - Pendidikan Matematika</option>
                    <option value="S1 - Pendidikan Guru Sekolah Dasar">S1 - Pendidikan Guru Sekolah Dasar</option>
                    <option value="S1 - Pendidikan Jasmani Olahraga">S1 - Pendidikan Jasmani Olahraga</option>

                    <option disabled style="font-weight: bold;">FAKULTAS HUKUM DAN ILMU SOSIAL</option>
                    <option value="S1 - Hukum">S1 - Hukum</option>
                    <option value="S1 - Ilmu Komunikasi">S1 - Ilmu Komunikasi</option>

                    <option disabled style="font-weight: bold;">FAKULTAS PERTANIAN DAN PETERNAKAN</option>
                    <option value="S1 - Agribisnis">S1 - Agribisnis</option>
                    <option value="S1 - Agroteknologi">S1 - Agroteknologi</option>
                    <option value="S1 - Nutrisi & Teknologi Pakan Ternak">S1 - Nutrisi & Teknologi Pakan Ternak</option>

                    <option disabled style="font-weight: bold;">PASCASARJANA</option>
                    <option value="S2 - Magister Hukum">S2 - Magister Hukum</option>
                  </select>
                  </div>

                  @error('prodi')
                      <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>

                {{-- jenjang kaderisasi  --}}
                <div class="mb-3">
                    <label for="kaderisasi" class="form-label">Jenjang Kaderisasi</label>
                    <div >
                        <select id="kaderisasi" name="kaderisasi" class="form-select" onchange="showOptions()" required>
                            <option disabled selected>-- Jenjang Kaderisasi Saat ini --</option>
                            <option value="Belum DAD" >Belum DAD</option>
                            <option value="DAD" >DAD (Darul Arqam Dasar)</option>
                            <option value="DAM" >DAM (Darul Arqam Madya)</option>
                            <option value="DAP" >DAP (Darul Arqam Paripurna)</option>
                            <option value="PPK" >PPK (Pasca Pelatihan Khusus)</option>
                        </select>
                    </div>
                    @error('kaderisasi')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <div class="col-md-6">
                        <select id="thn_mapaba" name="thn_mapaba" class="form-select" style="display:none;">
                            <option disabled selected >-- DAD Tahun Berapa --</option>
                            <option value="DAD Sebelum 2018" >DAD Sebelum 2018</option>
                            <option value="DAD 2018" >DAD 2018</option>
                            <option value="DAD 2019" >DAD 2019</option>
                            <option value="DAD 2020" >DAD 2020</option>
                            <option value="DAD 2021" >DAD 2021</option>
                            <option value="DAD 2022" >DAD 2022</option>
                            <option value="DAD 2023" >DAD 2023</option>
                            <option value="DAD 2024" >DAD 2024</option>
                            <option value="DAD 2025" >DAD 2025</option>
                        </select>
                    </div>
                </div>

                <div class="mb-3">
                    <div class="col-md-6">
                        <select id="thn_pkd" name="thn_pkd" class="form-select" style="display:none;">
                            <option disabled selected >-- DAM Tahun Berapa --</option>
                            <option value="DAM Sebelum 2018" >DAM Sebelum 2018</option>
                            <option value="DAM 2018" >DAM 2018</option>
                            <option value="DAM 2019" >DAM 2019</option>
                            <option value="DAM 2020" >DAM 2020</option>
                            <option value="DAM 2021" >DAM 2021</option>
                            <option value="DAM 2022" >DAM 2022</option>
                            <option value="DAM 2023" >DAM 2023</option>
                            <option value="DAM 2024" >DAM 2024</option>
                            <option value="DAM 2025" >DAM 2025</option>
                        </select>
                    </div>
                </div>

                <div class="mb-3">
                    <div class="col-md-6">
                        <select id="thn_pkl" name="thn_pkl" class="form-select" style="display:none;">
                            <option disabled selected >-- DAP Tahun Berapa --</option>
                            <option value="DAP Sebelum 2018" >DAP Sebelum 2018</option>
                            <option value="DAP 2018" >DAP 2018</option>
                            <option value="DAP 2019" >DAP 2019</option>
                            <option value="DAP 2020" >DAP 2020</option>
                            <option value="DAP 2021" >DAP 2021</option>
                            <option value="DAP 2022" >DAP 2022</option>
                            <option value="DAP 2023" >DAP 2023</option>
                            <option value="DAP 2024" >DAP 2024</option>
                            <option value="DAP 2025" >DAP 2025</option>
                        </select>
                    </div>
                </div>

                <div class="mb-3">
                    <div class="col-md-6">
                        <select id="thn_pkn" name="thn_pkn" class="form-select" style="display:none;">
                            <option disabled selected>-- PPK Tahun Berapa --</option>
                            <option value="PPK Sebelum 2018">PPK Sebelum 2018</option>
                            <option value="PPK 2018" >PPK 2018</option>
                            <option value="PPK 2019" >PPK 2019</option>
                            <option value="PPK 2020" >PPK 2020</option>
                            <option value="PPK 2021" >PPK 2021</option>
                            <option value="PPK 2022" >PPK 2022</option>
                            <option value="PPK 2023" >PPK 2023</option>
                            <option value="PPK 2024" >PPK 2024</option>
                            <option value="PPK 2025" >PPK 2025</option>
                        </select>
                    </div>
                </div>
                {{-- jenjang kaderisasi end  --}}

                <!-- <div class="mb-3">
                  <label for="informal" class="form-label">Kader Mengikuti Sekolah Informal</label>
                  <div >
                    <select name="informal" class="form-select" required aria-label="informal">
                      <option value="0">Belum Pernah</option>
                      <option value="1">Pernah 1 kali</option>
                      <option value="2">Pernah 2 Kali</option>
                      <option value="3">Pernah 3 Kali</option>
                      <option value="4">Pernah 4 Kali</option>
                      <option value="5">Pernah 5 Kali</option>
                      <option value="6">Pernah 6 Kali</option>
                      <option value="7">Pernah 7 Kali</option>
                      <option value="8">Pernah 8 Kali</option>
                      <option value="9">Pernah 9 Kali</option>
                      <option value="10">Lebih dari 9 Kali</option>
                  </select>
                </div> -->

                <!-- <div class="mb-3">
                  <label for="nonformal" class="form-label">Kader Mengikuti Sekolah Non-Formal</label>
                    <select name="nonformal" class="form-select" required aria-label="nonformal">
                      <option value="0">Belum Pernah</option>
                      <option value="1">Pernah 1 kali</option>
                      <option value="2">Pernah 2 Kali</option>
                      <option value="3">Pernah 3 Kali</option>
                      <option value="4">Pernah 4 Kali</option>
                      <option value="5">Pernah 5 Kali</option>
                      <option value="6">Pernah 6 Kali</option>
                      <option value="7">Pernah 7 Kali</option>
                      <option value="8">Pernah 8 Kali</option>
                      <option value="9">Pernah 9 Kali</option>
                      <option value="10">Lebih dari 9 Kali</option>
                  </select>
                </div> -->

                <!-- <div class="mb-3">
                <label for="wa" class="form-label">Telpone/WhatsApp</label>
                  <input type="text" name="wa" class="form-control" id="wa" >
                </div> -->

                {{-- Role Start --}}
                <div class="my-3">
                  <label for="role_id" class="form-label">Status Keanggotaan</label><br>
                  <div >
                    <select id="role_id" name="role_id" class="form-select" required>
                      <option disabled selected>-- Pilih Status --</option>
                      @if (in_array(auth()->user()->role_id, [1]))
                      <option value="1">Administrator</option>
                      @endif
                        <option value="2">Ketua</option>
                        <option value="3">Anggota</option>
                        <option value="4">Bendahara</option>
                        <option value="5">Sekretaris</option>
                        <option value="6">Bidang IMMwati</option>
                        <option value="7">Bidang Kader</option>
                        <option value="8">Bidang Organisasi</option>
                        <option value="9">Bidang Ekonomi dan Kewirausahaan</option>
                        <option value="10">Bidang Media dan Komunikasi</option>
                        <option value="11">Bidang Pertanian</option>
                        <option value="12">Bidang Olahraga dan Kepemudaan</option>
                        <option value="13">Bidang Kajian & Pengembangan Keilmuan</option>
                        <option value="14">Bidang Sosial & Pemberdayaan Masyarakat</option>
                        <option value="15">Bidang Hikmah Politik & Kebijakan Publik</option>
                        <option value="16">Bidang Lingkungan Hidup</option>

                    </select>
                  </div>

                  @error('role_id')
                      <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
                {{-- Role end  --}}
              </div>

              <div class="pt-3 text-end">
                  <a href="/admin/user" class="btn btn-warning btn-sm">Kembali</a>
                  <button type="submit" class="btn btn-success btn-sm" >Simpan</button>
              </div>

            {{-- <div class="col-md-6">
              <div class="text-center">
                <img src="{{ asset('storage/img/' . $user->img ) }}" class="rounded" alt="..." 
                style="width: 80%; border-radius:20px;box-shadow: 4px 5px 8px rgba(0, 0, 0, 0.3)">
              </div>
            </div> --}}
            
          </div>

        </form>
  
  </div>

@endsection

<script src="https://code.jquery.com/jquery-3.6.4.min.js"
integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script>

{{-- script password dilihat atau tidak  --}}
<script>
    document.addEventListener("DOMContentLoaded", function () {
        function setupPasswordToggle(inputId, buttonId, iconId) {
            let passwordInput = document.getElementById(inputId);
            let toggleButton = document.getElementById(buttonId);
            let toggleIcon = document.getElementById(iconId);

            if (toggleButton && passwordInput && toggleIcon) {
                toggleButton.addEventListener("click", function () {
                    if (passwordInput.type === "password") {
                        passwordInput.type = "text";
                        toggleIcon.classList.remove("bi-eye");
                        toggleIcon.classList.add("bi-eye-slash");
                    } else {
                        passwordInput.type = "password";
                        toggleIcon.classList.remove("bi-eye-slash");
                        toggleIcon.classList.add("bi-eye");
                    }
                });
            }
        }

        // Setup toggle untuk password dan konfirmasi password
        setupPasswordToggle("password", "togglePassword", "toggleIcon");
        setupPasswordToggle("password-confirm", "toggleConfirmPassword", "toggleConfirmIcon");
    });
</script>

{{-- validasi confrimsi password harus sama dengan password yang dimasukan  --}}
<script type="text/javascript">
      window.onload = function () {
          document.getElementById("password").onchange = validatePassword;
          document.getElementById("password-confirm").onchange = validatePassword;
      }
  
      function validatePassword(){
      var pass2=document.getElementById("password-confirm").value;
      var pass1=document.getElementById("password").value;
      if(pass1!=pass2)
          document.getElementById("password-confirm").setCustomValidity("Konfirmasi Passwords Tidak Sama, Coba Lagi");
      else
          document.getElementById("password-confirm").setCustomValidity('');
      }
</script>

<script>
$(document).ready(function() {
    $('body').on('change', '#province_id', function() {
        let id = $(this).val();

        $.ajax({
            type: 'get',
            url: route,
            data: {
                province_id: id
            },
            success: function(data) {
                $('#form-kota').html(data);
            }
        })
    })

    $('body').on('change', '#city_id', function() {
        let id = $(this).val();

        $.ajax({
            type: 'get',
            url: route,
            data: {
                city_id: id
            },
            success: function(data) {
                $('#form-kecamatan').html(data);
            }
        })
    })

    $('body').on('change', '#kecamatan_id', function() {
        let id = $(this).val();

        $.ajax({
            type: 'get',
            url: route,
            data: {
                kecamatan_id: id
            },
            success: function(data) {
                $('#form-kelurahan').html(data);
            }
        })
    })
})
</script>

<!-- Script NIM/NPM -->
<script>
function updateSuggestions() {
    let input = document.getElementById("nim");
    let suggestionsDiv = document.getElementById("suggestions");
    let value = input.value.trim();

    if (value.length >= 3 && value.length <= 12) {
        suggestionsDiv.innerHTML = `
            <a href="#" class="dropdown-item" onclick="selectSuggestion('${value}')">${value}</a>
            <a href="#" class="dropdown-item" onclick="selectSuggestion('${value}P')">${value}P</a>
        `;
        suggestionsDiv.style.display = "block";
    } else {
        suggestionsDiv.style.display = "none";
    }
}

function selectSuggestion(value) {
    document.getElementById("nim").value = value;
    document.getElementById("suggestions").style.display = "none";
}
</script>

  <!-- Script Jenjang Kaderisasi -->
  <script>
    function showOptions() {
        var kaderisasi = document.getElementById("kaderisasi").value;
        var thn_mapaba = document.getElementById("thn_mapaba");
        var thn_pkd = document.getElementById("thn_pkd");
        var thn_pkl = document.getElementById("thn_pkl");
        var thn_pkn = document.getElementById("thn_pkn");
        
        if (kaderisasi === "Belum DAD") {
            thn_mapaba.style.display = "none";
            thn_pkd.style.display = "none";
            thn_pkl.style.display = "none";
            thn_pkn.style.display = "none";
        } else if (kaderisasi === "DAD") {
            thn_mapaba.style.display = "block";
            thn_pkd.style.display = "none";
            thn_pkl.style.display = "none";
            thn_pkn.style.display = "none";
        } else if (kaderisasi === "DAM") {
            thn_mapaba.style.display = "none";
            thn_pkd.style.display = "block";
            thn_pkl.style.display = "none";
            thn_pkn.style.display = "none";
        } else if (kaderisasi === "DAP") {
            thn_mapaba.style.display = "none";
            thn_pkd.style.display = "none";
            thn_pkl.style.display = "block";
            thn_pkn.style.display = "none";
        } else if (kaderisasi === "PPK") {
            thn_mapaba.style.display = "none";
            thn_pkd.style.display = "none";
            thn_pkl.style.display = "none";
            thn_pkn.style.display = "block";
        } else {
            thn_mapaba.style.display = "none";
            thn_pkd.style.display = "none";
            thn_pkl.style.display = "none";
            thn_pkn.style.display = "none";
        }
    }
  </script>
  
</body>

</html>