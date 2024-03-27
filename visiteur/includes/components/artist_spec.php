<?php
$lang = isset($_GET['lang']) ? $_GET['lang'] : substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);


$langList = ["FR", "EN", "DE", "RU", "CH"];


if (!in_array($lang, $langList)) {
    $lang = "FR"; 
}
?>
<button class="artistReturn">
<a href="artistes.php?&lang=<?php echo $lang ?>"><i class="fa-solid fa-chevron-left"></i> <?php echo retour ?></a>
</button>
<?php
$lang = isset($_GET['lang']) ? $_GET['lang'] : substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);

require_once "../config/pdo.php";


if(isset($_GET['id'])) {
    $id_artiste = $_GET['id'];

    
    $sql = "SELECT * FROM artiste WHERE id_artiste = ?";
    $requete = $db->prepare($sql);
    $requete->execute([$id_artiste]);
    $artiste = $requete->fetch(PDO::FETCH_ASSOC);

    
    if($artiste) {
        echo "<h2 class='Dimensions infoArtist '>".$artiste['nom_artiste']." ".$artiste['prenom_artiste']."</h2>";
        echo "<p class='Dimensions biographie '>".$artiste['biographie_'.$lang]."</p>";
        echo "<img id='profilPhoto' src='".$artiste['photo_profil']."' alt='Photo de ".$artiste['nom_artiste']."'>";
    } else {
        echo "Artiste non trouvé.";
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
