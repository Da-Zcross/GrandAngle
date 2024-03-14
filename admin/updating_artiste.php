<?php
session_start();
require_once "../config/pdo.php";

include "functions/filtrages.php";

$titre = "Modifier Artiste";
$nav = "artiste";

if (!isset($_GET["id_artiste"]) || empty($_GET["id_artiste"])) {
    header("Location: artistes.php");
    exit;
}

include "includes/pages/header.php";
?>

<section id="super_grid_container">
    <div id="grid_container_dash">
        <div class="left">
            <?php include "./includes/components/sidebar_left.php"; ?>
        </div>
        <div class="middle">
            <?php include "./includes/components/form_update_artistes.php"; ?>
        </div>

    </div>
</section>