@extends('user.layouts.app')
@section('css')
<style>
    .custom-text-bold {
        font-size: 1.5rem;
        font-weight: bold;
    }
    .booking-form {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
            margin: auto;
            animation: fadeIn 1s ease-in-out;
            margin-bottom: 50px;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .form-group label {
            font-weight: bold;
            color: #333;
            text-align: left; /* Menambahkan text-align: left untuk meratakan teks ke kiri */
            display: block; /* Menjadikan label menjadi block untuk mengatur posisi */
        }
        .form-group input, .form-group select, .form-group textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .button-container {
            text-align: center;
            margin-top: 20px;
        }
        .button-container button {
            padding: 15px 0;  /* Padding atas dan bawah yang lebih besar */
            background-color: #646565;
            color: white;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            width: 100%; /* Membuat tombol melebar hingga lebar penuh form */
            font-size: 18px; /* Ukuran font lebih besar agar mudah dibaca */
            margin-bottom: 10px; /* Jarak antar tombol */
        }
        .button-container button:hover {
            background-color: #215a51;
        }
        .modal {
            display: none;
            position: fixed;
            z-index: 10;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            overflow-y: auto;
        }
        .modal-content {
            background-color: white;
            margin: 10% auto;
            padding: 20px;
            border-radius: 10px;
            width: 80%;
            max-width: 500px;
            text-align: center;
        }
        .modal-content button {
            background-color: #646565; /* Warna latar belakang button */
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease; /* Menambahkan efek transisi saat hover */
        }
        .modal-content button:hover {
            background-color: #215a51; /* Warna latar belakang saat hover */
        }
        h1 {
            font-weight: bold;
        }
</style>
@endsection
@section('content')
<div class="my-4 row">
    <div class="col-12 col-md-6">
        <div class="booking-form">
            <h1 class="text-center mb-3">PEMESANAN KAMAR KOS</h1>
            <form id="bookingForm" action="{{ route('kamar.buatPesanan', $kamar->id) }}" method="POST">
                @csrf
                <input type="hidden" name="id_kamar" value="{{ $kamar->id }}">
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" id="nama" name="nama" value="{{ old('nama') }}" placeholder="Masukkan Nama Anda" required>
                </div>
                <div class="form-group">
                    <label for="noTelp">No. Telepon</label>
                    <input type="tel" id="noTelp" name="noTelp" value="{{ old('noTelp') }}" placeholder="Masukkan No. Telepon Anda" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Masukkan Email Anda" required>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea id="alamat" name="alamat" placeholder="Masukkan Alamat Anda" required>{{ old('alamat') }}</textarea>
                </div>
                <div class="form-group">
                    <label for="pembayaran">Metode Pembayaran</label>
                    <select id="pembayaran" name="pembayaran" required>
                        <option value="" disabled selected>Pilih Metode Pembayaran</option>
                        <option value="Tunai" {{ old('pembayaran') == 'Tunai' ? 'selected':'' }}>Tunai</option>
                        <option value="Transfer" {{ old('pembayaran') == 'Transfer' ? 'selected':'' }}>Transfer</option>
                    </select>
                </div>
                <div class="button-container">
                    <button type="submit" class="btn btn-success">Pesan</button>
                </div>
            </form>
        </div>
    </div>
    <div class="col-12 col-md-6">
        <div class="booking-form">
            <div class="">
                <h1 class="text-center mb-3">INFORMASI PEMESANAN</h1>
                <img src="{{ asset('storage/'.$kamar->foto) }}" alt="{{ $kamar->nama_kamar }}" class="img-fluid rounded" style="height: 200px; object-fit: cover;">
                <hr>
                <h3 style="font-size: 1.2rem;">{{ $kamar->nama_kamar }}</h3>
                <h4 class="custom-text-bold">{{ formatRupiah($kamar->harga) }} / bulan</h4>
                <p>{{ $kamar->deskripsi }}</p>

                <h5>Fasilitas:</h5>
                <p>
                    {!! nl2br($kamar->keterangan) !!}
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
