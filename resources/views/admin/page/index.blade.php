@section('title') {{ 'Page' }}@endsection
@extends('admin.layout')
@section('content')
<div class="card info-card sales-card">
    <div class="container">
        <h2 class="text-center my-2">Edit Home Page</h2>
        <div class="row">
            <table class="table">
                <tr>
                    <td>No</td>
                    <td>Judul</td>
                    <td>Deskripsi</td>
                    <td>Link</td>
                    <td>Gambar</td>
                    <td> Aksi</td>
                </tr>
                @foreach ($pages as $page)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $page['judul'] }}</td>
                    <td>{{ $page['deskripsi'] }}</td>
                    <td>{{ $page['link'] }}</td>
                    <td>
                    <td class="text-center">
                        <img 
                            src="{{ asset('sim-pcimm-lampura/public/storage/img/' . $page->gambar ) }}" 
                            width="60" 
                            class="img-fluid img-thumbnail" 
                            style="max-height: 60px; cursor: pointer;" 
                            onclick="showImageModal('{{ asset('sim-pcimm-lampura/public/storage/img/' . $page->gambar ) }}', '{{ $page['judul'] }}')" 
                            alt="Thumbnail">
                    </td>
                    </td>
                    <td>
                        <a href="/admin/page/{{ $page->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection