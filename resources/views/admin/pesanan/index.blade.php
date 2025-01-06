@extends('admin.layouts.app')

@section('content')
<div>
    <h2>Daftar Pesanan</h2>
</div>
@if ($message = Session::get('message'))
<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
    <strong>
        <p>{{ $message }}</p>
    </strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col">
                <a href="{{ route('admin.pesanan.create') }}" class="btn btn-primary"> <span data-feather="plus-circle"></span> Pesanan Baru</a>
            </div>
        </div>
        <br>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nomor Pesanan</th>
                        <th scope="col">Nama Penghuni</th>
                        <th scope="col">Email</th>
                        <th scope="col">Kamar</th>
                        <th scope="col">Harga Sewa</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pesanan as $p)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $p->nomor_pesanan }}</td>
                        <td>{{ $p->nama_penghuni }}</td>
                        <td>{{ $p->email }}</td>
                        <td>{{ $p->kamar->nama_kamar }}</td>  <!-- Mengambil nama kamar terkait -->
                        <td>{{ number_format($p->harga_sewa, 0) }}</td>
                        <td>{{ ucwords($p->status) }}</td>
                        <td>
                            <div class="d-flex gap-2 flex-wrap">
                                <a href="{{ route('admin.pesanan.show', $p->id) }}" class="btn btn-info"> <i class="fas fa-eye"></i></a>
                                <a href="{{ route('admin.pesanan.edit', $p->id) }}" class="btn btn-warning"> <i class="fas fa-pencil"></i></a>
                                <form action="{{ route('admin.pesanan.destroy', $p->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin untuk menghapus pesanan ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"> <i class="fas fa-trash"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
