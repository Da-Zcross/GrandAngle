<?php
session_start();
require_once "../config/pdo.php";


try {
    $db = new PDO("mysql:host=" . DBHOST . ";dbname=" . DBNAME, DBUSER, DBPASS);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}

$error_message = '';
$confirmation_message = '';
require_once './includes/pages/header.php';
require_once './includes/pages/navbar.php';
require_once 'recup.php';
?>  

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
        <div><button><a href="add_oeuvres.php">Ajouter Oeuvre</a></button></div>

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
