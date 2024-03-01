<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets_admin/css/reset.css">
    <link rel="stylesheet" href="./assets_admin/css/style.css">
    <title><?= $titre ?></title>
</head>

<body>
    <main>
        <header>
            <div id="title_header_left">
                <ul>
                    <?php if (isset($_SESSION["user"])) : ?>
                        <li>
                            <h1><a href="dashboard.php">Grand Angle</a></h1>
                        </li>
                    <?php else : ?>
                        <li>
                            <h1><a href="admin.php">Grand Angle</a></h1>
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
                        <li class="define"><a href="home.php">Compte :
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