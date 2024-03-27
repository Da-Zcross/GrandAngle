<?php
$lang = isset($_GET['lang']) ? $_GET['lang'] : substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);

$langList = ["FR", "EN", "DE", "RU", "CH"];
$langIds = ["FR" => 1, "EN" => 2, "DE" => 3, "RU" => 4, "CH" => 5];

if (!in_array($lang, $langList)) {
    $lang = "FR"; 
}
?>
<button class="artistReturn">
<a href="expo.php?&lang=<?php echo $lang ?>"><i class="fa-solid fa-chevron-left"></i> <?php echo retour ?></a>
</button>
<?php
require_once "../config/pdo.php";
$id_expo = isset($_GET['id_expo']) ? $_GET['id_expo'] : null;

if (!$id_expo || !is_numeric($id_expo)) {
    die("ID d'exposition invalide.");
}

try {
    $sql = "SELECT oeuvres_expo.*, exposition.nom_expo
            FROM oeuvres_expo
            INNER JOIN contenir ON oeuvres_expo.id_oeuvres = contenir.id_oeuvres
            INNER JOIN exposition ON contenir.id_expo = exposition.id_expo
            WHERE contenir.id_expo = ?";
    $stmt = $db->prepare($sql);
    $stmt->execute([$id_expo]);

    $oeuvres = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($oeuvres) === 0) {
        echo "Aucune œuvre trouvée pour cette exposition.";
    } else {
        foreach ($oeuvres as $oeuvre) {
            echo "<div class='expoPlus'>";
            echo "<h2>" . $oeuvre['nom_expo'] . "</h2>";
            echo "<h3>" . $oeuvre['nom_oeuvre'] . "</h3>";
            echo "<img src='" . $oeuvre['chemin_image'] . "' alt='" . $oeuvre['nom_oeuvre'] . "'>";         
            echo "</div>";
        }
    }
} catch (PDOException $e) {
    echo "Erreur de requête : " . $e->getMessage();
}
?>
