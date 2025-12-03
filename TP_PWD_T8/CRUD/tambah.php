<?php
require_once "../song.php";
$song = new Song();
$categories = $song->getAllCategories();

if (isset($_POST['simpan'])) {

    // --- Proses Upload File ---
    $namaFile = $_FILES['cover']['name'];
    $tmpFile  = $_FILES['cover']['tmp_name'];

    // folder tujuan
    $folder = "../images/";

    // nama baru unik
    $namaBaru = time() . "_" . $namaFile;

    // path final
    $pathBaru = $folder . $namaBaru;

    // pindahkan file
    move_uploaded_file($tmpFile, $pathBaru);

    // simpan ke database
    $song->tambahLagu(
        $_POST['title'],
        $_POST['artist'],
        $_POST['duration'],
        $pathBaru,  // gambar tersimpan di folder images
        $_POST['youtube_url'],
        $_POST['category_id']
    );

    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Tambah Lagu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-dark text-white">

    <div class="container py-5">
        <h2 class="mb-4">➕ Tambah Lagu</h2>

        <!-- WAJIB: enctype untuk upload file -->
        <form method="post" enctype="multipart/form-data">

            <input class="form-control mb-2" name="title" placeholder="Judul Lagu" required>
            <input class="form-control mb-2" name="artist" placeholder="Artist" required>
            <input class="form-control mb-2" name="duration" placeholder="Durasi" required>

            <!-- INPUT FILE COVER -->
            <input type="file" class="form-control mb-2" name="cover" required>

            <input class="form-control mb-2" name="youtube_url" placeholder="YouTube URL" required>

            <select name="category_id" class="form-control mb-3" required>
                <option value="">-- Pilih Kategori --</option>
                <?php foreach ($categories as $c) { ?>
                    <option value="<?= $c['id'] ?>"><?= $c['category_name'] ?></option>
                <?php } ?>
            </select>

            <button name="simpan" class="btn btn-success">Simpan</button>
            <a href="index.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>

</body>

</html>