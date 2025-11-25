<?php
require_once "Song.php";
$song = new Song();
$data = $song->getAllSongs();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Smart Playlist Generator</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark shadow-sm custom-nav">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <img src="https://cdn-icons-png.flaticon.com/512/727/727269.png"
                    width="35" class="me-2 icon-white">
                <span class="fw-bold">Smart Playlist</span>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">

                    <li class="nav-item">
                        <a class="nav-link active" href="index.php">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">Genres</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">Top Charts</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>

                    <li class="nav-item ms-3">
                        <a class="btn btn-light rounded-pill px-3 fw-semibold shadow-sm" href="#">
                            Login
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>


    <div class="container py-5">
        <h1 class="text-center mb-5 title-header text-white">🎧 Free Smart Playlist</h1>

        <div class="row g-4">

            <?php foreach ($data as $d) { ?>
                <div class="col-md-3 col-sm-6">
                    <div class="card shadow-sm">
                        <img src="<?php echo $d['cover']; ?>" class="card-img-custom" alt="Cover">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $d['title']; ?></h5>
                            <p class="card-text text-muted mb-1">Artist: <?php echo $d['artist']; ?></p>
                            <p class="card-text mb-1">Mood: <strong><?php echo ucfirst($d['mood']); ?></strong></p>
                            <p class="card-text">Duration: <?php echo $d['duration']; ?></p>
                            <a href="play.php?id=<?php echo $d['id']; ?>" class="btn btn-danger w-100 mt-3">
                                ▶ Play Video
                            </a>

                        </div>
                    </div>
                </div>
            <?php } ?>

        </div>
    </div>

</body>

</html>