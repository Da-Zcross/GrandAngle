<?php
require "../config/pdo.php";

if (isset($_POST['id_artiste'])) {
    $artisteId =  $_POST['id_artiste'];
    
    // Récupérer le chemin de l'image à supprimer depuis la base de données
    $sql = "SELECT photo_profil FROM artiste WHERE id_artiste = $artisteId";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    // Supprimer l'entrée de la base de données
    $sql_delete = "DELETE FROM artiste WHERE id_artiste = $artisteId";
    $stmt_delete = $db->prepare($sql_delete);
    $stmt_delete->execute();

    // Supprimer l'image du dossier
    if ($result && isset($result['photo_profil'])) {
        $imagePath = $result['photo_profil'];
        if (file_exists($imagePath)) {
            unlink($imagePath); // Supprimer le fichier image du dossier
        }
    }
}
?>