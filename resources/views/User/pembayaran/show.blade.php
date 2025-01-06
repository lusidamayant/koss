@extends('user.layouts.app')

@section('content')
<div class="my-4 row">
    <div class="col-12">
        <div class="booking-form">
            <h1 class="text-center mb-3">DETAIL PEMESANAN</h1>
            <div>
                <h3>Informasi Pemesanan</h3>
                <table class="table">
                    <tr>
                        <th>Nama Penghuni</th>
                        <td>{{ $pesanan->nama_penghuni }}</td>
                    </tr>
                    <tr>
                        <th>No. Telepon</th>
                        <td>{{ $pesanan->kontak }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ $pesanan->email }}</td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td>{{ $pesanan->alamat }}</td>
                    </tr>
                    <tr>
                        <th>Metode Pembayaran</th>
                        <td>{{ $pesanan->pembayaran->metode_bayar }}</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>{{ $pesanan->status }}</td>
                    </tr>
                    <tr>
                        <th>Nomor Pesanan</th>
                        <td>{{ $pesanan->nomor_pesanan }}</td>
                    </tr>
                </table>

                <h3>Informasi Kamar</h3>
                <table class="table">
                    <tr>
                        <th>Nama Kamar</th>
                        <td>{{ $pesanan->kamar->nama_kamar }}</td>
                    </tr>
                    <tr>
                        <th>Harga Sewa</th>
                        <td>{{ formatRupiah($pesanan->harga_sewa) }} / bulan</td>
                    </tr>
                    <tr>
                        <th>Deskripsi</th>
                        <td>{{ $pesanan->kamar->deskripsi }}</td>
                    </tr>
                    <tr>
                        <th>Fasilitas</th>
                        <td>{!! nl2br($pesanan->kamar->keterangan) !!}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection