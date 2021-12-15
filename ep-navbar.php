<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>PHP PDO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" media="screen" href="assets/css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">

</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand mx-5" href="#">Examen PDO</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="list-artists.php">Les artistes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Liste XXX</a>
                        </li>
                    </ul>
                    <span class="navbar-text me-5"><?php if (isset($_SESSION['user'])){
                            ?>
                            <div class="text-light d-flex flex-row">Bienvenue <?php echo $_SESSION['user']['firstName'] ?><a class="text-danger ms-5" aria-current="page" href="disconnect.php">Se déconnecter</a></div>
                            <?php
                        }
                        else{
                            ?>
                            <div class="text-light">Non Connecté</div>
                            <?php
                        }
                        ?></span>
                </div>
            </div>
        </nav>


<!--        <nav class="navbar navbar-expand-lg navbar-dark bg-dark py-4">-->
<!--            <div class="container-fluid">-->
<!--                <a class="navbar-brand ms-5" href="index.php">Examen PDO</a>-->
<!--                <div class="navbar-collapse">-->
<!--                    <ul class="navbar-nav">-->
<!--                        <li class="nav-item">-->
<!--                            <a class="nav-link" aria-current="page" href="">Liste XXX</a>-->
<!--                        </li>-->
<!--                        <li class="nav-item">-->
<!--                            <a class="nav-link" aria-current="page" href="">Ajouter YYY</a>-->
<!--                        </li>-->
<!--                    </ul>-->
<!--                </div>-->
<!--                <div class="me-5">-->
<!--                    --><?php //if (isset($_SESSION['user'])){
//                        ?>
<!--                        <div class="text-light d-flex flex-row">Bienvenue --><?php //echo $_SESSION['user']['firstName'] ?><!--<a class="text-danger ms-5" aria-current="page" href="disconnect.php">Se déconnecter</a></div>-->
<!--                        --><?php
//                    }
//                    else{
//                        ?>
<!--                        <div class="text-light">Non Connecté</div>-->
<!--                        --><?php
//                    }
//                    ?>
<!--                </div>-->
<!--            </div>-->
<!--        </nav>-->
    </header>

