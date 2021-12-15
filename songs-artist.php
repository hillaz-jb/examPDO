<?php
include 'ep-navbar.php';
include 'vendor/autoload.php';
include 'EcAbstractConnectToDb.php';
include 'EcArtist.php';
include 'EcSong.php';



$selectedArtist= '';
if (isset($_GET['id'])){
    $artist = new EcArtist();
    $artist->connection('exam_pdo');
    $selectedArtist = $artist->selectOneArtist($_GET['id']);

    $songsTable = new EcSong();
    $songsTable->connection('exam_pdo');
    $songsArtist = $songsTable->selectArtistSongs($_GET['id']);
}




?>
<main class="container">

    <section>
        <h1 class="text-center mt-5 mb-3"><i class="fas fa-music me-4"></i>Chansons de <?php echo $selectedArtist['name'] ?></h1>

        <div class="d-flex flex-end gap-4">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Titre</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach($songsArtist as $song){
                    ?>
                    <tr>
                        <td><?php echo $song['title'] ?></td>
                        <td><p><button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#movie">Supprimer</button></p>
                            <div class="modal fade" id="movie" tabindex="-1" aria-labelledby="<?php echo $song['id']?>" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="<?php echo $song['id']?>">Supprimer la chanson <?php echo $song['title']?> ?</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-footer">
                                            <a href="delete.php?id=<?php echo $song['id']?>" class="btn btn-danger">Supprimer</a>
                                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal" aria-label="Close">Retour</button>
                                        </div>
                                    </div>
                                </div>
                            </div></td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>




        </div>
    </section>
</main>

<?php include 'ep-footer.php'; ?>
