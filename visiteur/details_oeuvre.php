<?php
session_start();

require "../config/pdo.php";

$titre= "Artiste";
$nav= "artistes";

include "includes/pages/header.php";
include "includes/components/work_spec.php";
include "includes/components/artist_img.php";
include "includes/pages/footer.php";
?>