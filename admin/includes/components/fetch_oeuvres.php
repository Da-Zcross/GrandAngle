<?php
$host = 'localhost';
$dbname = 'grand';
$username = 'root';
$password = '';

function getOeuvresByDate($pdo, $date) {
    try {
        $sql = "SELECT * FROM oeuvres_expo WHERE date_livraison_prevu = :date OR date_livraison_reel = :date";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['date' => $date]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        return [];
    }
}

if (isset($_GET['date'])) {
    $date = $_GET['date'];

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $oeuvres = getOeuvresByDate($pdo, $date);
        echo json_encode($oeuvres);
    } catch (PDOException $e) {
        echo "Erreur de connexion à la base de données: " . $e->getMessage();
    }
} else {
    echo "Erreur: Date manquante.";
}
?>
