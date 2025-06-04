<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Akun Belum Diverifikasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body style="background-color: #f8f9fa;">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-header bg-danger text-white">
                        <h4 class="mb-0"><i class="fas fa-exclamation-circle me-2"></i>Akun Belum Diverifikasi</h4>
                    </div>
                    <div class="card-body text-center py-5">
                        <div class="mb-4">
                            <i class="fas fa-user-clock fa-5x text-danger"></i>
                        </div>
                        <h3 class="mb-3">Akun Anda Belum Diverifikasi</h3>
                        <p class="lead mb-4">
                            Mohon tunggu verifikasi dari admin. Anda akan mendapatkan notifikasi via email 
                            setelah akun Anda diverifikasi.
                        </p>
                        <p>
                            Jika sudah lebih dari 2x24 jam dan akun Anda belum diverifikasi, 
                            silakan hubungi admin
                        <div class="mt-4">
                            <a href="/logout" class="btn btn-outline-secondary">
                                <i class="fas fa-sign-out-alt me-2"></i>Keluar
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @include('sweetalert::alert')
</body>
</html>