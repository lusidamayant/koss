<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Kost Kita</title>

    <!-- Link ke Font Awesome untuk ikon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #f5f5f5;
            display: flex;
        }

        /* Sidebar */
        .sidebar {
            width: 250px;
            background-color: #4A47A3;
            color: #fff;
            padding-top: 20px;
            height: 100vh;
            position: fixed;
        }

        .sidebar h2 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 22px;
        }

        .sidebar a {
            display: flex;
            align-items: center;
            text-decoration: none;
            color: #fff;
            padding: 15px;
            margin: 5px 10px;
            border-radius: 8px;
            font-size: 18px;
        }

        .sidebar a:hover {
            background-color: #2E3A59;
        }

        .sidebar .active {
            background-color: #6C63FF;
        }

        .sidebar a i {
            margin-right: 10px;
        }

        /* Main content */
        .main-content {
            margin-left: 270px;
            padding: 20px;
            flex: 1;
            background-color: #fff;
            min-height: 100vh;
        }

        .welcome-card {
            background-color: #E4E9FD;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px;
            color: #4A47A3;
            font-weight: bold;
            position: relative;
        }

        .card {
            background-color: #F0F0F5;
            border-radius: 10px;
            padding: 20px;
            text-align: center;
            margin: 10px;
            color: #333;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }

        .card h3 {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .card p {
            font-size: 22px;
            font-weight: bold;
            color: #333;
        }

        .statistics {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-top: 20px;
        }

        /* Profile */
        .profile {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            margin-bottom: 20px;
        }

        .profile img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-left: 10px;
        }

        .profile h4 {
            margin: 0;
            font-size: 16px;
            color: #333;
        }

        .notification {
            position: relative;
            margin-left: 20px;
            cursor: pointer;
        }

        .notification i {
            font-size: 24px;
            color: #333;
        }

        .notification .badge {
            position: absolute;
            top: -5px;
            right: -5px;
            background-color: #FF4136;
            color: #fff;
            border-radius: 50%;
            padding: 5px;
            font-size: 12px;
        }

        /* Rating stars */
        .stars {
            color: #FFD700;
            font-size: 18px;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .statistics {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
    <h2>Kos Rempah</h2>
    <a href="#" class="active"><i class="fas fa-home"></i> Dashboard</a>
    <a href="#"><i class="fas fa-bed"></i> Kamar</a>
    <a href="#"><i class="fas fa-users"></i> Penghuni</a>
    <a href="#"><i class="fas fa-credit-card"></i> Pembayaran</a>
    <a href="#"><i class="fas fa-sign-out-alt"></i> Logout</a>
</div>


    <!-- Main Content -->
    <div class="main-content">
        <!-- Profile Section -->
        <div class="profile">
            <h4>Admin</h4>
            <img src="asset/logokos.jpg" alt="profile">
            <!-- Notification Icon -->
            <div class="notification">
                <i class="fas fa-bell"></i>
                <div class="badge">3</div>
            </div>
        </div>

        <!-- Welcome Card -->
        <div class="welcome-card">
            Welcome, Admin 
        </div>

        <!-- Statistics Cards -->
        <div class="statistics">
            <div class="card">
                <h3>Total Penghuni</h3>
                <p>0</p>
            </div>
            <div class="card">
                <h3>Penghuni Aktif</h3>
                <p>0</p>
            </div>
            <div class="card">
                <h3>Pendapatan Tahun Ini</h3>
                <p>Rp 0</p>
            </div>
            <div class="card">
                <h3>Pendapatan Bulan Ini</h3>
                <p>Rp 0</p>
            </div>
            <div class="card">
                <h3>Total Pendapatan</h3>
                <p>Rp 0</p>
            </div>
            <div class="card">
                <h3>Rating Rata-rata</h3>
                <p class="stars">★★★★★</p>
            </div>
            <div class="card">
                <h3>Jumlah Kamar</h3>
                <p>15</p>
            </div>
            <div class="card">
                <h3>Kamar Kosong</h3>
                <p>15</p>
            </div>
            <div class="card">
                <h3>Kamar Aktif</h3>
                <p>0</p>
            </div>
        </div>
    </div>

</body>
</html>