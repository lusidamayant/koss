@extends('admin.layouts.app')

@section('content')
<div>
    <h2>Daftar Penghuni Kost</h2>
</div>

@if ($message = Session::get('success'))
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
                <a href="{{ route('admin.penghuni.create') }}" class="btn btn-primary"> <span data-feather="plus-circle"></span>Tambah Penghuni Baru</a>
                </a>
            </div>
        </div>
        <br>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Kamar</th>
                        <th scope="col">Tanggal Pesan</th>
                        <th scope="col">Tanggal Masuk</th>
                        <th scope="col">Tanggal Keluar</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($penghuni as $p)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $p->kamar->nama_kamar ?? '-' }}</td>
                        <td>{{ $p->tanggal_pesan }}</td>
                        <td>{{ $p->tanggal_masuk }}</td>
                        <td>{{ $p->tanggal_keluar ?? '-' }}</td>
                        <td>{{ ucwords($p->status) }}</td>
                        <td>
                            <div class="d-flex gap-2 flex-wrap">
                                <a href="{{ route('admin.penghuni.show', $p->id) }}" class="btn btn-info"> <i class="fas fa-eye"></i></a>
                                <a href="{{ route('admin.penghuni.edit', $p->id) }}" class="btn btn-warning">
                                    <i class="fas fa-pencil"></i>
                                </a>
                                <form action="{{ route('admin.penghuni.destroy', $p->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin untuk menghapusnya?');">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center">
            {{ $penghuni->links() }}
        </div>
    </div>
</div>
@endsection
