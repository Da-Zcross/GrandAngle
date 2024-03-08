<?php
session_start();
require_once "../config/pdo.php";
$sql = "SELECT *
    FROM oeuvres_expo";
$requete = $db->query($sql);
$oeuvres = $requete->fetchAll(PDO::FETCH_ASSOC);
$titre = "Oeuvres";
$nav = "oeuvre";
include "includes/pages/header.php";
?>


<section id="super_grid_container">
    <div id="grid_container_dash">
        <div class="left">
            <?php include "./includes/components/sidebar_left.php"; ?>
        </div>
        <div class="middle">
        <div><button><a href="./includes/components/ajouter_oeuvres.php">Ajouter Oeuvre</a></button></div>

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
                            <th>nom_oeuvre</th>
                            <th>date realisation</th>
                            <th>largeur</th>
                            <th>hauteur</th>
                            <th>poids</th>
                            <th>type_oeuvre</th>
                            <th>date_livraison_prevu</th>
                            <th>modifier</th>
                            <th>supprimer</th>
                        </tr>

                    </thead>
                    <tbody>

                        <?php foreach ($oeuvres as $oeuvre) : ?>
                            <tr>
                                <td> <span class="custom-checkbox">
                                        <input type="checkbox" id="checkbox1" name="options[]" value="1">
                                        <label for="checkbox1"></label>
                                    </span></td>
                                <td><?= $oeuvre["id_oeuvres"] ?></td>
                                <td><?= $oeuvre["nom_oeuvre"] ?></td>
                                <td><?= $oeuvre["date_realisation"] ?></td>
                                <td><?= $oeuvre["largeur"] ?></td>
                                <td><?= $oeuvre["hauteur"] ?></td>
                                <td><?= $oeuvre["poids"] ?></td>
                                <td><?= $oeuvre["id_type_oeuvre"] ?></td>
                                <td><?= $oeuvre["date_livraison_prevu"] ?></td>
                                <td><a href="./includes/components/modifier_oeuvres.php"><i class="fa-solid fa-pen"></i></a></td>
                                <td><a href="#"><i class="fa-solid fa-trash-can"></i></a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>