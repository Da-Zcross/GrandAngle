<?php
// Assurez-vous que le paramètre artistId est présent et non vide
if (isset($_GET['artistId']) && !empty($_GET['artistId'])) {
    // Incluez votre fichier de configuration PDO pour vous connecter à la base de données
    require_once "../config/pdo.php";

    // Convertissez l'ID de l'artiste en entier pour des raisons de sécurité
    $artistId = intval($_GET['artistId']);

    // Requête SQL pour récupérer les œuvres associées à l'artiste
    $artworks_query = "SELECT oeuvres_expo.id_oeuvres, oeuvres_expo.nom_oeuvre 
                       FROM oeuvres_expo 
                       INNER JOIN présenter ON oeuvres_expo.id_oeuvres = présenter.id_oeuvres 
                       WHERE présenter.id_artiste = :artistId";
    $artworks_stmt = $db->prepare($artworks_query);
    $artworks_stmt->bindParam(":artistId", $artistId, PDO::PARAM_INT);
    $artworks_stmt->execute();
    $artworks_result = $artworks_stmt->fetchAll(PDO::FETCH_ASSOC);

    // Si des œuvres sont trouvées, renvoyez les données au format JSON
    if ($artworks_result) {
        header('Content-Type: application/json');
        echo json_encode($artworks_result);
    } else {
        // Aucune œuvre associée à l'artiste trouvé
        echo json_encode(['error' => 'Aucune œuvre trouvée pour cet artiste.']);
    }
} else {
    // Paramètre artistId manquant ou vide
    echo json_encode(['error' => 'Paramètre artistId manquant ou vide.']);
}
?>