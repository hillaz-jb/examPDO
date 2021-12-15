<?php

include 'EcAbstractConnectToDb.php';
include 'EcSong.php';

$field = '';
$fieldValue = '';

if (isset($_POST['title']) && $_POST['title'] !== ''){
    $field = 'title';
    $fieldValue = $_POST['title'];
}

header("location: list-songs.php?$field=$fieldValue");