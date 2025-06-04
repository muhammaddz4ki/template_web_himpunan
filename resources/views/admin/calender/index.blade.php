@section('title') {{ 'Agenda' }}@endsection
@extends('admin.layout')
@section('content')

<div class="card info-card sales-card">
    <div class="container">
        <h2 class="text-center my-2">Agenda Kegiatan</h2>
        <div class="mb-3">
            <a href="/admin/calendar/create" class="btn btn-primary btn-sm">Tambah Agenda</a>
        </div>
        <div class="row">
            <table class="table">
                <tr>
                    <td>No</td>
                    <td>Nama Kegiatan</td>
                    <td>Penyelenggara</td>
                    <td>Waktu</td>
                    <td>Status</td>
                    <td> Aksi</td>

                </tr>
                @foreach ($events as $event)
                
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $event['title'] }}</td>
                    <td>{{ $event->rayon ? $event->rayon->rayon : 'Tidak Diketahui' }}</td>
                    <td>{{ \Carbon\Carbon::parse($event['start'])->diffForHumans() }}</td>
                    <td>
                      @if ($event->status == false)
                          <span class="badge badge-danger">Belum Terlaksana</span>
                      @else
                          <span class="badge badge-success">Terlaksana</span>
                      @endif
                  </td>
                    <td>
                        <form action="{{ route('calendar.destroy', $event->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a href="/admin/calendar/{{ $event->id }}/edit" class="btn btn-warning btn-sm mb-1" >Update</a>
                            <button type="submit" class="btn btn-danger btn-sm mb-1" onclick="return confirm
                            ('Apakah Anda yakin ingin menghapus agenda ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>

        </div>
    </div>

</div>
@endsection