<?php
include 'EcAbstractConnectToDb.php';
include 'EcSong.php';
include 'EcArtist.php';

$songTable = new EcSong();
$songTable->connection();

if (isset($_GET['id-song']) && isset($_GET['id-artist'])) {
    $idArtist = $_GET['id-artist'];
    $songTable->delete($_GET['id-song']);
    header("location: songs-artist.php?id=$idArtist&delete=success");
}
if (!isset($_GET['id-song']) && isset($_GET['id-artist'])) {
    $songsArtist = $songTable->selectArtistSongs($_GET['id-artist']);

    foreach ($songsArtist as $song) {
        $songTable->delete($song['id']);
    }

    $artistTable = new EcArtist();
    $artistTable->connection();
    $artistTable->delete($_GET['id-artist']);

    header("location: list-artists.php?delete-artist=success");
}