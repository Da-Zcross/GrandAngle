<?php
require_once "../config/pdo.php";
$lang = isset($_GET['lang']) ? $_GET['lang'] : substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);


$langList = ["FR", "EN", "DE", "RU", "CH"];


if (!in_array($lang, $langList)) {
    $lang = "FR"; 
}
$sql = "SELECT id_artiste, nom_artiste, prenom_artiste, biographie_FR, biographie_EN, biographie_DE, biographie_RU, biographie_CH, photo_profil
        FROM artiste";
        
$requete = $db->query($sql);
$artistes = $requete->fetchAll(PDO::FETCH_ASSOC);
$db = null;


?>

<div id="container-project">
    <h2><?php echo AllArtist ?></h2>
    
    <section class="grid-card">

        <?php foreach ($artistes as $artiste) : ?>

            <?php 

    switch ($lang) {
        case "FR":
            $ArtistDesc = substr($artiste["biographie_FR"], 0, 3 * 25) . '...';
            break;
        case "EN":
            $ArtistDesc = substr($artiste["biographie_EN"], 0, 3 * 25) . '...';
            break;
        case "DE":
            $ArtistDesc = substr($artiste["biographie_DE"], 0, 3 * 25) . '...';
            break;
        case "RU":
            $ArtistDesc = substr($artiste["biographie_RU"], 0, 3 * 25) . '...';
            break;
        case "CH":
            $ArtistDesc = substr($artiste["biographie_CH"], 0, 3 * 25) . '...';
            break;
        default:
            
            $ArtistDesc = substr($artiste["biographie_FR"], 0, 3 * 25) . '...';
    }
?>
            <div class="columna">
                <h2><?= $artiste["nom_artiste"] ?> <?= $artiste["prenom_artiste"] ?></h2>
                <div class="img-card">

                    <?php
                    $imgUrl = !empty($artiste['photo_profil']) && file_exists($artiste['photo_profil']) ? $artiste['photo_profil'] : "./assets/images/img_cards/placeimage.jpg";
                    ?>
                    <img src="<?= $imgUrl ?>" alt="projet image">





                    <!-- <img src="<?= $artiste["photo_profil"] ?>" alt="?"> -->
                </div>
                <!-- <p><?= $artiste["biographie_FR"] ?></p> -->
                <!-- <p><?= nl2br(substr($artiste["biographie_FR"], 0, 3 * 20)); ?>...</p> -->
                <!-- nl2br est une fonction PHP qui transforme les sauts de ligne (\n ou \r\n) en balises HTML <br>. 
                Cela permet d'afficher correctement les sauts de ligne dans du texte affiché sur une page web. -->

                <p><?php echo $ArtistDesc ?></p>


              

                <button>
                <a href="details_artist.php?id=<?= $artiste['id_artiste'] ?>&lang=<?= $lang ?>" id="<?= $artiste["id_artiste"] ?>"><?php echo seeMore ?></a>
                </button>
            </div>

        <?php endforeach; ?>
    </section>
</div>