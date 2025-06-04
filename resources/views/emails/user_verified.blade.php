<!DOCTYPE html>
<html>
<head>
    <title>Akun Diverifikasi</title>
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
            <h2>Akun Anda Telah Diverifikasi</h2>
        </div>
        <div class="content">
            <p>Halo {{ $name }},</p>
            <p>Akun Anda telah berhasil diverifikasi oleh administrator. Sekarang Anda dapat mengakses semua fitur yang tersedia di platform kami.</p>
            <p>Terima kasih telah bergabung dengan kami!</p>
        </div>
        <div class="footer">
            <p>© {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
        </div>
    </div>
</body>
</html>