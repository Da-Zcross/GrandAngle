<?php

require_once "../config/pdo.php";
try {
    $sql = "SELECT exposition.*, oeuvres_expo.chemin_image, oeuvres_expo.nom_oeuvre
    FROM exposition
    INNER JOIN contenir ON exposition.id_expo = contenir.id_expo
    INNER JOIN oeuvres_expo ON contenir.id_oeuvres = oeuvres_expo.id_oeuvres
    ORDER BY exposition.id_expo;"; // Assurez-vous d'ordonner par ID d'exposition pour que les expositions soient regroupées ensemble
    $stmt = $db->prepare($sql);
    $stmt->execute();

    $expositions = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    $previousExpoId = null; // Variable pour stocker l'ID de l'exposition précédente
    
    if (count($expositions) === 0) {
        echo "Aucune exposition trouvée.";
    } else {
        foreach ($expositions as $exposition) {
            // Vérifier si c'est une nouvelle exposition
            if ($exposition['id_expo'] != $previousExpoId) {
                echo "<div class='expoAll'>";
                echo "<h2>" . $exposition['nom_expo'] . "</h2>";
                echo "<p>Date début: " . $exposition['date_debut'] . "</p>";
                echo "<p>Date fin: " . $exposition['date_fin'] . "</p>";
                echo "<a href='expo_suite.php?id_expo=" . $exposition['id_expo'] . "'>Voir les œuvres</a>";
                echo "<img src='" . $exposition['chemin_image'] . "' alt='" . $exposition['nom_oeuvre'] . "'>";
                echo "</div>";
            } else {
                echo "";
            }
            $previousExpoId = $exposition['id_expo']; // Mettre à jour l'ID de l'exposition précédente
        }
    }
} catch (PDOException $e) {
    echo "Erreur de requête : " . $e->getMessage();
}
?>