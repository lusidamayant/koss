<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemesanan Kamar Kos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }
        body::before {
            content: "";
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('asset/bgkos.jpg') no-repeat center center/cover;
            filter: blur(8px);
            opacity: 0.5;
            z-index: -1;
        }
        .container {
            margin-top: 30px;
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
</head>
<body>
    
    @include('user.layouts.navigasi')

    <div class="container">
        <h1 class="text-center">PEMESANAN KAMAR KOS</h1>
        <div class="booking-form">
            <form id="bookingForm">
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" id="nama" name="nama" placeholder="Masukkan Nama Anda" required>
                </div>
                <div class="form-group">
                    <label for="tipeKamar">Tipe Kamar</label>
                    <input type="text" id="tipeKamar" name="tipeKamar" placeholder="Tipe Kamar" required>
                </div>
                <div class="form-group">
                    <label for="harga">Harga</label>
                    <input type="text" id="harga" name="harga" placeholder="Rp" required>
                </div>
                <div class="form-group">
                    <label for="noTelp">No. Telepon</label>
                    <input type="tel" id="noTelp" name="noTelp" placeholder="Masukkan No. Telepon Anda" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Masukkan Email Anda" required>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea id="alamat" name="alamat" placeholder="Masukkan Alamat Anda" required></textarea>
                </div>
                <div class="form-group">
                    <label for="pembayaran">Metode Pembayaran</label>
                    <select id="pembayaran" name="pembayaran" required>
                        <option value="" disabled selected>Pilih Metode Pembayaran</option>
                        <option value="cash">Cash</option>
                        <option value="transfer">Transfer</option>
                    </select>
                </div>
                <div class="button-container">
                    <button type="button" onclick="submitForm()">Pesan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal VA Pembayaran -->
    <div id="vaModal" class="modal">
        <div class="modal-content">
            <h3>Virtual Account Pembayaran</h3>
            <p>Nomor VA Anda: <strong id="vaNumber">1234567890123456</strong></p>
            <p>Silakan lakukan pembayaran menggunakan nomor VA di atas.</p>
            <button class="close-button" onclick="closeModal()">Tutup</button>
        </div>
    </div>

    <!-- Konfirmasi Pembayaran Form -->
    <div id="konfirmasiPembayaran" class="modal">
        <div class="modal-content">
            <h3>Konfirmasi Pembayaran</h3>
            <div class="form-group">
                <label for="namaPengirim">Nama Pengirim</label>
                <input type="text" id="namaPengirim" name="namaPengirim" placeholder="Nama Pengirim" required>
            </div>
            <div class="form-group">
                <label for="bankKamu">Bank Kamu</label>
                <select id="bankKamu" name="bankKamu" required>
                    <option value="" disabled selected>Pilih Bank Kamu</option>
                    <option value="bca">BCA</option>
                    <option value="bni">BNI</option>
                    <option value="bri">BRI</option>
                    <option value="mandiri">Mandiri</option>
                    <option value="cimb">CIMB Niaga</option>
                    <option value="muamalat">Bank Muamalat</option>
                    <option value="danamon">Bank Danamon</option>
                </select>
            </div>
            <div class="form-group">
                <label for="bankTujuan">Bank Tujuan</label>
                <select id="bankTujuan" name="bankTujuan" required>
                    <option value="" disabled selected>Pilih Bank Tujuan</option>
                    <option value="bca">BCA</option>
                    <option value="bni">BNI</option>
                    <option value="bri">BRI</option>
                    <option value="mandiri">Mandiri</option>
                    <option value="cimb">CIMB Niaga</option>
                    <option value="muamalat">Bank Muamalat</option>
                    <option value="danamon">Bank Danamon</option>
                </select>
            </div>
            <div class="form-group">
                <label for="tanggalTransfer">Tanggal Transfer</label>
                <input type="date" id="tanggalTransfer" name="tanggalTransfer" required>
            </div>
            <div class="form-group">
                <label for="jumlah">Jumlah</label>
                <input type="text" id="jumlah" name="jumlah" placeholder="Jumlah Pembayaran" required readonly>
            </div>
            <div class="form-group">
                <label for="buktiTransfer">Bukti Transfer</label>
                <input type="file" id="buktiTransfer" name="buktiTransfer" accept="image/*,application/pdf" required>
            </div>
            <div class="button-container">
                <button type="button" onclick="confirmPayment()">Kirim Konfirmasi</button>
                <button type="button" onclick="goBack()">Kembali</button>
            </div>
        </div>
    </div>

    <script>
        function submitForm() {
            // Fungsi untuk menghasilkan nomor VA acak 16 digit
            function generateRandomVA() {
                let va = '';
                for (let i = 0; i < 16; i++) {
                    va += Math.floor(Math.random() * 10); // Menambahkan angka acak antara 0 dan 9
                }
                return va;
            }

            // Menghasilkan nomor VA acak
            const randomVA = generateRandomVA();
            
            // Tampilkan nomor VA di modal
            document.getElementById("vaNumber").innerText = randomVA;
            
            // Tampilkan modal
            document.getElementById("vaModal").style.display = "block";
            
            // Set harga untuk konfirmasi pembayaran
            document.getElementById("jumlah").value = document.getElementById("harga").value;
        }

        function closeModal() {
            // Sembunyikan modal VA dan tampilkan form konfirmasi pembayaran
            document.getElementById("vaModal").style.display = "none";
            document.getElementById("konfirmasiPembayaran").style.display = "block";
        }

        function confirmPayment() {
            // Tampilkan alert sukses setelah konfirmasi pembayaran
            alert("Konfirmasi pembayaran berhasil! Terima kasih.");
            
            // Setelah pengguna mengklik OK pada alert, kembali ke halaman kamar.blade.php
            window.location.href = "/kamar"; // Sesuaikan path dengan URL yang sesuai dengan halaman kamar Anda
        }

        function goBack() {
            // Pengguna ke halaman pemesanan
            window.location.href = "/pemesanan"; // 
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>

    @include('user.layouts.footer')
</body>
</html>
