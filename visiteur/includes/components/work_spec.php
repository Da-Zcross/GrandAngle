<?php
$lang = isset($_GET['lang']) ? $_GET['lang'] : substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);

$langList = ["FR", "EN", "DE", "RU", "CH"];
$langIds = ["FR" => 1, "EN" => 2, "DE" => 3, "RU" => 4, "CH" => 5];

if (!in_array($lang, $langList)) {
    $lang = "FR"; 
}
?>
<button class="artistReturn">
    <a href="oeuvres.php?&lang=<?php echo $lang ?>"><i class="fa-solid fa-chevron-left"></i> <?php echo retour ?></a>
</button>

<?php
require_once "../config/pdo.php";

if (isset($_GET['id'])) {
    $id_oeuvres = $_GET['id'];

    $sql = "SELECT * FROM oeuvres_expo WHERE id_oeuvres = ?";
    $requete = $db->prepare($sql);
    $requete->execute([$id_oeuvres]);
    $oeuvre = $requete->fetch(PDO::FETCH_ASSOC);

    if ($oeuvre) {
        echo "<h2 class='infoArtist'>".$oeuvre['nom_oeuvre']." </h2>";
        echo "<img id='profilPhoto' src='".$oeuvre['chemin_image']."' alt='Photo de ".$oeuvre['nom_oeuvre']."'>";
        echo "<p class='Dimensions'>".$oeuvre['largeur']. "x" .$oeuvre['hauteur']. "cm </p>";
        echo "<p class='Dimensions'>".$oeuvre['date_realisation']."</p>";

        // Récupérer l'identifiant de langue correspondant au code de langue
        $langId = $langIds[$lang];

        // Requête pour récupérer la description de l'œuvre dans la langue sélectionnée
        $sql_description = "SELECT contenu FROM traduction WHERE id_oeuvres = ? AND id_langues = ?";
        $requete_description = $db->prepare($sql_description);
        $requete_description->execute([$id_oeuvres, $langId]);
        $description = $requete_description->fetchColumn();

        if ($description) {
            echo "<p class='Dimensions'>".$description."</p>";
        } else {
            echo "<p class='Dimensions'>Description non disponible dans cette langue.</p>";
        }
    } else {
        echo "Oeuvre non trouvée.";
    }
} else {
    echo "Identifiant d'artiste non spécifié.";
}
?>

<div class="vocal">


<button id="lectureVocale">
    <p><i class="fa-solid fa-volume-high"></i> audio</p>
</button>

</div>