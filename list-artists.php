<?php
include 'ep-navbar.php';
include 'vendor/autoload.php';
include 'EcAbstractConnectToDb.php';
include 'EcArtist.php';

$navArtists = true;

$artistTable = new EcArtist();
$artistTable->connection('exam_pdo');
$allArtists = $artistTable->selectAllSortByName();
?>
    <main class="container">
        <section>
            <h1 class="text-center my-5"><i class="fas fa-users me-3"></i>Liste d'artistes</h1>
            <div class="text-center mb-3"><a href="form-artist.php" class="btn btn-success">Ajouter un artiste</a></div>
            <?php
                if (isset($_GET['update'])) {
                    echo '<div class="text-center text-success fw-3 mb-3">l\'artiste a bien été modifié.</div>';
                }
            ?>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Nom</th>
                    <th scope="col">Age</th>
                    <th scope="col">Chanson(s)</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach($allArtists as $artist){
                    ?>
                    <tr>
                        <td><?php echo $artist['name'] ?></td>
                        <td><?php echo $artist['age'] ?> ans</td>
                        <td><a class="btn btn-dark" href="songs-artist.php?id=<?php echo $artist['id'] ?>"><i class="fas fa-long-arrow-alt-right"></i></a></td>
                        <td><a href="form-artist.php?id=<?php echo $artist['id']?>" class="btn btn-outline-dark">Modifier</a></td>
                        <td><button class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#<?php echo 'modal'.$artist['id']?>">Supprimer</button>
                            <div class="modal fade" id="<?php echo 'modal'.$artist['id']?>" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalLabel">Supprimer l'artiste "<?php echo $artist['name']?>" et toutes ses chansons ?</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-footer">
                                            <a href="delete.php?id-artist=<?php echo $artist['id']?>" class="btn btn-danger">Supprimer</a>
                                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal" aria-label="Close">Retour</button>
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
        </section>
    </main>

<?php include 'ep-footer.php'; ?>