
<?php
session_start();

require "../config/pdo.php";

$titre= "Oeuvres";
$nav= "Oeuvres";

include "includes/pages/header.php";
include "includes/components/recup_exopo_par_oeuvres.php";

include "includes/pages/footer.php";
?>