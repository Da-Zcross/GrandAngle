<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/reset.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel=" stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title><?= $titre ?></title>
</head>
<body>
    <main>
    <header>
    <div id="title_header_left">
        <ul>
            <?php if (isset($_SESSION["user"])) : ?>
                <li>
                    <h1><a href="exposition.php">Grand Angle</a></h1>
                </li>
            <?php else : ?>
                <li>
                    <h1><a href="connexion.php">Grand Angle</a></h1>
                </li>
            <?php endif; ?>
        </ul>
    </div>

    <div id="btn_header_right">
        <ul>

            <?php if (!isset($_SESSION["user"])) : ?>

                <li class="nav_link <?php if ($nav === "connexion") : ?>active<?php endif; ?>">
                    <a href="connexion.php">connexion</a>
                </li>

            <?php else : ?>
                <li class="define"><a href="">Rôle : <?= $_SESSION["user"]["id_role"] ?></a> </li>
                    <li class="define"><a href="collaborateurs.php">Compte :
                            <?= $_SESSION["user"]["nom_collab"] . ", " . $_SESSION["user"]["prenom_collab"] ?>
                        </a>
                    </li>
                <li class="deco">
                    <a href="deconnexion.php">Déconnexion</a>
                </li>

            <?php endif; ?>
        </ul>
    </div>
</header>
