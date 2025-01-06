<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Pembayaran</title>
    <style>
        * {
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #1e1e2f;
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        .container {
            width: 90%;
            max-width: 800px;
            background-color: #25273c;
            padding: 20px;
            border-radius: 8px;
            display: flex;
            gap: 20px;
        }

        .left-section, .right-section {
            width: 100%;
        }

        h3 {
            margin-bottom: 10px;
            font-size: 18px;
            color: #a3a3ff;
        }

        .info, .form-group {
            background-color: #2e2f47;
            padding: 15px;
            border-radius: 6px;
            margin-bottom: 15px;
        }

        .info p, .info ul {
            margin: 0;
            font-size: 14px;
            color: #c7c7c7;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .form-group label {
            font-weight: bold;
            margin-bottom: 5px;
            color: #a3a3ff;
        }

        .form-group input[type="text"],
        .form-group select,
        .form-group input[type="date"],
        .form-group input[type="file"] {
            padding: 10px;
            font-size: 14px;
            border: 1px solid #444;
            border-radius: 4px;
            background-color: #1e1e2f;
            color: #c7c7c7;
        }

        .form-group input[readonly] {
            background-color: #2e2f47;
        }

        .error-message {
            font-size: 12px;
            color: #ff5f5f;
            margin-top: 5px;
        }

        .btn-submit {
            padding: 12px;
            font-size: 16px;
            font-weight: bold;
            color: #ffffff;
            background-color: #5a5aff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn-submit:hover {
            background-color: #4747ff;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Left Section -->
       
        <!-- Right Section -->
        <div class="right-section">
            <h3>Lakukan Konfirmasi Pembayaran</h3>
            <p>Silahkan lakukan konfirmasi ketika Anda sudah melakukan transfer.</p>
            <form action="#" method="POST">
                <div class="form-group">
                    <label for="nama-pengirim">Nama Pengirim</label>
                    <input type="text" id="nama-pengirim" placeholder="Atas Nama">
                </div>
                <div class="form-group">
                    <label for="bank-kamu">Bank Kamu</label>
                    <select id="bank-kamu">
                        <option value="BRI">BANK BRI</option>
                        <option value="BNI">BANK BNI</option>
                        <option value="Mandiri">BANK Mandiri</option>
                        <option value="BCA">BANK BCA</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="bank-tujuan">Bank Tujuan</label>
                    <select id="bank-tujuan">
                        <option value="BNI">BANK BNI</option>
                        <option value="BRI">BANK BRI</option>
                        <option value="Mandiri">BANK Mandiri</option>
                        <option value="BCA">BANK BCA</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="tanggal-transfer">Tanggal Transfer</label>
                    <input type="date" id="tanggal-transfer">
                    <span class="error-message">Tanggal Transfer tidak boleh kosong</span>
                </div>
                <div class="form-group">
                    <label for="jumlah">Jumlah</label>
                    <input type="text" id="jumlah" value="Rp 540.424" readonly>
                </div>
                <div class="form-group">
                    <label for="bukti-transfer">File Bukti Transfer</label>
                    <input type="file" id="bukti-transfer" accept=".jpg, .jpeg, .png">
                    <span class="error-message">File tidak boleh kosong</span>
                </div>
                <button type="submit" class="btn-submit">Konfirmasi</button>
            </form>
        </div>
    </div>
</body>
</html>