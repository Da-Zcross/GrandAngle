<?php
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user'])) {
    header('Location: connexion.php');
    exit();
}

require_once "../config/pdo.php";

// Vérifier si la méthode HTTP est POST et si l'ID du collaborateur est envoyé
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id_collab"])) {
    $collabId = $_POST['id_collab'];

    // Vérifier les autorisations de l'utilisateur pour supprimer un collaborateur
    $allowedRoles = ['ADMIN', 'CREATOR']; // Les rôles autorisés à supprimer des collaborateurs
    if (!in_array($_SESSION['user']['id_role'], $allowedRoles) && $_SESSION['user']['id_collab'] != $collabId) {
        echo "Vous n'avez pas les autorisations pour supprimer ce collaborateur.";
        exit;
    }

    // Préparer la requête de suppression en utilisant des paramètres sécurisés
    $sql = "DELETE FROM collaborateur WHERE id_collab = :collabId";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':collabId', $collabId, PDO::PARAM_INT);

    try {
        $stmt->execute();
        echo "Le collaborateur a été supprimé avec succès.";
        exit;
    } catch (PDOException $e) {
        echo "Erreur lors de la suppression du collaborateur : " . $e->getMessage();
        exit;
    }
} else {
    echo "Erreur : ID du collaborateur non fourni ou méthode non autorisée.";
    exit;
}
?>
