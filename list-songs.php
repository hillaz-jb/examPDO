<?php
include 'ep-navbar.php';
include 'vendor/autoload.php';
include 'EcAbstractConnectToDb.php';
include 'EcSong.php';
include 'EcArtist.php';
include 'EcTools.php';

$navSongs = 'active';

$songTable = new EcSong();
$songTable->connection();


$field = '';
$fieldValue = '';
$noMatch = false;

if (isset($_GET['title'])){
    $field = 'title';
    $fieldValue = $_GET['title'];
}

if($field !== ''){
    $allSongs = $songTable->selectFilteredSong($field,$fieldValue);
    if ($allSongs === []){
        $allSongs = $songTable->selectAllSortByName();
        $noMatch = true;
    }
}
else {
    $allSongs = $songTable->selectAllSortByName();
}
?>
    <main class="container">
        <section>
            <h1 class="text-center my-5"><i class="fas fa-music me-3"></i>Liste des chansons</h1>

            <div>
                <form action="sort-songs.php" method="post">
                    <div class="d-flex flex-row align-items-center mb-4">
                        <div class="me-4"><label for="title">Titre : </label></div>
                        <div class="me-4"><input class="form-control me-2" type="search" name="title" id="title"></div>
                        <div><button class="btn btn-outline-dark me-4" type="submit">Search</button></div>
                        <div><a class="btn btn-success" href="list-songs.php">Réinitialiser</a></div>
                    </div>
                </form>
            </div>


            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Titre</th>
                    <th scope="col">Durée</th>
                    <th scope="col">Date de sortie</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach($allSongs as $song){
                    ?>
                    <tr>
                        <td><?php echo $song['title'] ?></td>
                        <td><?php echo EcTools::durationFormat($song['time']) ?> </td>
                        <td><?php echo EcTools::dateFormat($song['published_at'],'d-m-Y') ?> </td>
<!--                        <td><a class="btn btn-dark" href="songs-artist.php?id=--><?php //echo $artist['id'] ?><!--"><i class="fas fa-long-arrow-alt-right"></i></a></td>-->
<!--                        <td><a href="form-artist.php?id=--><?php //echo $artist['id']?><!--" class="btn btn-primary">Modifier</a></td>-->
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>
        </section>
    </main>

<?php include 'ep-footer.php'; ?>