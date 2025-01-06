@extends('user.layouts.app')

@section('content')
<div class="my-4 row">
    <div class="col-12">
        <div class="booking-form">
            <h1 class="text-center mb-3">Pesanan Saya</h1>
            
            @if($pesanan->isEmpty())
                <p class="text-center">Anda belum memiliki pesanan.</p>
            @else
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kamar</th>
                            <th>Tanggal Pesan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pesanan as $index => $p)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $p->kamar->nama_kamar }}</td>
                            <td>{{ $p->created_at->format('d M Y') }}</td>
                            <td>{{ $p->status }}</td>
                            <td>
                                <a href="{{ route('pemesanan.show', $p->id) }}" class="btn btn-primary btn-sm">Detail</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>
@endsection
