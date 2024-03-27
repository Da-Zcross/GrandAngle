<?php
session_start();

require "../config/pdo.php";

$titre= "Accueil Galerie Grand Angle";
$nav= "index";
include "./includes/pages/header.php";
include "./includes/components/presentation.php";
include "./includes/components/carousel.php";
include "./includes/components/carte.php";
include "./includes/pages/footer.php";
?>