@section('title') {{ 'Page' }}@endsection
@extends('admin.layout')
@section('content') 
<div class="pagetitle">
    
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="card-title mb-0">Detail Data Anggota</h5>
                        <div class="badge bg-{{ $user->is_verified ? 'success' : 'warning' }}">
                            {{ $user->is_verified ? 'Terverifikasi' : 'Menunggu Verifikasi' }}
                        </div>
                    </div>

                    <div class="row">
                        <!-- Left Column - Personal Info -->
                        <div class="col-md-6">
                            <div class="info-card mb-4">
                                <div class="info-card-header">
                                    <i class="bi bi-person-badge"></i>
                                    <h6>Informasi Pribadi</h6>
                                </div>
                                <div class="info-card-body">
                                    <div class="info-item">
                                        <span class="info-label">Nama Lengkap</span>
                                        <span class="info-value">{{ $user->name }}</span>
                                    </div>
                                    <div class="info-item">
                                        <span class="info-label">NIM/NPM</span>
                                        <span class="info-value">{{ $user->nim }}</span>
                                    </div>
                                    <div class="info-item">
                                        <span class="info-label">Email</span>
                                        <span class="info-value">{{ $user->email }}</span>
                                    </div>
                                    <div class="info-item">
                                        <span class="info-label">Username</span>
                                        <span class="info-value">{{ $user->username }}</span>
                                    </div>
                                    <div class="info-item">
                                        <span class="info-label">Tempat, Tanggal Lahir</span>
                                        <span class="info-value">{{ $user->t_lahir }}, {{ $user->ttl ? \Carbon\Carbon::parse($user->ttl)->format('d/m/Y') : '-' }}</span>
                                    </div>
                                    <div class="info-item">
                                        <span class="info-label">Jenis Kelamin</span>
                                        <span class="info-value">{{ $user->kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Right Column - Membership Info -->
                        <div class="col-md-6">
                            <div class="info-card mb-4">
                                <div class="info-card-header">
                                    <i class="bi bi-people-fill"></i>
                                    <h6>Informasi Keanggotaan</h6>
                                </div>
                                <div class="info-card-body">
                                    <div class="info-item">
                                        <span class="info-label">Nomor WhatsApp</span>
                                        <span class="info-value">{{ $user->wa }}</span>
                                    </div>
                                    <div class="info-item">
                                        <span class="info-label">Rayon</span>
                                        <span class="info-value">{{ $user->rayon->rayon ?? '-' }}</span>
                                    </div>
                                    <div class="info-item">
                                        <span class="info-label">Program Studi</span>
                                        <span class="info-value">{{ $user->prodi }}</span>
                                    </div>
                                    <div class="info-item">
                                        <span class="info-label">Status Keanggotaan</span>
                                        <span class="info-value">
                                            @if($user->role_id == 3) Kader @endif
                                            @if($user->role_id == 4) Bendahara @endif
                                            @if($user->role_id == 5) Sekretaris @endif
                                        </span>
                                    </div>
                                    <div class="info-item">
                                        <span class="info-label">Jenjang Kaderisasi</span>
                                        <span class="info-value">{{ $user->kaderisasi }}</span>
                                    </div>
                                    <div class="info-item">
                                        <span class="info-label">Tahun Kaderisasi</span>
                                        <span class="info-value">
                                            @if($user->kaderisasi == 'DAD') {{ $user->thn_mapaba }} @endif
                                            @if($user->kaderisasi == 'DAM') {{ $user->thn_pkd }} @endif
                                            @if($user->kaderisasi == 'DAP') {{ $user->thn_pkl }} @endif
                                            @if($user->kaderisasi == 'PPK') {{ $user->thn_pkn }} @endif
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="d-flex justify-content-center gap-3 mt-4">
                        @if(!$user->is_verified)
                        <form action="{{ route('admin.user.verify', $user->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-success btn-lg px-4" 
                                    onclick="return confirm('Verifikasi akun ini?')">
                                <i class="bi bi-check-circle-fill me-2"></i> Verifikasi
                            </button>
                        </form>
                        @endif
                        
                        <form action="{{ route('admin.user.reject', $user->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-lg px-4" 
                                    onclick="return confirm('Tolak dan hapus akun ini?')">
                                <i class="bi bi-x-circle-fill me-2"></i> Tolak
                            </button>
                        </form>
                        
                        <a href="{{ route('admin.user.verify.index') }}" class="btn btn-outline-secondary btn-lg px-4">
                            <i class="bi bi-arrow-left me-2"></i> Kembali
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .info-card {
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
        border: 1px solid rgba(0, 0, 0, 0.05);
    }
    
    .info-card-header {
        background-color: #f8f9fa;
        padding: 1rem 1.5rem;
        display: flex;
        align-items: center;
        border-bottom: 1px solid rgba(0, 0, 0, 0.05);
    }
    
    .info-card-header i {
        font-size: 1.5rem;
        color: #3b7ddd;
        margin-right: 15px;
    }
    
    .info-card-header h6 {
        margin: 0;
        font-weight: 600;
        color: #495057;
    }
    
    .info-card-body {
        padding: 1.5rem;
    }
    
    .info-item {
        display: flex;
        justify-content: space-between;
        padding: 0.75rem 0;
        border-bottom: 1px dashed rgba(0, 0, 0, 0.1);
    }
    
    .info-item:last-child {
        border-bottom: none;
    }
    
    .info-label {
        font-weight: 500;
        color: #6c757d;
    }
    
    .info-value {
        font-weight: 600;
        color: #212529;
        text-align: right;
    }
    
    .btn-lg {
        border-radius: 8px;
        font-weight: 500;
    }
</style>
@endsection