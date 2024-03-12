<?php 
session_start();
print_r($_SESSION);

$titre = "Collaborateurs";
$nav= "index";
include "includes/pages/header.php";
include "includes/components/sidebar_left.php";
?>