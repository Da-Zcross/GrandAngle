<?php
require "../config/pdo.php";

if (isset($_POST['id_artiste'])) {
    $artisteId =  $_POST['id_artiste'];
    $sql = "DELETE FROM artiste WHERE id_artiste = $artisteId";
    $stmt = $db->prepare($sql);
    $stmt->execute();
}
?>