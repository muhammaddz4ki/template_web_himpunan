<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="icon" type="image/png" href="assets/img/favicon.png" sizes="32x32">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <title>Forget Password</title>
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
                    
                  <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="d-flex align-items-center justify-content-center mb-6 pb-1 text-center">
                      <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                      <span class="h1 fw-bold mb-0">
                        <img style="width: 100px; height: 100px; object-fit:cover" src="{{ asset('storage/img/logokomi.png') }}" alt="">
                      </span>
                    </div>                    
  
                    <h3 class="fw-normal text-center" style="letter-spacing: 1px;">Lupa Password Kamu ?</h3>
                    <h6 class="fw-normal mb-3 pb-3 text-center" style="letter-spacing: 1px;">Silahkan Masukan Email Kamu Disini!</h6>
                        <!-- Jika tautan reset kata sandi berhasil dikirim -->
                        @if (session('status') === trans('passwords.sent'))
                        <div class="alert alert-success">
                            {{ trans('passwords.sent') }}
                        </div>
                    @endif

                    <!-- Jika terjadi kesalahan saat mengirim tautan reset kata sandi -->
                    @if ($errors->has('email'))
                        <div class="alert alert-danger">
                            {{ $errors->first('email') }}
                        </div>
                    @endif

                    <div class="form-group mb-3">
                      <label class="font-weight-bold">Alamat Email</label>
                      <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                          name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                          placeholder="Masukkan Alamat Email">
                    </div>

                    <div class="pt-1 mb-4 d-flex justify-content-between">
                      <a href="/login" class="btn btn-warning btn-lg">Kembali</a>
                      <button class="btn btn-success btn-lg" type="submit">Reset Password</button>
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
  
  {{-- script sweet alert  --}}
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  @include('sweetalert::alert')
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
</body>
</html>
