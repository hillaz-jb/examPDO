<?php
include 'ep-navbar.php';
include 'vendor/autoload.php';
include 'EcAbstractConnectToDb.php';
include 'EcArtist.php';
include 'EcSong.php';


$selectedArtist = '';
if (isset($_GET['id'])) {
    $artist = new EcArtist();
    $artist->connection();
    $selectedArtist = $artist->selectOneArtist($_GET['id']);

    $songsTable = new EcSong();
    $songsTable->connection();
    $songsArtist = $songsTable->selectArtistSongs($_GET['id']);
}
?>
<main class="container">

    <section>
        <h1 class="text-center mt-5 mb-3"><i class="fas fa-music me-4"></i>Chansons
            de <?php echo $selectedArtist['name'] ?></h1>
        <?php
        if (isset($_GET['delete'])) {
            echo '<div class="text-success mb-3">Vous avez supprimez une chanson.</div>';
        }
        if ($songsArtist === []) {
            echo '<div class="mb-3">Cet artiste n\'a pas encore de chanson.</div>';
        } else {
            ?>

            <div class="row">
                <div class="col-8 offset-2">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">Titre</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($songsArtist as $song) {
                            ?>
                            <tr>
                                <td><?php echo $song['title'] ?></td>
                                <td>
                                    <button class="btn btn-outline-danger" data-bs-toggle="modal"
                                            data-bs-target="#<?php echo 'modal' . $song['id'] ?>">Supprimer
                                    </button>
                                    <div class="modal fade" id="<?php echo 'modal' . $song['id'] ?>" tabindex="-1"
                                         aria-labelledby="modalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalLabel">Supprimer la chanson
                                                        "<?php echo $song['title'] ?>" ?</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                </div>
                                                <div class="modal-footer">
                                                    <a href="delete.php?id-song=<?php echo $song['id'] ?>&id-artist=<?php echo $selectedArtist['id'] ?>"
                                                       class="btn btn-danger">Supprimer</a>
                                                    <button type="button" class="btn btn-primary"
                                                            data-bs-dismiss="modal" aria-label="Close">Retour
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <?php
        }
        ?>
    </section>
</main>

<?php include 'ep-footer.php'; ?>
