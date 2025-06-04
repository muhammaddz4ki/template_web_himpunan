<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
  <title>KTA | PC-IMM Lampura</title>
  <link rel="stylesheet" href="{{ asset('assets_user/css/kta.css') }}">
</head>
<body>
  <div class="container">
    <div class="header">
      <div class="tgl">
        <p>Dicetak: <br> {{ $now }}</p>
      </div>
      <div class="title">
        <h2>PC-IMM Lampung Utara</h2>
        <h4>Universitas Muhammadiyah Kotabumi</h4>
        <h4>Kartu Tanda Anggota</h4>
      </div>
      <div class="logo">
        <img src="{{ asset('img/logokomi.png') }}" alt="logo">
      </div>
    </div>

    <div><hr></div>

    <div class="profile">
      <div class="gambar">
        <img src="{{ asset('sim-pcimm-lampura/public/storage/img/' . $users->img ) }}" alt="">
      </div>

      <div class="bio">
        <table>
          <tbody>
            <tr>
              <th scope="row">Nama</th>
              <td>{{ $users->name }}</td>
            </tr>
            <tr>
              <th scope="row">NIM</th>
              <td>{{ $users->nim }}</td>
            </tr>
            <tr>
              <th scope="row">Tgl Lahir</th>
              <td>{{ $users->t_lahir }}, {{ $users->ttl }}</td>
            </tr>
            <tr>
              <th scope="row">Rayon</th>
              <td>{{ $users->rayon->rayon }}</td>
            </tr>
            <tr>
              <th scope="row">Kaderisasi</th>
              <td>{{ $users->kaderisasi }}</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <!-- <div class="qr">
      {!! QrCode::size(80)->generate("https://pmiiuninus.com/qrcode/varifikasi/kta/{$users->id}/anjay/mabar/ckuahsksdfsihew/S3NAT-4NJ1NG-63lut-73ng/51-3nd1") !!}
    </div> -->

    <hr>

    <div class="footer" style="margin-top:12px;">
      <p class="mp-0">Kartu ini adalah tanda bahwa kader tersebut adalah benar kader PC-IMM Lampung Utara</p>
    </div>

  </div>

  <script type="text/javascript">
         window.print();
  </script>
</body>
</html>
