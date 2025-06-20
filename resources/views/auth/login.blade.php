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
  <title>Login</title>
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
                  
                  <form method="POST" action="authenticate">
                    @csrf
                    <div class="d-flex align-items-center justify-content-center mb-6 pb-1 text-center">
                      <span class="h1 fw-bold mb-0">
                        <img style="width: 100px; height: 100px; object-fit:cover" src="{{ asset('storage/img/logokomi.png') }}" alt="">
                      </span>
                    </div>                    
  
                    <h5 class="fw-normal text-center mb-3" style="letter-spacing: 1px;">Masuk ke Akun Anda</h5>
  
                    <div class="form-outline mb-2">
                      <!-- <label class="form-label" for="form2Example17">Email</label> -->
                      <input type="email" placeholder="Masukan email..." name="email" id="form2Example17" autofocus class="form-control form-control-lg" />
                    </div>

                    <div class="form-outline">
                      @if(Session::has('error'))
                      <div class="alert alert-danger">
                          {{ Session::get('error') }}
                      </div>
                      @endif
                    </div>

                    <div class="form-outline mb-2">
                      <!-- <label class="form-label" for="form2Example27">Password</label> -->
                      <div class="input-group">
                        <input type="password" placeholder="Masukan password..." name="password" id="form2Example27" class="form-control form-control-lg" />
                        <button type="button" id="togglePassword" class="btn btn-primary">
                          <i id="toggleIcon" class="fa fa-eye"></i>
                        </button>
                      </div>
                    </div>
  
                    <div class="pt-2 mb-4 d-flex justify-content-between">
                      <a href="/" class="btn btn-warning btn-lg">Kembali</a>
                      <div>
                          <button class="btn btn-success btn-lg" type="submit">Login</button>
                      </div>
                    </div>
                    
                    <hr>

                    <div class="pb-2 text-center">
                      <a href="{{ route('password.request') }}" style="text-decoration: none">
                        <h6>Lupa Password</h6>
                      </a>
                      <a href="{{ route('register') }}" style="text-decoration: none"><h6>Belum Punya Akun ?</h6></a>
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

