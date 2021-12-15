<?php
include 'ep-navbar.php';
include 'vendor/autoload.php';
include 'EcAbstractConnectToDb.php';
include 'EcArtist.php';

//CONNECTION
$artistTable = new EcArtist();
$artistTable->connection();

//FILL FIELD IF artist TO MODIFY
$artistToModify = [];
if (isset($_GET['id'])) {
    $artistToModify = $artistTable->selectOneArtist($_GET['id']);
}


if (isset($_POST['name']) && $_POST['name'] !== '' && isset($_POST['age']) && $_POST['age'] !== '') {
    $artistTable->insertArtist($_POST['name'], $_POST['age']);
    //header('location list-artists.php?add=success');
}

?>

<main class="container">
    <section>
        <?php
        if (isset($_GET['id'])) {
            ?>
            <h1 class="text-center mt-5 mb-4"><i class="fab fa-napster me-3 mb-4"></i>Modifier l'artiste</h1>
            <?php
        } else {
            ?>
            <h1 class="text-center mt-5 mb-4"><i class="fab fa-napster me-3 mb-4"></i>Ajouter un artiste</h1>
            <?php
        }
        if (isset($_GET['add'])) {
            echo '<div class="text-center text-success fw-3 mb-3">L\'artiste a bien été ajouté.</div>';
        }
        ?>
        <div class="d-flex justify-content-center">
            <div class="text-danger mb-3">
                <?php
                if (isset($_POST['name']) && $_POST['name'] === '') {
                    echo "Veuillez saisir un nom";
                } else if (isset($_POST['age']) && $_POST['age'] === '') {
                    echo "Veuillez saisir un age";
                }
                ?>
            </div>

            <form action="<?php
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                echo "update-artist.php?id=$id";
            } else {
                echo "form-artist.php?add=success";
            }
            ?>" method="post">
                <div class="d-flex flex-row align-items-center mb-4">

                    <div class="me-4"><label for="name">Nom : </label></div>
                    <div class="me-4"><input class="form-control me-2" type="text" name="name" id="name" value="<?php
                        if (isset($_GET['id'])) {
                            echo $artistToModify['name'];
                        } else {
                            echo '';
                        }
                        ?>" required>
                    </div>
                    <div class="me-4"><label for="type">Age : </label></div>
                    <div class="me-4"><input class="form-control me-2" type="number" name="age" id="type" value="<?php
                        if (isset($_GET['id'])) {
                            echo $artistToModify['age'];
                        } else {
                            echo '';
                        }
                        ?>" required>
                    </div>
                    <div class="text-center">
                        <?php
                        if (isset($_GET['id'])) {
                            ?>
                            <button class="btn btn-outline-dark" type="submit">Modifier</button>
                            <?php
                        } else {
                            ?>
                            <button class="btn btn-outline-dark" type="submit">Ajouter</button>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </form>

        </div>
        <div class="text-center mb-5">
            <a class="btn btn-outline-success me-5" aria-current="page" href="list-artists.php">Retour à la liste</a>
        </div>
    </section>
</main>

