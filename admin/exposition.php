<?php
session_start();
require_once "../config/pdo.php";
$sql = "SELECT *
    FROM exposition";
    
$requete = $db->query($sql);
$expos = $requete->fetchAll(PDO::FETCH_ASSOC);

$titre = "Exposition";
$nav = "exposition";
include "includes/pages/header.php";
include "includes/pages/main.php";
?>

<div>
    <?php include "includes/pages/main.php";
    ?>

</div>