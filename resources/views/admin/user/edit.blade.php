@section('title') {{ 'User' }}@endsection
@extends('admin.layout')
@section('content')
<div class="card info-card sales-card">
    <div class="container">

      <div class="text-center pt-5 mt-5">
        <h4>Edit Kader</h4>
      </div>
      <div class="row pt-4 mt-5">
        <div class="col-md-6">
            <form action="/admin/user/{{ $user->id }}" method="post">
              @csrf
              @method('put')
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Lengkap</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{ $user->name }}">
                </div>
                  
                <div class="mb-3">
                    <label for="kelamin" class="form-label">Jenis Kelamin</label>
                    <select name="kelamin" id="kelamin" class="form-select @error('kelamin') is-invalid @enderror">
                        <option disabled selected>Pilih jenis kelamin</option>
                        <option value="L" {{ $user->kelamin == 'L' ? 'selected' : '' }}>Laki-Laki</option>
                        <option value="P" {{ $user->kelamin == 'P' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                    @error('kelamin')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                
                <!-- Hapus Provinsi -->

              <div class="mb-3">
                <label for="alamat" class="form-label">Alamat Domisili</label>
                <textarea class="form-control" name="alamat" id="alamat" rows="4">{{ $user->alamat }}</textarea>
            </div>
            
    
                <div class="mb-3">
                    <label for="nim" class="form-label">NPM</label>
                    <input type="text" name="nim" class="form-control" id="nim" value="{{ $user->nim }}">
                </div>
    
                <div class="mb-3">
                    <label for="t_lahir" class="form-label">Kota Kelahiran</label>
                    <input type="text" name="t_lahir" class="form-control" id="t_lahir" value="{{ $user->t_lahir }}">
                </div>
    
                <div class="mb-3">
                    <label for="rayon" class="form-label">Rayon</label>
                    <div>
                        <select id="rayon_id" name="rayon_id" class="form-select" required>
                            <option disabled>-- Pilih Rayon --</option>
                            @foreach($rayons as $rayon)
                                <option value="{{ $rayon->id }}" {{ $user->rayon_id == $rayon->id ? 'selected' : '' }}>
                                    {{ $rayon->rayon }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="prodi" class="form-label">Jurusan</label>
                    <div>
                        <select id="prodi" name="prodi" class="form-select" required onchange="showOptions()">
                        <option disabled selected>-- Pilih Jurusan --</option>

                        <option disabled style="font-weight: bold;">FAKULTAS TEKNIK DAN ILMU KOMPUTER</option>
                        <option value="S1 - Sistem dan Teknologi Informasi" {{ $user->prodi == 'S1 - Sistem dan Teknologi Informasi' ? 'selected' : '' }}>S1 - Sistem dan Teknologi Informasi</option>
                        <option value="S1 - Informatika Medis" {{ $user->prodi == 'S1 - Informatika Medis' ? 'selected' : '' }}>S1 - Informatika Medis</option>

                        <option disabled style="font-weight: bold;">FAKULTAS KEGURUAN DAN ILMU PENDIDIKAN</option>
                        <option value="S1 - Pendidikan Bahasa & Sastra Indonesia" {{ $user->prodi == 'S1 - Pendidikan Bahasa & Sastra Indonesia' ? 'selected' : '' }}>S1 - Pendidikan Bahasa & Sastra Indonesia</option>
                        <option value="S1 - Pendidikan Bahasa Inggris" {{ $user->prodi == 'S1 - Pendidikan Bahasa Inggris' ? 'selected' : '' }}>S1 - Pendidikan Bahasa Inggris</option>
                        <option value="S1 - Pendidikan Matematika" {{ $user->prodi == 'S1 - Pendidikan Matematika' ? 'selected' : '' }}>S1 - Pendidikan Matematika</option>
                        <option value="S1 - Pendidikan Guru Sekolah Dasar" {{ $user->prodi == 'S1 - Pendidikan Guru Sekolah Dasar' ? 'selected' : '' }}>S1 - Pendidikan Guru Sekolah Dasar</option>
                        <option value="S1 - Pendidikan Jasmani Olahraga" {{ $user->prodi == 'S1 - Pendidikan Jasmani Olahraga' ? 'selected' : '' }}>S1 - Pendidikan Jasmani Olahraga</option>

                        <option disabled style="font-weight: bold;">FAKULTAS HUKUM DAN ILMU SOSIAL</option>
                        <option value="S1 - Hukum" {{ $user->prodi == 'S1 - Hukum' ? 'selected' : '' }}>S1 - Hukum</option>
                        <option value="S1 - Ilmu Komunikasi" {{ $user->prodi == 'S1 - Ilmu Komunikasi' ? 'selected' : '' }}>S1 - Ilmu Komunikasi</option>

                        <option disabled style="font-weight: bold;">FAKULTAS PERTANIAN DAN PETERNAKAN</option>
                        <option value="S1 - Agribisnis" {{ $user->prodi == 'S1 - Agribisnis' ? 'selected' : '' }}>S1 - Agribisnis</option>
                        <option value="S1 - Agroteknologi" {{ $user->prodi == 'S1 - Agroteknologi' ? 'selected' : '' }}>S1 - Agroteknologi</option>
                        <option value="S1 - Nutrisi & Teknologi Pakan Ternak" {{ $user->prodi == 'S1 - Nutrisi & Teknologi Pakan Ternak' ? 'selected' : '' }}>S1 - Nutrisi & Teknologi Pakan Ternak</option>

                        <option disabled style="font-weight: bold;">PASCASARJANA</option>
                        <option value="S2 - Magister Hukum" {{ $user->prodi == 'S2 - Magister Hukum' ? 'selected' : '' }}>S2 - Magister Hukum</option>
                        </select>
                    </div>
                </div>

                {{-- jenjang kaderisasi start  --}}
                <div class="mb-3">
                    <label for="kaderisasi" class="form-label">Jenjang Kaderisasi</label>
                    <div>
                        <select id="kaderisasi" name="kaderisasi" class="form-select" onchange="showOptions()">
                            <option disabled selected>-- Jenjang Kaderisasi Saat ini --</option>
                            <option value="Belum DAD" {{ $user->kaderisasi == 'Belum DAD' ? 'selected' : '' }}>Belum DAD</option>
                            <option value="DAD" {{ $user->kaderisasi == 'DAD' ? 'selected' : '' }}>DAD (Darul Arqam Dasar)</option>
                            <option value="DAM" {{ $user->kaderisasi == 'DAM' ? 'selected' : '' }}>DAM (Darul Arqam Madya)</option>
                            <option value="DAP" {{ $user->kaderisasi == 'DAP' ? 'selected' : '' }}>DAP (Darul Arqam Paripurna)</option>
                            <option value="PPK" {{ $user->kaderisasi == 'PPK' ? 'selected' : '' }}>PPK (Pasca Pelatihan Khusus)</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="col-md-6">
                        <select id="thn_mapaba" name="thn_mapaba" class="form-select" style="display:none;">
                            <option disabled selected>-- DAD Tahun Berapa --</option>
                            <option value="DAD Sebelum 2018" {{ $user->thn_mapaba == 'DAD Sebelum 2018' ? 'selected' : '' }}>DAD Sebelum 2018</option>
                            <option value="DAD 2018" {{ $user->thn_mapaba == 'DAD 2018' ? 'selected' : '' }}>DAD 2018</option>
                            <option value="DAD 2019" {{ $user->thn_mapaba == 'DAD 2019' ? 'selected' : '' }}>DAD 2019</option>
                            <option value="DAD 2020" {{ $user->thn_mapaba == 'DAD 2020' ? 'selected' : '' }}>DAD 2020</option>
                            <option value="DAD 2021" {{ $user->thn_mapaba == 'DAD 2021' ? 'selected' : '' }}>DAD 2021</option>
                            <option value="DAD 2022" {{ $user->thn_mapaba == 'DAD 2022' ? 'selected' : '' }}>DAD 2022</option>
                            <option value="DAD 2023" {{ $user->thn_mapaba == 'DAD 2023' ? 'selected' : '' }}>DAD 2023</option>
                            <option value="DAD 2024" {{ $user->thn_mapaba == 'DAD 2024' ? 'selected' : '' }}>DAD 2024</option>
                            <option value="DAD 2025" {{ $user->thn_mapaba == 'DAD 2025' ? 'selected' : '' }}>DAD 2025</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="col-md-6">
                        <select id="thn_pkd" name="thn_pkd" class="form-select" style="display:none;">
                            <option disabled selected>-- DAM Tahun Berapa --</option>
                            <option value="DAM Sebelum 2018" {{ $user->thn_pkd == 'DAM Sebelum 2018' ? 'selected' : '' }}>DAM Sebelum 2018</option>
                            <option value="DAM 2018" {{ $user->thn_pkd == 'DAM 2018' ? 'selected' : '' }}>DAM 2018</option>
                            <option value="DAM 2019" {{ $user->thn_pkd == 'DAM 2019' ? 'selected' : '' }}>DAM 2019</option>
                            <option value="DAM 2020" {{ $user->thn_pkd == 'DAM 2020' ? 'selected' : '' }}>DAM 2020</option>
                            <option value="DAM 2021" {{ $user->thn_pkd == 'DAM 2021' ? 'selected' : '' }}>DAM 2021</option>
                            <option value="DAM 2022" {{ $user->thn_pkd == 'DAM 2022' ? 'selected' : '' }}>DAM 2022</option>
                            <option value="DAM 2023" {{ $user->thn_pkd == 'DAM 2023' ? 'selected' : '' }}>DAM 2023</option>
                            <option value="DAM 2024" {{ $user->thn_pkd == 'DAM 2024' ? 'selected' : '' }}>DAM 2024</option>
                            <option value="DAM 2025" {{ $user->thn_pkd == 'DAM 2025' ? 'selected' : '' }}>DAM 2025</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="col-md-6">
                        <select id="thn_pkl" name="thn_pkl" class="form-select" style="display:none;">
                            <option disabled selected>-- DAP Tahun Berapa --</option>
                            <option value="DAP Sebelum 2018" {{ $user->thn_pkl == 'DAP Sebelum 2018' ? 'selected' : '' }}>DAP Sebelum 2018</option>
                            <option value="DAP 2018" {{ $user->thn_pkl == 'DAP 2018' ? 'selected' : '' }}>DAP 2018</option>
                            <option value="DAP 2019" {{ $user->thn_pkl == 'DAP 2019' ? 'selected' : '' }}>DAP 2019</option>
                            <option value="DAP 2020" {{ $user->thn_pkl == 'DAP 2020' ? 'selected' : '' }}>DAP 2020</option>
                            <option value="DAP 2021" {{ $user->thn_pkl == 'DAP 2021' ? 'selected' : '' }}>DAP 2021</option>
                            <option value="DAP 2022" {{ $user->thn_pkl == 'DAP 2022' ? 'selected' : '' }}>DAP 2022</option>
                            <option value="DAP 2023" {{ $user->thn_pkl == 'DAP 2023' ? 'selected' : '' }}>DAP 2023</option>
                            <option value="DAP 2024" {{ $user->thn_pkl == 'DAP 2024' ? 'selected' : '' }}>DAP 2024</option>
                            <option value="DAP 2025" {{ $user->thn_pkl == 'DAP 2025' ? 'selected' : '' }}>DAP 2025</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="col-md-6">
                        <select id="thn_pkn" name="thn_pkn" class="form-select" style="display:none;">
                            <option disabled selected>-- PPK Tahun Berapa --</option>
                            <option value="PPK Sebelum 2018" {{ $user->thn_pkn == 'PPK Sebelum 2018' ? 'selected' : '' }}>PPK Sebelum 2018</option>
                            <option value="PPK 2018" {{ $user->thn_pkn == 'PPK 2018' ? 'selected' : '' }}>PPK 2018</option>
                            <option value="PPK 2019" {{ $user->thn_pkn == 'PPK 2019' ? 'selected' : '' }}>PPK 2019</option>
                            <option value="PPK 2020" {{ $user->thn_pkn == 'PPK 2020' ? 'selected' : '' }}>PPK 2020</option>
                            <option value="PPK 2021" {{ $user->thn_pkn == 'PPK 2021' ? 'selected' : '' }}>PPK 2021</option>
                            <option value="PPK 2022" {{ $user->thn_pkn == 'PPK 2022' ? 'selected' : '' }}>PPK 2022</option>
                            <option value="PPK 2023" {{ $user->thn_pkn == 'PPK 2023' ? 'selected' : '' }}>PPK 2023</option>
                            <option value="PPK 2024" {{ $user->thn_pkn == 'PPK 2024' ? 'selected' : '' }}>PPK 2024</option>
                            <option value="PPK 2025" {{ $user->thn_pkn == 'PPK 2025' ? 'selected' : '' }}>PPK 2025</option>
                        </select>
                    </div>
                </div>
                {{-- jenjang kaderisasi end  --}}

                <div class="mb-3">
                  <label for="informal" class="form-label">Kader Mengikuti Sekolah Informal</label>
                    <select name="informal" class="form-select" required aria-label="informal">
                      <option value="0"{{ $user->informal == '0' ? 'selected' : '' }}>Belum Pernah</option>
                      <option value="1"{{ $user->informal == '1' ? 'selected' : '' }}>Pernah 1 kali</option>
                      <option value="2"{{ $user->informal == '2' ? 'selected' : '' }}>Pernah 2 Kali</option>
                      <option value="3"{{ $user->informal == '3' ? 'selected' : '' }}>Pernah 3 Kali</option>
                      <option value="4"{{ $user->informal == '4' ? 'selected' : '' }}>Pernah 4 Kali</option>
                      <option value="5"{{ $user->informal == '5' ? 'selected' : '' }}>Pernah 5 Kali</option>
                      <option value="6"{{ $user->informal == '6' ? 'selected' : '' }}>Pernah 6 Kali</option>
                      <option value="7"{{ $user->informal == '7' ? 'selected' : '' }}>Pernah 7 Kali</option>
                      <option value="8"{{ $user->informal == '8' ? 'selected' : '' }}>Pernah 8 Kali</option>
                      <option value="9"{{ $user->informal == '9' ? 'selected' : '' }}>Pernah 9 Kali</option>
                      <option value="10"{{ $user->informal == '10' ? 'selected' : '' }}>Lebih dari 9 Kali</option>
                  </select>
              </div>

                <div class="mb-3">
                  <label for="nonformal" class="form-label">Kader Mengikuti Sekolah Non-Formal</label>
                    <select name="nonformal" class="form-select" required aria-label="nonformal">
                      <option value="0"{{ $user->nonformal == '0' ? 'selected' : '' }}>Belum Pernah</option>
                      <option value="1"{{ $user->nonformal == '1' ? 'selected' : '' }}>Pernah 1 kali</option>
                      <option value="2"{{ $user->nonformal == '2' ? 'selected' : '' }}>Pernah 2 Kali</option>
                      <option value="3"{{ $user->nonformal == '3' ? 'selected' : '' }}>Pernah 3 Kali</option>
                      <option value="4"{{ $user->nonformal == '4' ? 'selected' : '' }}>Pernah 4 Kali</option>
                      <option value="5"{{ $user->nonformal == '5' ? 'selected' : '' }}>Pernah 5 Kali</option>
                      <option value="6"{{ $user->nonformal == '6' ? 'selected' : '' }}>Pernah 6 Kali</option>
                      <option value="7"{{ $user->nonformal == '7' ? 'selected' : '' }}>Pernah 7 Kali</option>
                      <option value="8"{{ $user->nonformal == '8' ? 'selected' : '' }}>Pernah 8 Kali</option>
                      <option value="9"{{ $user->nonformal == '9' ? 'selected' : '' }}>Pernah 9 Kali</option>
                      <option value="10"{{ $user->nonformal == '10' ? 'selected' : '' }}>Lebih dari 9 Kali</option>
                  </select>
              </div>

                  
              <div class="mb-3">
               <label for="wa" class="form-label">Telpone/WhatApps</label>
                 <input type="text" name="wa" class="form-control" id="wa" value="{{ $user->wa }}">
             </div>

                {{-- Role Start --}}
            <div class="my-3">
                <label for="role_id" class="form-label">Status Keanggotaan</label><br>
                <!-- <p>Jika Anggota tersebut memang benar tercatat di database rayon, maka pilih "Kader PC IMM Lampura", <br>
                Namun, jika anggota tersebut tidak tercatat di database rayon maka pilih "Bukan Kader PC IMM Lampura"</p> -->
                <select id="role_id" name="role_id" class="form-select">
                    @if (in_array(auth()->user()->role_id, [1]))
                    <option value="1" {{ $user->role_id == '1' ? 'selected' : '' }}>Administrator</option>
                    @endif
                    <option value="2" {{ $user->role_id == '2' ? 'selected' : '' }}>Ketua</option>
                    <option value="3" {{ $user->role_id == '3' ? 'selected' : '' }}>Anggota</option>
                    <option value="4" {{ $user->role_id == '4' ? 'selected' : '' }}>Bendahara</option>
                    <option value="5" {{ $user->role_id == '5' ? 'selected' : '' }}>Sekretaris</option>
                    <option value="6" {{ $user->role_id == '6' ? 'selected' : '' }}>Bidang IMMwati</option>
                    <option value="7" {{ $user->role_id == '7' ? 'selected' : '' }}>Bidang Kader</option>
                    <option value="8" {{ $user->role_id == '8' ? 'selected' : '' }}>Bidang Organisasi</option>
                    <option value="9" {{ $user->role_id == '9' ? 'selected' : '' }}>Bidang Ekonomi dan Kewirausahaan</option>
                    <option value="10" {{ $user->role_id == '10' ? 'selected' : '' }}>Bidang Media dan Komunikasi</option>
                    <option value="11" {{ $user->role_id == '11' ? 'selected' : '' }}>Bidang Pertanian</option>
                    <option value="12" {{ $user->role_id == '12' ? 'selected' : '' }}>Bidang Olahraga dan Kepemudaan</option>
                    <option value="13" {{ $user->role_id == '13' ? 'selected' : '' }}>Bidang Kajian & Pengembangan Keilmuan</option>
                    <option value="14" {{ $user->role_id == '14' ? 'selected' : '' }}>Bidang Sosial & Pemberdayaan Masyarakat</option>
                    <option value="15" {{ $user->role_id == '15' ? 'selected' : '' }}>Bidang Hikmah Politik & Kebijakan Publik</option>
                    <option value="16" {{ $user->role_id == '16' ? 'selected' : '' }}>Bidang Lingkungan Hidup</option>

                </select>
            </div>
              {{-- Role end  --}}

              {{-- Role Start --}}
              <div class="my-3 pt-4">
                <div>
                  <a href="/admin/user"><button class="btn btn-warning" type="submit">Kembali</button></a> 
                  <button class="btn btn-primary" type="submit">Simpan</button>
                </div>
            </div>
            </form>
        </div>
        
        <div class="col-md-6">
          <div class="text-center">
            <img src="{{ asset('sim-pcimm-lampura/public/storage/img/' . $user->img ) }}" class="rounded" alt="..." 
            style="width: 80%; border-radius:20px;box-shadow: 4px 5px 8px rgba(0, 0, 0, 0.3)">
          </div>
        </div>
    </div>

</div>


<script>
  function showOptions() {
    var rayon = document.getElementById("rayon_id").value;
    var prodi_teknik = document.getElementById("prodi-teknik");
    var prodi_hukum = document.getElementById("prodi-hukum");
    var prodi_ulul_albab = document.getElementById("prodi-ulul-albab");

    if (rayon === "1") {
        prodi_teknik.style.display = "block";
        prodi_hukum.style.display = "none";
        prodi_ulul_albab.style.display = "none";
    } else if (rayon === "2") {
        prodi_teknik.style.display = "none";
        prodi_hukum.style.display = "block";
        prodi_ulul_albab.style.display = "none";
    } else if (rayon === "3") {
        prodi_teknik.style.display = "none";
        prodi_hukum.style.display = "none";
        prodi_ulul_albab.style.display = "block";
    } 
    else {
        prodi_teknik.style.display = "none";
        prodi_hukum.style.display = "none";
        prodi_ulul_albab.style.display = "none";
    }
  }

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
@endsection

<script src="https://code.jquery.com/jquery-3.6.4.min.js"
integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
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