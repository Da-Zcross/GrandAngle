<?php
// Incluez votre fichier de configuration PDO pour vous connecter à la base de données
require_once "../config/pdo.php";

// Requête SQL pour récupérer les artistes
$artists_query = "SELECT id_artiste, CONCAT(nom_artiste, ' ', prenom_artiste) AS nom_complet FROM artiste";
$artists_stmt = $db->query($artists_query);
$artists_result = $artists_stmt->fetchAll(PDO::FETCH_ASSOC);

// Si des artistes sont trouvés, renvoyez les données au format JSON
if ($artists_result) {
    header('Content-Type: application/json');
    echo json_encode($artists_result);
} else {
    // Aucun artiste trouvé
    echo json_encode(['error' => 'Aucun artiste trouvé.']);
}
?>