<?php
require "../config/pdo.php";

if (isset($_POST['id_oeuvres'])) {
    $oeuvreId =  $_POST['id_oeuvres'];
    
    // Récupérer le chemin de l'image à supprimer depuis la base de données
    $sql = "SELECT chemin_image FROM oeuvres_expo WHERE id_oeuvres = $oeuvreId";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    // Supprimer l'entrée de la base de données
    $sql_delete = "DELETE FROM oeuvres_expo WHERE id_oeuvres = $oeuvreId";
    $stmt_delete = $db->prepare($sql_delete);
    $stmt_delete->execute();

    // Supprimer l'image du dossier
    if ($result && isset($result['chemin_image'])) {
        $imagePath = $result['chemin_image'];
        if (file_exists($imagePath)) {
            unlink($imagePath); // Supprimer le fichier image du dossier
        }
    }
}
?>