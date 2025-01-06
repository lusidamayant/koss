@extends('user.layouts.app')
@section('content')
<style>
    /* Tambahkan CSS sesuai kebutuhan Anda */
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
    .form-group label {
        font-weight: bold;
        color: #333;
    }
    .form-group input, .form-group select, .form-group textarea {
        width: 100%;
        padding: 10px;
        margin-top: 5px;
        margin-bottom: 15px;
        border: 1px solid #ddd;
        border-radius: 5px;
    }
    .button-container button {
        padding: 15px 0;
        background-color: #646565;
        color: white;
        border: none;
        border-radius: 10px;
        cursor: pointer;
        width: 100%;
        font-size: 18px;
        margin-bottom: 10px;
    }
    .button-container button:hover {
        background-color: #215a51;
    }
</style>
@endsection

@section('content')
<div class="my-4 row">
    <div class="col-12">
        <div class="booking-form">
            <h1 class="text-center mb-3">KONFIRMASI PEMBAYARAN</h1>
            <form id="paymentForm" action="{{ route('kamar.buatPesanan', $kamar->id) }}" method="POST">
                @csrf
                <!-- Hidden Input untuk ID Kamar -->
                <input type="hidden" name="id_kamar" value="{{ $kamar->id }}">

                <!-- Periode Pembayaran -->
                <div class="form-group">
                    <label for="periode">Periode Pembayaran</label>
                    <select id="periode" name="periode" required>
                        <option value="" disabled selected>Pilih Periode Pembayaran</option>
                        @foreach (['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'] as $bulan)
                            <option value="{{ $bulan }}">{{ $bulan }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Jumlah Bayar -->
                <div class="form-group">
                    <label for="jumlah_bayar">Jumlah Bayar</label>
                    <input type="text" id="jumlah_bayar" name="jumlah_bayar" value="{{ formatRupiah($kamar->harga) }}" readonly>
                </div>

                <!-- Metode Pembayaran -->
                <div class="form-group">
                    <label for="metode_bayar">Metode Pembayaran</label>
                    <select id="metode_bayar" name="metode_bayar" required>
                        <option value="" disabled selected>Pilih Metode Pembayaran</option>
                        <option value="Tunai">Tunai</option>
                        <option value="Transfer">Transfer</option>
                    </select>
                </div>

                <!-- Unggah Bukti Bayar (Hanya untuk Transfer) -->
                <div class="form-group" id="buktiBayarGroup" style="display: none;">
                    <label for="bukti_bayar">Unggah Bukti Bayar</label>
                    <input type="file" id="bukti_bayar" name="bukti_bayar" accept="image/*">
                </div>

                <!-- Tombol Submit -->
                <div class="button-container">
                    <button type="submit" class="btn btn-success">Konfirmasi Pembayaran</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    // JavaScript untuk menampilkan/menghilangkan kolom Bukti Bayar berdasarkan metode pembayaran
    document.getElementById('metode_bayar').addEventListener('change', function () {
        const buktiBayarGroup = document.getElementById('buktiBayarGroup');
        if (this.value === 'Transfer') {
            buktiBayarGroup.style.display = 'block';
        } else {
            buktiBayarGroup.style.display = 'none';
        }
    });
</script>
@endsection