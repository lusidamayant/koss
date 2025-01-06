@extends('admin.layouts.app')

@section('content')
<div>
    <h2>Daftar Pembayaran</h2>
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
                <a href="{{ route('admin.pembayaran.create') }}" class="btn btn-primary"> <span data-feather="plus-circle"></span> Pembayaran Baru</a>
            </div>
        </div>
        <br>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        {{-- <th scope="col">ID Penghuni</th> --}}
                        <th scope="col">ID Pesanan</th>
                        <th scope="col">Periode</th>
                        <th scope="col">Jumlah Bayar</th>
                        <th scope="col">Metode Bayar</th>
                        <th scope="col">Bukti Bayar</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pembayaran as $p)
                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        {{-- <td>{{ $p->id_penghuni }}</td> --}}
                        <td>{{ $p->id_pesanan }}</td>
                        <td>{{ $p->periode }}</td>
                        <td>{{ number_format($p->jumlah_bayar, 0) }}</td>
                        <td>{{ $p->metode_bayar }}</td>
                        <td>
                            @if($p->bukti_bayar)
                                <a href="{{ asset('storage/'.$p->bukti_bayar) }}" target="_blank">Lihat Bukti</a>
                            @else
                                Tidak ada bukti
                            @endif
                        </td>
                        <td>{{ ucwords($p->status) }}</td>
                        <td>
                            <div class="d-flex gap-2 flex-wrap">
                                <a href="{{ route('admin.pembayaran.show', $p->id) }}" class="btn btn-info"> <i class="fas fa-eye"></i></a>
                                
                                <form action="{{ route('admin.pembayaran.destroy', $p->id) }}" method="POST">
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
