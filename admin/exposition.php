<?php
session_start();
require_once "../config/pdo.php";
$sql = "SELECT *
    FROM exposition";
$requete = $db->query($sql);
$expos = $requete->fetchAll(PDO::FETCH_ASSOC);
$titre = "Exposition";
$nav = "exposition";
include "includes/pages/header.php";
?>


<section id="super_grid_container">
    <div id="grid_container_dash">
        <div class="left">
            <?php include "./includes/components/sidebar_left.php"; ?>
        </div>
        <div class="middle">
            <div><button><a href="add_exposition.php">Ajouter Exposition</a></button></div>
            <div class="bloc_list">
                <table class="list">
                    <thead>

                        <tr>
                            <th>
                                <span class="custom-checkbox">
                                    <input type="checkbox" id="checkbox1" name="options[]" value="1">
                                    <label for="checkbox1"></label>
                                </span>
                            </th>
                            <th>id</th>
                            <th>nom_expo</th>
                            <th>date_debut</th>
                            <th>date_fin</th>
                            <th>prenom_directeur_artistique</th>
                            <th>email_directeur_artistique</th>
                            <th>nombre_oeuvres</th>
                            <th>modifier</th>
                            <th>supprimer</th>
                        </tr>

                    </thead>
                    <tbody>

                        <?php foreach ($expos as $expo) : ?>
                            <tr>
                                <td> <span class="custom-checkbox">
                                        <input type="checkbox" id="checkbox1" name="options[]" value="1">
                                        <label for="checkbox1"></label>
                                    </span></td>
                                <td><?= $expo["id_expo"] ?></td>
                                <td><?= $expo["nom_expo"] ?></td>
                                <td><?= $expo["date_debut"] ?></td>
                                <td><?= $expo["date_fin"] ?></td>
                                <td><?= $expo["prenom_directeur_artistique"] ?></td>
                                <td><?= $expo["email_directeur_artistique"] ?></td>
                                <td><?= $expo["nombre_oeuvres"] ?></td>
                                <td><a href="./includes/components/modifier_expo.php"><i class="fa-solid fa-pen"></i></a></td>
                                <td><a href="#"><i class="fa-solid fa-trash-can"></i></a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>