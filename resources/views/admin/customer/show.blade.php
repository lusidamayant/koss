@extends('admin.layouts.app')

@section('content')
<div class="card">
    <div class="card-body">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-style1 mb-0">
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.customer.index') }}">Customer</a>
                </li>
                <li class="breadcrumb-item active">
                    <a href="javascript:void(0);">Detail Customer</a>
                </li>
            </ol>
        </nav>
    </div>
</div>

<div class="mt-4">
    <div class="card shadow-sm">
        <div class="card-body">
            <!-- Nama Customer -->
            <div class="mb-3">
                <label class="form-label"><strong>Nama Customer:</strong></label>
                <p>{{ $customer->name }}</p>
            </div>

            <!-- Email Customer -->
            <div class="mb-3">
                <label class="form-label"><strong>Email:</strong></label>
                <p>{{ $customer->email }}</p>
            </div>

            <!-- Tanggal Verifikasi Email -->
            <div class="mb-3">
                <label class="form-label"><strong>Tanggal Verifikasi Email:</strong></label>
                <p>{{ $customer->email_verified_at ? $customer->email_verified_at->format('d-m-Y H:i') : 'Belum diverifikasi' }}</p>
            </div>

            <!-- Tanggal Registrasi -->
            <div class="mb-3">
                <label class="form-label"><strong>Tanggal Registrasi:</strong></label>
                <p>{{ $customer->created_at->format('d-m-Y H:i') }}</p>
            </div>

            <!-- Tombol Aksi -->
            <div class="mb-3">
                <a href="{{ route('admin.customer.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </div>
</div>
@endsection
