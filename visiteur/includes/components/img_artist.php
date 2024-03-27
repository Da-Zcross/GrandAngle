<?php
require_once "../config/pdo.php";
$lang = isset($_GET['lang']) ? $_GET['lang'] : substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);

$langList = ["FR", "EN", "DE", "RU", "CH"];

if (!in_array($lang, $langList)) {
    $lang = "FR"; 
}

$id_artiste = $_GET['id'];


$sql = "SELECT oe.nom_oeuvre, oe.chemin_image
        FROM oeuvres_expo oe
        INNER JOIN présenter p ON oe.id_oeuvres = p.id_oeuvres
        WHERE p.id_artiste = :id_artiste";


$requete = $db->prepare($sql);


$requete->execute(['id_artiste' => $id_artiste]);


$oeuvres = $requete->fetchAll(PDO::FETCH_ASSOC);
?>

<div id="container-project">
    <h2><?php echo Allwork ?></h2>
    <section class="grid-card">
        <?php foreach ($oeuvres as $oeuvre) : ?>
            <div class="columna">
                <h2><?= $oeuvre["nom_oeuvre"] ?></h2>
                <div class="img-card">
                    <?php
                    $imgUrl = !empty($oeuvre['chemin_image']) && file_exists($oeuvre['chemin_image']) ? $oeuvre['chemin_image'] : "../assets/images/img_cards/placeimage.jpg";
                    ?>
                    <img src="<?= $imgUrl ?>" alt="projet image">
                </div>
            </div>
        <?php endforeach; ?>
    </section>
</div>