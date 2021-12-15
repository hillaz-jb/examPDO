<?php
include 'ep-navbar.php';
include 'vendor/autoload.php';
include 'EcAbstractConnectToDb.php';
include 'EcArtist.php';

$artistTable = new EcArtist();
$artistTable->connection('exam_pdo');

$allArtists = $artistTable->selectAllSortByName();




?>
    <main class="container">

        <section>
            <h1 class="text-center"><i class="fas fa-film me-2 my-5"></i>Liste d'artistes</h1>

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
                        <td><a href="form-artist.php?id=<?php echo $artist['id']?>" class="btn btn-primary">Modifier</a></td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>


        </section>
    </main>

<?php include 'ep-footer.php'; ?>