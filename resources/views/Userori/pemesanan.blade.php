<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pemesanan Kos</title>
    <style>
        /* Styles are unchanged */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            padding: 20px;
            position: relative;
            overflow: hidden;
        }
        body::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('asset/kos.jpeg') no-repeat center center/cover;
            filter: blur(8px);
            opacity: 0.5;
            z-index: -1;
        }
        .booking-form {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            width: 600px;
            position: relative;
            z-index: 1;
            animation: fadeIn 1s ease-in-out;
        }
        .back-button {
            position: absolute;
            top: 15px;
            left: 15px;
            background-color: transparent;
            border: none;
            cursor: pointer;
            font-size: 1.5em;
            color: brown;
            font-weight: bold;
        }
        .back-button:hover {
            color: darkred;
        }
        .booking-form h2 {
            text-align: center;
            color: brown;
            margin-bottom: 20px;
        }
        .form-group {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }
        .form-group label {
            width: 30%;
            margin-right: 10px;
            color: #333;
            font-weight: bold;
            text-align: right;
        }
        .form-group input, 
        .form-group select, 
        .form-group textarea {
            width: 70%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1em;
            transition: all 0.3s ease;
        }
        .form-group textarea {
            resize: vertical;
            height: 80px;
        }
        .form-group input:focus, 
        .form-group select:focus, 
        .form-group textarea:focus {
            border-color: brown;
            box-shadow: 0 0 8px rgba(165, 42, 42, 0.5);
        }
        .button-container {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        .button-container button {
            padding: 10px 250px;
            background-color: brown;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            transition: transform 0.2s ease;
        }
        .button-container button:hover {
            background-color: darkred;
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
        .modal-content h3 {
            color: brown;
        }
        .modal-content p {
            margin: 15px 0;
        }
        .modal-content .close-button {
            background-color: brown;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .modal-content .close-button:hover {
            background-color: darkred;
        }
        .confirmation-form {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            width: 600px;
            margin: auto;
            display: none;
        }
        .confirmation-form h3 {
            text-align: center;
            color: brown;
        }
    </style>
</head>
<body>
    <form class="booking-form" id="bookingForm">
        <button type="button" class="back-button" onclick="history.back()">←</button>
        <h2>Form Pemesanan Kos</h2>
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
    <div id="vaModal" class="modal">
        <div class="modal-content">
            <h3>Virtual Account Pembayaran</h3>
            <p>Nomor VA Anda: <strong id="vaNumber">1234567890123456</strong></p>
            <p>Silakan lakukan pembayaran menggunakan nomor VA di atas.</p>
            <button class="close-button" onclick="closeModal()">Tutup</button>
        </div>
    </div>

    <!-- Konfirmasi Pembayaran Form -->
    <div id="konfirmasiPembayaran" class="confirmation-form">
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
        document.getElementById("bookingForm").style.display = "none";
        document.getElementById("konfirmasiPembayaran").style.display = "block";
    }

    function confirmPayment() {
    // Tampilkan alert sukses setelah konfirmasi pembayaran
    alert("Konfirmasi pembayaran berhasil! Terima kasih.");
    
    // Setelah pengguna mengklik OK pada alert, arahkan kembali ke halaman kamar.blade.php
    window.location.href = "/kamar"; // Sesuaikan path dengan URL yang sesuai dengan halaman kamar Anda
}

</script>


</body>
</html>
