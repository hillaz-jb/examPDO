<?php
include 'vendor/autoload.php';
include 'EcAbstractConnectToDb.php';
include 'EcSong.php';

if (isset($_GET['id-song']) && isset($_GET['id-artist'])){
    $idArtist = $_GET['id-artist'];
    $songToDelete = new EcSong();
    $songToDelete->connection('exam_pdo');
    $songToDelete->delete($_GET['id-song']);
    header("location: songs-artist.php?id=$idArtist&delete=success");
}
