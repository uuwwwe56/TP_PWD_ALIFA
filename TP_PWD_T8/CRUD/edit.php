<?php
require_once "../song.php";
$song = new Song();

$id = $_GET['id'];
$data = $song->getSongById($id);
$categories = $song->getAllCategories();

if (isset($_POST['update'])) {

    // JIKA UPLOAD GAMBAR BARU
    if (!empty($_FILES['cover']['name'])) {

        $namaFile = $_FILES['cover']['name'];
        $tmpFile  = $_FILES['cover']['tmp_name'];

        // ✅ PASTIKAN FOLDER images/
        $folder = "images/";

        // ✅ NAMA BARU AGAR TIDAK TABRAKAN
        $namaBaru = time() . "_" . basename($namaFile);
        $pathBaru = $folder . $namaBaru;

        // ✅ PINDAHKAN KE images/
        move_uploaded_file($tmpFile, $pathBaru);

        $cover = $pathBaru;
    } else {
        // JIKA TIDAK UPLOAD GAMBAR BARU
        $cover = $data['cover'];
    }

    $song->updateLagu(
        $id,
        $_POST['title'],
        $_POST['artist'],
        $_POST['duration'],
        $cover,
        $_POST['youtube_url'],
        $_POST['category_id']
    );

    header("Location: ../index.php");
}


?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit Lagu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-dark text-white">

    <div class="container py-5">
        <h2 class="mb-4">✏ Ubah Lagu</h2>

        <form method="post" enctype="multipart/form-data">
            <input class="form-control mb-2" name="title" value="<?= $data['title']; ?>" required>
            <input class="form-control mb-2" name="artist" value="<?= $data['artist']; ?>" required>
            <input class="form-control mb-2" name="duration" value="<?= $data['duration']; ?>" required>
            <p>Cover Saat Ini:</p>
            <img src="../<?= $data['cover']; ?>" width="150"><br><br>
            <input type="file" name="cover" class="form-control mb-2">
            <input class="form-control mb-2" name="youtube_url" value="<?= $data['youtube_url']; ?>" required>

            <select name="category_id" class="form-control mb-3" required>
                <?php foreach ($categories as $c) { ?>
                    <option value="<?= $c['id'] ?>"
                        <?= ($c['id'] == $data['category_id']) ? 'selected' : ''; ?>>
                        <?= $c['category_name']; ?>
                    </option>
                <?php } ?>
            </select>

            <button name="update" class="btn btn-warning">Update</button>
            <a href="../index.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>

</body>

</html>