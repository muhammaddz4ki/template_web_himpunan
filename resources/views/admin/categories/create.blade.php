@section('title') {{ 'Tambah Category' }}@endsection
@extends('admin.layout')
@section('content')
<div class="card info-card sales-card">
    <div class="container">

        <h4 class="text-center my-3">Tambah Category Blog</h4>
        <form action="/admin/post/category/store" method="post">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Nama Category Baru</label>
                <input type="text" name="title" class="form-control" id="title" class="mb-3" required>
            </div>
            <div class="mb-3">
                <a href="/admin/post/category" class="btn btn-warning btn-sm">Kembali</a>
                <button type="submit" class="btn btn-primary btn-sm">Simpan Data</button>
            </div>
        </form>
    </div>
</div>
@endsection