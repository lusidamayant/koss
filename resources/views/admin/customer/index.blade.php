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
                    <a href="javascript:void(0);">Daftar Customer</a>
                </li>
            </ol>
        </nav>
    </div>
</div>

<div class="mt-4">
    <div class="card shadow-sm">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="card-title">Daftar Customer</h4>
                <a href="{{ route('admin.customer.create') }}" class="btn btn-primary">Tambah Customer</a>
            </div>

            <!-- Tabel Daftar Customer -->
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Customer</th>
                        <th>Email</th>
                        <th>Status Email</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($customers as $key => $customer)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $customer->name }}</td>
                            <td>{{ $customer->email }}</td>
                            <td>
                                <span class="badge bg-{{ $customer->email_verified_at ? 'success' : 'danger' }}">
                                    {{ $customer->email_verified_at ? 'Terverifikasi' : 'Belum Terverifikasi' }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('admin.customer.show', $customer->id) }}" class="btn btn-info btn-sm">Lihat</a>
                               
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>
@endsection
