<?php
session_start();

require "../config/pdo.php";

$titre= "Oeuvres";
$nav= "Oeuvres";

include "includes/pages/header.php";
include "includes/components/oeuvres_par_exposition.php";

include "includes/pages/footer.php";
?>