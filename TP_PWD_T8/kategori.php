<?php
require_once "song.php";
$song = new Song();

// ambil semua kategori
$categories = $song->getAllCategories();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Kategori Musik</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body class="bg-dark text-white">

    <div class="container py-5">
        <div class="">
            <h2 class="mb-4 text-center">🎧 Daftar Lagu Berdasarkan Kategori</h2>
            <div class="d-flex justify-content-between mb-4">
                <a href="index.php" class="btn btn-secondary">Kembali</a>
                <a href="CRUD/tambah.php" class="btn btn-success shadow">
                    ➕ Tambah Lagu
                </a>
            </div>

        </div>
        <?php foreach ($categories as $cat) { ?>

            <!-- CARD PER KATEGORI -->
            <div class="card bg-white mb-4 ">
                <div class="card-header fw-bold fs-5">
                    🎼 <?= $cat['category_name']; ?>
                </div>

                <div class="card-body">
                    <div class="row g-4">

                        <?php
                        // ambil lagu per kategori
                        $songs = $song->getSongByCategory($cat['id']);

                        if (count($songs) == 0) {
                            echo "<p class='text-light'>Belum ada lagu di kategori ini.</p>";
                        }

                        foreach ($songs as $d) {
                        ?>
                            <div class="col-md-3">
                                <div class="card bg-dark h-100 shadow-sm">
                                    <img src="<?= $d['cover']; ?>" class="card-img-top" style="height:180px;object-fit:cover">

                                    <div class="card-body">
                                        <h6 class="text-white"><?= $d['title']; ?></h6>
                                        <small class=" text-white"><?= $d['artist']; ?></small>
                                        <p class="mb-1 text-white">⏱ <?= $d['duration']; ?></p>

                                        <a href="play.php?id=<?= $d['id']; ?>" class="btn btn-danger btn-sm w-100 mb-1">
                                            ▶ Play
                                        </a>

                                        <a href="CRUD/edit.php?id=<?= $d['id']; ?>" class="btn btn-warning btn-sm w-100 mb-1">
                                            ✏ Ubah
                                        </a>

                                        <button onclick="hapusData(<?= $d['id']; ?>)" class="btn btn-dark btn-sm w-100">
                                            🗑 Hapus
                                        </button>


                                    </div>
                                </div>
                            </div>
                        <?php } ?>

                    </div>
                </div>
            </div>

        <?php } ?>
    </div>

    <script>
        function hapusData(id) {
            if (confirm("Yakin ingin menghapus lagu ini?")) {
                window.location.href = "CRUD/hapus.php?id=" + id;
            }
        }
    </script>

</body>

</html>