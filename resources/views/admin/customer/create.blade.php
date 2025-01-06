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
                    <a href="javascript:void(0);">Buat</a>
                </li>
            </ol>
        </nav>
    </div>
</div>

<div class="card mt-4">

    <div class="card-body">
        <form action="{{ route('admin.customer.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nama:</label>
                <input type="text" name="name" class="form-control" required>
            </div>
        
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" name="email" class="form-control" required>
            </div>
        
            <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input type="password" name="password" class="form-control" required>
            </div>
        
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Konfirmasi Password:</label>
                <input type="password" name="password_confirmation" class="form-control" required>
            </div>
        
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
        
    </div>
</div>

@endsection
