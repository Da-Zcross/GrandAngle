<?php
session_start();
require_once "../config/pdo.php";

include "functions/filtrages.php";

$titre = "Modifier Artiste";
$nav = "artiste";

if (isset($_GET['id_artiste'])) {
    $id_artiste = $_GET['id_artiste'];
} else {
    echo "ID artiste non fourni dans l'URL.";
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