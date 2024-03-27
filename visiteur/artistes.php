<?php
session_start();

require "../config/pdo.php";

$titre= "Artistes";
$nav= "Artistes";

include "includes/pages/header.php";
include "includes/components/artistes_cards.php";
include "includes/pages/footer.php";
?>