<?php
require_once "song.php";
$song = new Song();

$id = $_GET['id'];
$data = $song->getSongById($id);

// ambil ID youtube (support link panjang & pendek)
function getYoutubeID($url)
{
    preg_match(
        '/(youtu\.be\/|v=)([A-Za-z0-9_\-]+)/',
        $url,
        $matches
    );
    return $matches[2] ?? '';
}

$youtubeID = getYoutubeID($data['youtube_url']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?php echo $data['title']; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-dark">

    <div class="container py-5 text-center">

        <h1 class="mb-4 text-white"><?php echo $data['title']; ?></h1>

        <div class="video-frame">
            <iframe
                width="25%"
                height="100%"
                src="https://www.youtube.com/embed/<?php echo $youtubeID; ?>?autoplay=1"
                title="YouTube video player"
                frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen>
            </iframe>
            <div class="text-white">
                <br><h4>Artist: <?php echo $data['artist']; ?></h4>
                <p>Mood: <strong><?php echo ucfirst($data['category_name']); ?></strong></p>
                <p>Duration: <?php echo $data['duration']; ?></p>
                <a href="index.php" class="btn btn-secondary mt-4">⬅ Kembali</a>
            </div>
        </div>


    </div>

</body>

</html>

