<?php
session_start();
if (!isset($_SESSION['level']) || $_SESSION['level'] != 0) {
    die("Akses ditolak!");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard Admin</title>
    <style>
        body {
            margin: 0;
            font-family: "Poppins", sans-serif;
            background: #f4f7fa;
            color: #333;
        }

        .header {
            background: #283e51;
            color: white;
            padding: 20px;
            text-align: center;
        }

        .container {
            padding: 20px;
        }

        .card {
            background: white;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        a.logout {
            display: inline-block;
            margin-top: 10px;
            padding: 8px 16px;
            background: #00c6ff;
            color: white;
            text-decoration: none;
            border-radius: 6px;
        }

        a.logout:hover {
            background: #0072ff;
        }
    </style>
</head>

<body>

    <div class="header">
        <h1>Dashboard Admin</h1>
        <p>Halo, <?= htmlspecialchars($_SESSION['username']); ?>!</p>
    </div>

    <div class="container">
        <div class="card">
            <h2>Manajemen User</h2>
            <p>Di sini bisa Anda tampilkan daftar user, tambah user, hapus, edit, dsb.</p>
            <!-- Contoh tombol / link -->
            <a href="user_list.php">Lihat semua user</a>
        </div>

        <div class="card">
            <h2>Statistik Sistem</h2>
            <p>Misalnya: jumlah user, aktivitas terbaru, dsb.</p>
        </div>

        <a class="logout" href="logout.php">Logout</a>
    </div>

</body>

</html>