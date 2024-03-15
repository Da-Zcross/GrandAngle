<?php 
session_start();


$titre = "Collaborateurs";
$nav= "index";
include "includes/pages/header.php";
include "includes/pages/main.php";

include "includes/pages/sidebar_left.php";
?>

require_once "../config/pdo.php";
$titre = "Collaborateurs";
$nav= "collaborateurs";
include "includes/pages/header.php";
include "includes/components/sidebar_left.php";
?>

<section id="super_grid_container">
    <div id="grid_container_dash">
        <div class="left">
            <?php include "./includes/components/sidebar_left.php"; ?>
        </div>
        <div class="middle">
            <div class="bloc_btn_add_art"><button class="btn_add_artiste"><a href="add_artiste.php">Ajouter Artiste</a></button></div>
            <div class="bloc_list">
                <table id="data" class="list">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>nom_artiste</th>
                            <th>prenom_artiste</th>
                            <th>email_artiste</th>
                            <th>date_naissance_artiste</th>
                            <th>date_deces_artiste</th>
                            <th>modifier</th>
                            <th>supprimer</th>
                        </tr>

                    </thead>
                    <tbody>

                        <?php foreach ($artistes as $artiste) : ?>
                            <tr>
                                <td><?= $artiste["id_artiste"] ?></td>
                                <td><?= $artiste["nom_artiste"] ?></td>
                                <td><?= $artiste["prenom_artiste"] ?></td>
                                <td><?= $artiste["email_artiste"] ?></td>
                                <td><?= $artiste["date_naissance_artiste"] ?></td>
                                <td><?= $artiste["date_deces_artiste"] ?></td>
                                <td><a href="updating_artiste.php?id_artiste=<?= $artiste['id_artiste'] ?>"><i class="fa-solid fa-pen"></i></a></td>
                                <td><a href="#"><i class="fa-solid fa-trash-can"></i></a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

