<?php
session_start();
if ($_SESSION['user']['id_role'] !== 'CREATOR') {
    die("Accès non autorisé. Seul le Directeur peut ajouter un ou des collaborateurs.");
}
include "functions/filtrages.php";
require_once "../config/pdo.php";
$titre = "Ajouter Collaborateurs";
$nav = "ajouter collaborateurs";
include "includes/pages/header.php";


?>

<section id="super_grid_container">
    <div id="grid_container_dash">
        <div class="left">
            <?php include "./includes/components/sidebar_left.php"; ?>
        </div>
        <div class="middle">
            <?php include "./includes/components/form_add_collaborateurs.php"; ?>
        </div>

    </div>
</section>