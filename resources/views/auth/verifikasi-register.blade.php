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
  <title>Cek NIM/NPM</title>
</head>
<body>
  <section class="vh-100" style="background-color: #c2041d;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-xl-5">
          <div class="card" style="border-radius: 1rem;">
            <div class="row g-0">
              <div class="col d-flex align-items-center">
                <div class="card-body p-4 p-lg-5 text-black">
                  
                  <form method="POST" action="{{ route('validasii') }}">
                    @csrf
                    <div class="d-flex align-items-center justify-content-center mb-6 pb-1 text-center">
                      <span class="h1 fw-bold mb-0">
                        <img style="width: 100px; height: 100px; object-fit:cover" src="{{ asset('storage/img/logokomi.png') }}" alt="">
                      </span>
                    </div>

                    <p class="text-center mb-5">Cek NIM/NPM Kamu Terlebih Dahulu, Sebelum Melakukan Pendaftaran Akun. Jika ada kendala chat admin!</p>

                    <div class="d-flex justify-content-center align-items-center mb-4" style="margin-top:-40px;">
                      <a href="https://wa.me/6282278899191?text=Halo%20admin,%20saya%20ingin%20mendaftar%20sebagai%20*Kader%20PC-IMM%20Lampung%20Utara*%20mohon%20dibantu%20untuk%20didaftarkan%20terlebih%20dahulu%20NPM/NIM%20saya,%20berikut%20biodata%20saya:%0A1.%20Nama:%0A2.%20NPM/NIM:%0A3.%20Fakultas:%0A4.%20Prodi:%0A5.%20Status%20Kaderisasi:"" 
                        target="_blank" class="text-decoration-none text-center">
                          <img src="{{ asset('storage/img/whatsapp.png') }}" alt="Logo WhatsApp" style="width: 50px;">
                          <div class="fw-bold text-success" style="font-size: 16px;">Chat Admin</div>
                      </a>
                    </div>

                    <h6 class="fw-normal mb-1" style="letter-spacing: 1px;">NIM/NPM Kamu</h6>
  
                    <div class="form-outline mb-2">
                      <input type="text" placeholder="Masukan NIM/NPM kamu..." name="nim" id="form2Example17" autofocus class="form-control form-control-lg" />
                    </div>

                    <div class="form-outline">
                      @if(Session::has('error'))
                      <div class="alert alert-danger">
                          {{ Session::get('error') }}
                      </div>
                      @endif
                    </div>

                    <div class="pt-2 mb-4 d-flex justify-content-between">
                      <a href="/login" class="btn btn-warning btn-lg">Kembali</a>
                      <div>
                          <button class="btn btn-success btn-lg" type="submit">Lanjutkan</button>
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
  
  {{-- script mata di password  --}}
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    var passwordInput = document.getElementById("form2Example27");
    var toggleButton = document.getElementById("togglePassword");
    var toggleIcon = document.getElementById("toggleIcon");
  
    toggleButton.addEventListener("click", function() {
      if (passwordInput.type === "password") {
        passwordInput.type = "text";
        toggleIcon.classList.remove("fa fa-eye");
        toggleIcon.classList.add("fa fa-eye-slash");
      } else {
        passwordInput.type = "password";
        toggleIcon.classList.remove("fa fa-eye-slash");
        toggleIcon.classList.add("fa fa-eye");
      }
    });
  </script>

  {{-- script sweet alert  --}}
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  @include('sweetalert::alert')
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
</body>
</html>

