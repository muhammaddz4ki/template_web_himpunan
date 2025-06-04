<!DOCTYPE html>
<html>
<head>
    <title>Pendaftaran Ditolak</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background-color: #f8f9fa; padding: 20px; text-align: center; }
        .content { padding: 20px; }
        .footer { margin-top: 20px; text-align: center; font-size: 12px; color: #6c757d; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Pendaftaran Akun Ditolak</h2>
        </div>
        <div class="content">
            <p>Halo {{ $name }},</p>
            <p>Kami menyesal harus memberitahukan bahwa pendaftaran akun Anda telah ditolak oleh administrator kami.</p>
            <p>Jika Anda merasa ini adalah kesalahan, silakan hubungi tim dukungan kami untuk informasi lebih lanjut.</p>
            <p>Terima kasih atas pengertiannya.</p>
        </div>
        <div class="footer">
            <p>© {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
        </div>
    </div>
</body>
</html>