<?php
session_start();

$host = 'localhost';
$dbname = 'grandangle';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données: " . $e->getMessage());
}

$id_theme = isset($_GET['id_theme']) ? $_GET['id_theme'] : null;

if (!$id_theme || !is_numeric($id_theme)) {
    die("ID de thème invalide.");
}

$sql = "SELECT oeuvres_expo.*, theme.libelle_theme
        FROM oeuvres_expo
        INNER JOIN theme ON oeuvres_expo.id_theme = theme.id_theme
        WHERE theme.id_theme = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id_theme]);

$oeuvres = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($oeuvres as $oeuvre) {
    echo "<div>";
    echo "<h2>" . $oeuvre['nom_oeuvre'] . "</h2>";
    echo "<img src='" . $oeuvre['chemin_image'] . "' alt='" . $oeuvre['nom_oeuvre'] . "'>";
    echo "<p>" . $oeuvre['description_oeuvre'] . "</p>";
    echo "<p><strong>Thème:</strong> " . $oeuvre['libelle_theme'] . "</p>";
    echo "</div>";
}

?>
