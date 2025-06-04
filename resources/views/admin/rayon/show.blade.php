@section('title') {{ 'Rayon' }} @endsection
@extends('admin.layout')

@section('content')
<div class="card info-card sales-card">
    <div class="container">

        <h2 class="text-center my-2">Data Anggota Rayon 
            @foreach ($rayon as $ray)
                <span>{{ $ray->rayon }}</span>
            @endforeach
        </h2>

        {{-- Total Anggota Rayon --}}
        @foreach ($rayon as $r)
            <h5 class="mb-5 text-center">Total Anggota Rayon {{ $r->rayon }}:  {{ $r->users->count() }}</h5>
        @endforeach

        {{-- Form Pencarian --}}
        <div class="my-3 col-12 col-sm-8 col-md-6">
            <form action="{{ request()->url() }}" method="get">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="search" value="{{ request('search') }}" placeholder="Search.....">
                    <button class="btn btn-primary">Search</button>
                </div>
            </form>
        </div>

        {{-- Tombol Download Data --}}
        <!-- <div class="text-end">
            <a href="/admin/user/rayon/pdf/{{ $r->slug }}" class="btn btn-warning m-3"> 
                <i class="bi bi-printer"></i>  Download Data
            </a>
        </div> -->

        {{-- Tabel Data Anggota --}}
        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Status</th>
                        <th>Kaderisasi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rayon as $ray)
                        @foreach ($ray->users as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->name }}</td>
                                <td>
                                    @if ($item->role->role === 'Administrator')
                                        <span class="badge badge-success">{{ $item->role->role }}</span>
                                    @elseif ($item->role->role === 'Ketua')
                                        <span class="badge badge-primary">{{ $item->role->role }}</span>
                                    @else
                                        <span class="badge badge-info">{{ $item->role->role }}</span>
                                    @endif
                                </td>
                                <td>{{ $item->kaderisasi }}</td>
                                <td>
                                    <a href="/admin/user/{{ $item->id }}/details" class="btn btn-success btn-sm">Detail</a>
                                    <a href="/profile/{{ $item->slug }}" class="btn btn-secondary btn-sm">Profile</a>
                                    <a href="/admin/user/{{ $item->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    @endforeach
                </tbody>
            </table>

            {{-- Pagination --}}
            {{ $rayon->links() }}
        </div>
    </div>
</div>
@endsection
