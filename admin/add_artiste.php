<?php
session_start();
include "functions/filtrages.php";

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