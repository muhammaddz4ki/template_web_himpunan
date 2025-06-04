@section('title') {{ 'Verifikasi Anggota' }}@endsection
@extends('admin.layout')
@section('content')
<div class="container-fluid">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Verifikasi Pendaftaran Anggota</h1>
        <div class="badge bg-primary text-white p-2 shadow-sm">
            <i class="fas fa-user-clock mr-1"></i> Menunggu: {{ $unverifiedUsers->total() }}
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center bg-gradient-primary text-white">
            <h6 class="m-0 font-weight-bold">Daftar Anggota Belum Diverifikasi</h6>
            <div class="dropdown no-arrow">
                <a class="dropdown-toggle text-white" href="#" role="button" id="dropdownMenuLink" 
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                   <i class="fas fa-ellipsis-v"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="#"><i class="fas fa-file-export mr-2"></i>Ekspor Data</a>
                    <a class="dropdown-item" href="#"><i class="fas fa-filter mr-2"></i>Filter</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead class="bg-light">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>NIM</th>
                            <th>Email</th>
                            <th>Rayon</th>
                            <th>Tanggal Daftar</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($unverifiedUsers as $user)
                        <tr>
                            <td class="align-middle">{{ $loop->iteration }}</td>
                            <td class="align-middle font-weight-bold">{{ $user->name }}</td>
                            <td class="align-middle">{{ $user->nim }}</td>
                            <td class="align-middle text-truncate" style="max-width: 180px;">{{ $user->email }}</td>
                            <td class="align-middle">
                                <span class="badge badge-secondary">{{ $user->rayon->rayon ?? '-' }}</span>
                            </td>
                            <td class="align-middle">{{ $user->created_at->format('d/m/Y H:i') }}</td>
                            <td class="align-middle">
                                <div class="d-flex justify-content-center">
                                    <!-- Detail Button -->
                                    <a href="{{ url('/admin/users/'.$user->id.'/details') }}" 
                                        class="btn btn-sm btn-info mr-2 action-btn">
                                        <i class="fas fa-eye mr-1"></i> Detail
                                    </a>
                                    
                                    <!-- Verify Button -->
                                    <form action="{{ route('admin.user.verify', $user->id) }}" method="POST" class="mr-2">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" 
                                                class="btn btn-sm btn-success action-btn verify-btn">
                                            <i class="fas fa-check mr-1"></i> Verifikasi
                                        </button>
                                    </form>
                                    
                                    <!-- Reject Button -->
                                    <form action="{{ route('admin.user.reject', $user->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="btn btn-sm btn-danger action-btn reject-btn">
                                            <i class="fas fa-times mr-1"></i> Tolak
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-between align-items-center mt-3">
                <div class="text-muted">
                    Menampilkan {{ $unverifiedUsers->firstItem() }} - {{ $unverifiedUsers->lastItem() }} dari {{ $unverifiedUsers->total() }} entri
                </div>
                {{ $unverifiedUsers->links() }}
            </div>
        </div>
    </div>
</div>

<style>
    .action-btn {
        min-width: 100px;
        padding: 0.35rem 0.75rem;
        transition: all 0.3s ease;
        border-radius: 4px;
        font-size: 0.85rem;
        box-shadow: 0 2px 4px rgba(0,0,0,0.05);
    }
    
    .action-btn:hover {
        transform: translateY(-1px);
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
    
    .action-btn i {
        font-size: 0.8rem;
    }
    
    .verify-btn {
        background-color: #28a745;
        border-color: #28a745;
    }
    
    .verify-btn:hover {
        background-color: #218838;
        border-color: #1e7e34;
    }
    
    .reject-btn {
        background-color: #dc3545;
        border-color: #dc3545;
    }
    
    .reject-btn:hover {
        background-color: #c82333;
        border-color: #bd2130;
    }
    
    .table-hover tbody tr:hover {
        background-color: rgba(0,0,0,0.02);
    }
    
    .bg-gradient-primary {
        background: linear-gradient(45deg, #4e73df 0%, #224abe 100%);
    }
</style>

<script>
    $(document).ready(function(){
        $('.verify-btn').click(function(e){
            e.preventDefault();
            Swal.fire({
                title: 'Verifikasi Anggota?',
                text: "Anda yakin ingin memverifikasi anggota ini?",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#28a745',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, Verifikasi!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    $(this).closest('form').submit();
                }
            })
        });
        
        $('.reject-btn').click(function(e){
            e.preventDefault();
            Swal.fire({
                title: 'Tolak Pendaftaran?',
                text: "Anda yakin ingin menolak pendaftaran ini?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc3545',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, Tolak!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    $(this).closest('form').submit();
                }
            })
        });
    });
</script>
@endsection