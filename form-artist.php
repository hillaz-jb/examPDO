<?php
include 'ep-navbar.php';
include 'vendor/autoload.php';
include 'EcAbstractConnectToDb.php';
include 'EcArtist.php';

//CONNECTION
$artistTable = new EcArtist();
$artistTable->connection('exam_pdo');

//FILL FIELD IF artist TO MODIFY
$artistToModify = [];
if (isset($_GET['id'])) {
    $artistToModify = $artistTable->selectOneArtist($_GET['id']);
}
$type = null;
$launchAt = null;
$description = null;

if (isset($_POST['name']) && $_POST['name'] !== '') {

    if (isset($_POST['type'])) {
        $type = $_POST['type'];
    }
    if (isset($_POST['launch_at'])) {
        $launchAt = $_POST['launch_at'];
    }
    if (isset($_POST['description'])) {
        $description = $_POST['description'];
    }
    $artistTable->insert($_POST['name'], $type, $launchAt, $description);
    header('location artist-list.php');
}

?>

<main class="container">
    <h1 class="text-center"><i class="fas fa-film me-2 my-5"></i>Liste de films</h1>
    <section>
        <div>
            <form action="<?php if (isset($_GET['id'])) {
                $id = $_GET['id'];
                echo "update.php?id=$id";
            } else {
                echo "form-artist.php";
            }
            ?>" method="post">
                <div class="d-flex flex-row align-items-center mb-4">

                    <div class="me-4"><label for="name">Titre : </label></div>
                    <div class="me-4"><input class="form-control me-2" type="text" name="name" id="name" value="<?php
                        if (isset($_GET['id'])) {
                            echo $artistToModify['name'];
                        } else {
                            echo '';
                        }
                        ?>"></div>
                    <div class="me-4"><label for="type">Genre : </label></div>
                    <div class="me-4"><input class="form-control me-2" type="text" name="type" id="type" value="<?php
                        if (isset($_GET['id'])) {
                            echo $artistToModify['type'];
                        } else {
                            echo '';
                        }
                        ?>"></div>
                    <div class="me-4"><label for="launch_at">Date de sortie : </label></div>
                    <div class="me-4"><input class="form-control me-2" type="date" name="launch_at" id="launch_at" value="<?php
                        if (isset($_GET['id'])) {
                            echo $artistToModify['launch_at'];
                        } else {
                            echo '';
                        }
                        ?>"></div>
                </div>
                <div>
                    <div class="d-flex flex-row align-items-center justify-content-center mb-4">
                        <label class="me-4" for="description">Résumé : </label>
                        <textarea name="description" id="description" cols="30" rows="8"><?php
                            if (isset($_GET['id'])) {
                                echo $artistToModify['description'];
                            } else {
                                echo '';
                            }
                            ?></textarea>
                    </div>
                    <p class="text-center">
                        <?php if (isset($_GET['id'])) {
                            ?>
                            <button class="btn btn-outline-dark" type="submit">Modifier</button>
                            <?php
                        } else {
                            ?>
                            <button class="btn btn-outline-dark" type="submit">Ajouter</button>
                            <?php
                        }
                        ?>
                    </p>
                </div>
            </form>
        </div>
    </section>
</main>

