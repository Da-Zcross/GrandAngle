<?php
require "../config/pdo.php";

if (isset($_POST['id_expo'])) {
    $expoId =  $_POST['id_expo'];
    $sql = "DELETE FROM exposition WHERE id_expo = $expoId";
    $stmt = $db->prepare($sql);
    $stmt->execute();
}
?>