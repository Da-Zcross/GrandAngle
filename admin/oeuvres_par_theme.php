<?php
$host = 'localhost';
$dbname = 'grand';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données: " . $e->getMessage());
}

$id_expo = isset($_GET['id_expo']) ? $_GET['id_expo'] : null;

if (!$id_expo || !is_numeric($id_expo)) {
    die("ID d'exposition invalide.");
}

try {
    $sql = "SELECT oeuvres_expo.*, theme.libelle_theme
            FROM oeuvres_expo
            INNER JOIN theme ON oeuvres_expo.id_theme = theme.id_theme
            WHERE oeuvres_expo.id_expo = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id_expo]);

    $oeuvres = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($oeuvres) === 0) {
        echo "Aucune œuvre trouvée pour cette exposition.";
    } else {
        foreach ($oeuvres as $oeuvre) {
            echo "<div>";
            echo "<h2>" . $oeuvre['nom_oeuvre'] . "</h2>";
            echo "<img src='" . $oeuvre['chemin_image'] . "' alt='" . $oeuvre['nom_oeuvre'] . "'>";
            echo "<p>" . $oeuvre['description_oeuvre'] . "</p>";
            echo "<p><strong>Thème:</strong> " . $oeuvre['libelle_theme'] . "</p>";
            echo "</div>";
        }
    }
} catch (PDOException $e) {
    echo "Erreur de requête : " . $e->getMessage();
}
?>
