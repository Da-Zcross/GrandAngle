<?php
session_start();

require "../config/pdo.php";

$titre= "Artiste";
$nav= "artistes";

include "includes/pages/header.php";
include "includes/components/artist_spec.php";
include "includes/components/img_artist.php";
include "includes/pages/footer.php";
?>