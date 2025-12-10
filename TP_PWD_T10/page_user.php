<?php
session_start();
if (!isset($_SESSION['level']) || $_SESSION['level'] != 1) {
    die("Akses ditolak!");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard User</title>
    <style>
        body {
            margin: 0;
            font-family: "Poppins", sans-serif;
            background: #eef2f5;
            color: #333;
        }

        .header {
            background: #4b79a1;
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
            background: #4b79a1;
            color: white;
            text-decoration: none;
            border-radius: 6px;
        }

        a.logout:hover {
            background: #376382;
        }
    </style>
</head>

<body>

    <div class="header">
        <h1>Dashboard User</h1>
        <p>Selamat datang, <?= htmlspecialchars($_SESSION['username']); ?>!</p>
    </div>

    <div class="container">
        <div class="card">
            <h2>Profil Anda</h2>
            <p>Informasi pengguna bisa ditampilkan di sini (username, tanggal daftar, dsb.).</p>
        </div>

        <div class="card">
            <h2>Menu Utama</h2>
            <p>Misalnya: lihat data, edit profil, pengaturan, dsb.</p>
        </div>

        <a class="logout" href="logout.php">Logout</a>
    </div>

</body>

</html>