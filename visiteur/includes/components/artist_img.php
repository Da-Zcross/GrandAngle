<?php
require_once "../config/pdo.php";
$lang = isset($_GET['lang']) ? $_GET['lang'] : substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);

$langList = ["FR", "EN", "DE", "RU", "CH"];

if (!in_array($lang, $langList)) {
    $lang = "FR"; 
}

$id_artiste = $_GET['id'];


$sql = "SELECT a.nom_artiste, a.prenom_artiste, a.photo_profil
        FROM artiste a
        INNER JOIN présenter p ON a.id_artiste = p.id_artiste
        WHERE p.id_oeuvres = :id_oeuvres";


$requete = $db->prepare($sql);


$requete->execute(['id_oeuvres' => $id_oeuvres]);


$artistes = $requete->fetchAll(PDO::FETCH_ASSOC);
?>

<div id="container-project">
    <h2><?php echo created ?></h2>
    <section class="grid-card">
        <?php foreach ($artistes as $artiste) : ?>
            <div class="columna">
                <h2><?= $artiste["nom_artiste"] ?> <?= $artiste["prenom_artiste"] ?></h2>
                <div class="img-card">
                    <?php
                    $imgUrl = !empty($artiste['photo_profil']) && file_exists($artiste['photo_profil']) ? $artiste['photo_profil'] : "./assets/images/img_cards/placeimage.jpg";
                    ?>
                    <img src="<?= $imgUrl ?>" alt="projet image">
                </div>
            </div>
        <?php endforeach; ?>
    </section>
</div>