@extends('admin.layouts.app')


@section('content')
<div>
    <h2>Daftar Kamar Kost</h2>
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
                <a href="{{ route('admin.kamar.create') }}" class="btn btn-primary"> <span data-feather="plus-circle"></span> Kamar Baru</a>
            </div>
        </div>
        <br>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Nama Kamar</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Kapasitas</th>
                        <th scope="col">Ukuran</th>
                        <th scope="col">Status</th>
                        {{-- <th scope="col">Keterangan</th> --}}
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kamar as $k)
                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td> <img src="{{ asset('storage/'.$k->foto) }}" alt="kamar" style="width:100px"></td>
                        <td>{{ $k->nama_kamar}}</td>
                        <td>{{ number_format($k->harga, 0) }}</td>
                        <td>{{ $k->kapasitas}}</td>
                        <td>{{ $k->panjang }}x{{ $k->lebar}}</td>
                        <td>{{ ucwords($k->status) }}</td>
                        {{-- <td>{{ $k->keterangan}}</td> --}}
                        <td>
                            <div class="d-flex gap-2 flex-wrap">
                                <a href="{{ route('admin.kamar.show', $k->id) }}" class="btn btn-info"> <i class="fas fa-eye"></i></a>
                                <a href="{{ route('admin.kamar.edit', $k->id) }}" class="btn btn-warning"> <i class="fas fa-pencil"></i></a>
                                <form action="{{ route('admin.kamar.destroy', $k->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin untuk menghapusnya?');"> <i class="fas fa-trash"></i></button>
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