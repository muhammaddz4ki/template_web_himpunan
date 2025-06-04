@section('title') {{ 'User' }}@endsection
@extends('admin.layout')
@section('content')
<div class="card info-card sales-card">
    <div class="container">
        <h2 class="text-center my-2 pt-2">Data Kader</h2>
        <h5>Total Kader: {{ $count_user }}</h5>
        <div class="mb-3">
            <a href="{{ route('create.user') }}" class="btn btn-primary btn-sm">Tambah Kader</a>
        </div>
        <div class="my-3 col-12 col-sm-8 col-md-6">
            <form action="" method="get">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="search" placeholder="Search.....">
                    <button class="btn btn-primary">Search</button>
                </div>
            </form>
        </div>
        <div class="row">
            <table class="table">
                <tr>
                    <td>No</td>
                    <td>Nama</td>
                    <td>Status</td>
                    <td>Verifikasi</td> <!-- Kolom baru untuk status verifikasi -->
                    <td>Rayon</td>
                    <td> Aksi</td>
                </tr>
                
                @foreach ($user as $index=> $kdr)
                <tr>
                    <td>{{ $index + $user -> firstItem() }}</td>
                    <td>{{ $kdr['name'] }}</td>
                    <td>
                        @if ($kdr->role && $kdr->role->role === 'Administrator')
                            <span class="badge badge-success">{{ $kdr->role->role }}</span>
                        @elseif ($kdr->role && $kdr->role->role === 'Ketua')
                            <span class="badge badge-primary">{{ $kdr->role->role }}</span>
                        @elseif ($kdr->role)
                            <span class="badge badge-info">{{ $kdr->role->role }}</span>
                        @else
                            <span class="badge badge-secondary">Tidak Diketahui</span>
                        @endif
                    </td>
                    <td>
                        @if($kdr->is_verified)
                            <span class="badge badge-success">
                                <i class="fas fa-check-circle"></i> Terverifikasi
                            </span>
                        @else
                            <span class="badge badge-warning">
                                <i class="fas fa-hourglass-half"></i> Belum Verifikasi
                            </span>
                        @endif
                    </td>
                    <td> 
                        <a href="/admin/user/rayon/{{ $kdr->rayon->slug }}">{{ $kdr->rayon->rayon }}</a> 
                    </td>
                    
                    @auth
                    <td>
                        <form action="{{ route('user.destroy', $kdr->id) }}" method="POST">
                            <a href="/admin/user/{{ $kdr->id }}/details" class="btn btn-success btn-sm">Detail</a>
                            
                            @if (!empty($kdr->slug))
                                <a href="/profile/{{ $kdr->slug }}" class="btn btn-secondary btn-sm">Profile</a>
                            @else
                                <a href="javascript:void(0);" class="btn btn-danger btn-sm" onclick="alert('Kader belum memiliki akun!')">Profile</a>
                            @endif

                            <a href="/admin/user/{{ $kdr->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
                            @if (in_array(auth()->user()->role_id, [1]))
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus user ini?')">Hapus</button>
                        </form>
                    </td>
                      @endif
                    @endauth
                  </tr>
                @endforeach
            </table>
        </div>
        {{ $user->links() }}
    </div>
</div>
@endsection