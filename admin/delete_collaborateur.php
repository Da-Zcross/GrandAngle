<?php
require "../config/pdo.php";

if (isset($_POST['id_collab'])) {
    $collabId =  $_POST['id_collab'];
    $sql = "DELETE FROM collaborateur WHERE id_collab = $collabId";
    $stmt = $db->prepare($sql);
    $stmt->execute();
}
?>