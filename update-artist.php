<?php
include 'vendor/autoload.php';
include 'EcAbstractConnectToDb.php';
include 'EcArtist.php';

if (isset($_GET['id'])) {
    $artist = new EcArtist();
    $artist->connection('exam_pdo');
    $artist->updateArtist($_GET['id'], $_POST['name'], $_POST['age'] );
    header('location: list-artists.php?update=success');
}

