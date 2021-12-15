<?php
include 'vendor/autoload.php';
include 'EcAbstractConnectToDb.php';
include 'EcSong.php';
include 'EcArtist.php';

if (isset($_GET['id-artist'])){
    $songsTable = new EcSong();
    $songsTable->connection('exam_pdo');
    $songsArtist = $songsTable->selectArtistSongs($_GET['id-artist']);

    foreach ($songsArtist as $song) {
        $songsTable->delete($song['id']);
    }

    $artistToDelete = new EcArtist();
    $artistToDelete->connection('exam_pdo');
    $artistToDelete->delete($_GET['id-artist']);

    header("location: list-artists.php?delete-artist=success");
}
