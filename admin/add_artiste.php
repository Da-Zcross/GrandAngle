<?php
session_start();
require_once "../config/pdo.php";
include "functions/filtrages.php";


$sql = "SELECT *
    FROM artiste";
$requete = $db->query($sql);
$artistes = $requete->fetchAll(PDO::FETCH_ASSOC);
$titre = "Artistes";
$nav = "artistes";
include "includes/pages/header.php";
?>

<section id="super_grid_container">
    <div id="grid_container_dash">
        <div class="left">
            <?php include "./includes/components/sidebar_left.php"; ?>
        </div>
        <div class="middle">
            <?php include "./includes/components/form_artistes.php"; ?>
        </div>

    </div>
</section>