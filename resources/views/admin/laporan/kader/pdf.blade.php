<!DOCTYPE html>
<html>
<head>
    <title>Laporan Kader</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .header {
            position: relative;
            text-align: center;
            padding: 0;
            margin: 0;
        }
        .logo {
            position: absolute;
            left: 0;
            top: 8;
            width: 100px;
        }
        .org-info {
            margin-left: 80px;
            text-align: center;
            padding-top: 10px;
        }
        .org-name {
            font-size: 25px;
            font-weight: bold;
            margin: 0;
            line-height: 1.3;
        }
        .org-address {
            font-size: 14px;
            margin: 5px 0;
        }
        .clear {
            clear: both;
        }
        .horizontal-line {
            border-top: 3px double #000;
            margin: 10px 20px;
        }
        .content {
            text-align: center;
            margin: 20px;
        }
        .title {
            font-size: 25px;
            font-weight: bold;
            margin-bottom: 10px;
            text-transform: uppercase;
        }
        .info {
            font-size: 12px;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
            font-size: 12px;
        }
        th {
            background-color: #f2f2f2;
        }
        .signature {
            text-align: right;
            margin-right: 50px;
            margin-top: 30px;
        }
        .signature p {
            margin: 5px 0;
            font-size: 14px;
        }
        .signature .name {
            margin-top: 70px;
            font-weight: bold;
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="header">
        <img src="{{ asset('sim-pcimm-lampura/public/storage/img/logokami.png') }}" class="logo">
        <div class="org-info">
            <p class="org-name">IKATAN MAHASISWA MUHAMMADIYAH</p>
            <p class="org-name">KABUPATEN LAMPUNG UTARA</p>
            <p class="org-address">Gg. Sri Rejeki No.226/870, Sribasuki, Kec. Kotabumi, Kabupaten Lampung Utara, Lampung 34517</p>
        </div>
    </div>
    <div class="clear"></div>
    <div class="horizontal-line"></div>
    
    <div class="content">
        <div class="title">Laporan {{ request('rayon_id') == 'blog' ? 'Blog / Berita' : 'Daftar Kader' }}</div>
        <div class="info">
            {{ $filter_message }} <br>
            Total Data: {{ request('rayon_id') == 'blog' ? $posts->count() . ' Blog / Berita' : $kader->count() . ' Kader' }}
        </div>

        @if(request('rayon_id') == 'blog')
        <!-- Tabel Blog -->
        <table>
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Kategori</th>
                    <th>Penulis</th>
                    <th>Status</th>
                    <th>Tanggal Publikasi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->title ?? '-' }}</td>
                        <td>{{ $post->category->title ?? '-' }}</td>
                        <td>{{ $post->user->name ?? '-' }}</td>
                        <td>{{ $post->active ? 'Aktif' : 'Tidak Aktif' }}</td>
                        <td>{{ \Carbon\Carbon::parse($post->created_at)->format('d/m/Y H:i') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        @else
        <!-- Tabel Kader -->
        <table>
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>NPM</th>
                    <th>Kelamin</th>
                    <th>Rayon</th>
                    <th>Prodi</th>
                    <th>Alamat</th>
                    <th>WhatsApp</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kader as $item)
                    <tr>
                        <td>{{ $item->name ?? '-' }}</td>
                        <td>{{ $item->nim ?? '-' }}</td>
                        <td>{{ $item->kelamin == 'L' ? 'Laki-Laki' : 'Perempuan' }}</td>
                        <td>{{ $item->rayon->rayon ?? '-' }}</td>
                        <td>{{ $item->prodi ?? '-' }}</td>
                        <td>{{ $item->alamat ?? '-' }}</td>
                        <td>{{ $item->wa ?? '-' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>

    <div class="signature">
        <p>Kotabumi, {{ \Carbon\Carbon::now()->translatedFormat('j F Y') }}</p>
        <p>Ketua Umum</p>
        <p class="name">Okta Irjun Saputra, S.Pd</p>
    </div>
</body>
</html>
