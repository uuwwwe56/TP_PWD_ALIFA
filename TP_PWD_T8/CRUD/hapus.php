<?php
require_once "../song.php";
$song = new Song();

$id = $_GET['id'];
$song->hapusLagu($id);

header("Location: ../kategori.php");
