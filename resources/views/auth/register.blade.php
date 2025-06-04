<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="icon" type="image/png" href="assets/img/favicon.png" sizes="32x32">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <title>Register</title>
</head>
<body style="background-color: #c2041d;">
  <section>
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-xl-10">
          <div class="card" style="border-radius: 1rem;">
            <div class="row g-0">
              <div class="col d-flex align-items-center">
                <div class="card-body p-4 p-lg-4 text-black">
                  
                  {{-- <form method="POST" action="/validasii/{{ $user->id }}"> --}}
                  <form method="POST" action="/register/store">
                    @csrf @method('put')

                    <div class="d-flex align-items-center justify-content-center mb-1 pb-1 text-center">
                      <span class="h1 fw-bold">
                        <img style="width: 100px; height: 100px; object-fit:cover" src="{{ asset('storage/img/logokomi.png') }}" alt="">
                      </span>
                    </div>    

                    <div class="text-center mb-4">
                      <h5 style="text-transform:uppercase;">Lengkapi Form Pendaftaran</h5>
                    </div>

                    <div class="row">
                      <!-- KOLOM KIRI - DATA AKUN -->
                      <div class="col-md-6 border-end">
                        <h5 class="mb-3">Data Akun</h5>
                        
                        <div class="form-group mb-3">
                            <label for="name" class="form-label">Nama Lengkap</label>
                            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Nama Lengkap..." autocomplete="name" autofocus>
                            @error('name')
                              <small style="color:red;">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3 position-relative">
                          <label for="nim" class="form-label">NIM/NPM</label>
                          <input type="text" name="nim" id="nim" value="{{ old('nim') }}" class="form-control @error('nim') is-invalid @enderror" 
                              placeholder="NIM/NPM..." required minlength="3" maxlength="12" oninput="updateSuggestions()" autocomplete="off">

                          @error('nim')
                              <small style="color:red;">{{ $message }}</small>
                          @enderror

                          <div id="suggestions" class="dropdown-menu" style="display: none; width: 100%; position: absolute; z-index: 1000;"></div>
                        </div>

                        <div class="form-group mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" autocomplete="username" placeholder="Username..." autofocus>
                            @error('username')
                              <small style="color:red;">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="email" class="form-label">Email Aktif</label>
                            <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" placeholder="Email Aktif..." autofocus>
                            @error('email')
                              <small style="color:red;">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="password" class="form-label">Password</label>
                            <div class="input-group">
                              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password" placeholder="Password...">
                              <button type="button" id="togglePassword" class="btn btn-primary">
                                <i id="toggleIcon" class="fa fa-eye"></i>
                              </button>
                            </div>
                            @error('password')
                              <small style="color:red;">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="password-confirm" class="form-label">Konfirmasi Password</label>
                            <div class="input-group">
                              <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password" placeholder="Konfirmasi Password...">
                              <button type="button" id="toggleConfirmPassword" class="btn btn-primary">
                                <i id="toggleConfirmIcon" class="fa fa-eye"></i>
                              </button>
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label for="role_id" class="form-label">Status Keanggotaan</label>
                            <select id="role_id" name="role_id" class="form-select">
                              <option value="" disabled selected>-- Pilih Status --</option>
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
                            @error('role_id')
                              <small style="color:red;">{{ $message }}</small>
                            @enderror
                        </div>
                      </div>

                      <!-- KOLOM KANAN - DATA PRIBADI -->
                      <div class="col-md-6">
                        <h5 class="mb-3">Data Pribadi</h5>
                        
                        <div class="form-group mb-3">
                            <label for="t_lahir" class="form-label">Kota Kelahiran</label>
                            <input id="t_lahir" type="text" class="form-control @error('t_lahir') is-invalid @enderror" name="t_lahir" value="{{ old('t_lahir') }}" autocomplete="t_lahir" placeholder="Kota Kelahiran..." autofocus>
                            @error('t_lahir')
                              <small style="color:red;">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="ttl" class="form-label">Tanggal Lahir</label>
                            <input id="ttl" type="date" class="form-control @error('ttl') is-invalid @enderror" name="ttl" value="{{ old('ttl') ? date('Y-m-d', strtotime(old('ttl'))) : '' }}" autocomplete="ttl" placeholder="Tanggal Lahir..." autofocus>
                            @error('ttl')
                              <small style="color:red;">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="kelamin" class="form-label">Jenis Kelamin</label>
                            <select id="kelamin" class="form-select @error('kelamin') is-invalid @enderror" name="kelamin">
                                <option value="" disabled selected>-- Pilih Jenis Kelamin --</option>
                                <option value="L" {{ old('kelamin') == 'L' ? 'selected' : '' }}>Laki-Laki</option>
                                <option value="P" {{ old('kelamin') == 'P' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                            @error('kelamin')
                                <small style="color:red;">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="wa" class="form-label">Telp/WA</label>
                            <input id="wa" type="number" class="form-control @error('wa') is-invalid @enderror" name="wa" value="{{ old('wa') }}" autocomplete="wa" placeholder="Telp/WA..." autofocus>
                            @error('wa')
                              <small style="color:red;">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="rayon_id" class="form-label">Rayon</label>
                            <select id="rayon_id" name="rayon_id" class="form-select">
                                <option value="" disabled selected>-- Pilih Rayon --</option>
                                @foreach($rayons as $rayon)
                                    <option value="{{ $rayon->id }}">{{ $rayon->rayon }}</option>
                                @endforeach
                            </select>
                            @error('rayon_id')
                                <small style="color:red;">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="prodi" class="form-label">Jurusan</label>
                            <select id="prodi" name="prodi" class="form-select">
                              <option value="" disabled selected>-- Pilih Jurusan --</option>

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
                            @error('prodi')
                                <small style="color:red;">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- jenjang kaderisasi start  --}}
                        <div class="mb-3">
                            <label for="kaderisasi" class="form-label">Jenjang Kaderisasi</label>
                            <div>
                                <select id="kaderisasi" name="kaderisasi" class="form-select" onchange="showOptions()">
                                    <option value="" disabled selected>-- Jenjang Kaderisasi Saat ini --</option>
                                    <option value="Belum DAD">Belum DAD</option>
                                    <option value="DAD">DAD (Darul Arqam Dasar)</option>
                                    <option value="DAM">DAM (Darul Arqam Madya)</option>
                                    <option value="DAP">DAP (Darul Arqam Paripurna)</option>
                                    <option value="PPK">PPK (Pasca Pelatihan Khusus)</option>
                                </select>
                                @error('prodi')
                                <small style="color:red;">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="col-md-6">
                                <select id="thn_mapaba" name="thn_mapaba" class="form-select" style="display:none;">
                                    <option disabled selected>-- DAD Tahun Berapa --</option>
                                    <option value="DAD Sebelum 2018">DAD Sebelum 2018</option>
                                    <option value="DAD 2018">DAD 2018</option>
                                    <option value="DAD 2019">DAD 2019</option>
                                    <option value="DAD 2020">DAD 2020</option>
                                    <option value="DAD 2021">DAD 2021</option>
                                    <option value="DAD 2022">DAD 2022</option>
                                    <option value="DAD 2023">DAD 2023</option>
                                    <option value="DAD 2024">DAD 2024</option>
                                    <option value="DAD 2025">DAD 2025</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="col-md-6">
                                <select id="thn_pkd" name="thn_pkd" class="form-select" style="display:none;">
                                    <option disabled selected>-- DAM Tahun Berapa --</option>
                                    <option value="DAM Sebelum 2018">DAM Sebelum 2018</option>
                                    <option value="DAM 2018">DAM 2018</option>
                                    <option value="DAM 2019">DAM 2019</option>
                                    <option value="DAM 2020">DAM 2020</option>
                                    <option value="DAM 2021">DAM 2021</option>
                                    <option value="DAM 2022">DAM 2022</option>
                                    <option value="DAM 2023">DAM 2023</option>
                                    <option value="DAM 2024">DAM 2024</option>
                                    <option value="DAM 2025">DAM 2025</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="col-md-6">
                                <select id="thn_pkl" name="thn_pkl" class="form-select" style="display:none;">
                                    <option disabled selected>-- DAP Tahun Berapa --</option>
                                    <option value="DAP Sebelum 2018">DAP Sebelum 2018</option>
                                    <option value="DAP 2018">DAP 2018</option>
                                    <option value="DAP 2019">DAP 2019</option>
                                    <option value="DAP 2020">DAP 2020</option>
                                    <option value="DAP 2021">DAP 2021</option>
                                    <option value="DAP 2022">DAP 2022</option>
                                    <option value="DAP 2023">DAP 2023</option>
                                    <option value="DAP 2024">DAP 2024</option>
                                    <option value="DAP 2025">DAP 2025</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="col-md-6">
                                <select id="thn_pkn" name="thn_pkn" class="form-select" style="display:none;">
                                    <option disabled selected>-- PPK Tahun Berapa --</option>
                                    <option value="PPK Sebelum 2018">PPK Sebelum 2018</option>
                                    <option value="PPK 2018">PPK 2018</option>
                                    <option value="PPK 2019">PPK 2019</option>
                                    <option value="PPK 2020">PPK 2020</option>
                                    <option value="PPK 2021">PPK 2021</option>
                                    <option value="PPK 2022">PPK 2022</option>
                                    <option value="PPK 2023">PPK 2023</option>
                                    <option value="PPK 2024">PPK 2024</option>
                                    <option value="PPK 2025">PPK 2025</option>
                                </select>
                            </div>
                        </div>
                        {{-- jenjang kaderisasi end  --}}
                      </div>
                    </div>

                    <div class="form-group row my-2 mt-4 text-end">
                        <div class="col-md-12">
                          <a href="/login" class="btn btn-warning">Kembali</a>
                            <button type="submit" class="btn btn-primary">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </div>
                </form>
  
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

    {{-- script password dilihat atau tidak  --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
      <script>
        var passwordInput = document.getElementById("password");
        var toggleButton = document.getElementById("togglePassword");
        var toggleIcon = document.getElementById("toggleIcon");

        toggleButton.addEventListener("click", function() {
          if (passwordInput.type === "password") {
            passwordInput.type = "text";
            toggleIcon.classList.remove("fa-eye");
            toggleIcon.classList.add("fa-eye-slash");
          } else {
            passwordInput.type = "password";
            toggleIcon.classList.remove("fa-eye-slash");
            toggleIcon.classList.add("fa-eye");
          }
        });

        var confirmPasswordInput = document.getElementById("password-confirm");
        var toggleConfirmButton = document.getElementById("toggleConfirmPassword");
        var toggleConfirmIcon = document.getElementById("toggleConfirmIcon");

        toggleConfirmButton.addEventListener("click", function() {
          if (confirmPasswordInput.type === "password") {
            confirmPasswordInput.type = "text";
            toggleConfirmIcon.classList.remove("fa-eye");
            toggleConfirmIcon.classList.add("fa-eye-slash");
          } else {
            confirmPasswordInput.type = "password";
            toggleConfirmIcon.classList.remove("fa-eye-slash");
            toggleConfirmIcon.classList.add("fa-eye");
          }
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
  
  {{-- Script Sweet Alert --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@include('sweetalert::alert')

@if(session('status'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Pendaftaran Berhasil!',
        text: 'Akun Anda akan diverifikasi oleh admin dalam 24 jam.',
        confirmButtonText: 'OK',
        confirmButtonColor: '#c2041d'
    });
</script>
@endif


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" 
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" 
    crossorigin="anonymous">
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" 
    integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" 
    crossorigin="anonymous">
</script>

</body>
</html>


