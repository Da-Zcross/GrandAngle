<?php
session_start();
require_once "../config/pdo.php";

include "functions/filtrages.php";

$titre = "Modifier Artiste";
$nav = "artiste";

// Vérifier si l'ID de l'artiste est défini dans l'URL
if (isset($_GET['id_artiste'])) {
    // Récupérer et stocker l'ID de l'artiste depuis l'URL
    $id_artiste = $_GET['id_artiste'];
} else {
    // Si l'ID de l'artiste n'est pas défini dans l'URL, afficher un message d'erreur
    echo "ID artiste non fourni dans l'URL.";
    exit; // Arrêter l'exécution du script
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