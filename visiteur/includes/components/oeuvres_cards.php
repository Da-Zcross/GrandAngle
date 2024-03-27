<?php
require_once "../config/pdo.php";
$lang = isset($_GET['lang']) ? $_GET['lang'] : substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);

$langList = ["FR", "EN", "DE", "RU", "CH"];

if (!in_array($lang, $langList)) {
    $lang = "FR"; 
}


$sqlTypes = "SELECT * FROM type_oeuvre";
$requeteTypes = $db->query($sqlTypes);
$types = $requeteTypes->fetchAll(PDO::FETCH_ASSOC);

// on vérifie si un type d'œuvre est sélectionné dans l'URL
if (isset($_GET['type_oeuvre'])) {
    $selected_type_id = $_GET['type_oeuvre'];
} else {
    // Si aucun type d'œuvre n'est sélectionné, on sélectionne le premier type par défaut
    $selected_type_id = $types[0]['id_type_oeuvre'];
}


$sql = "SELECT oeuvres_expo.id_oeuvres, 
        oeuvres_expo.nom_oeuvre, 
        oeuvres_expo.chemin_image, 
        oeuvres_expo.description_oeuvre, 
        oeuvres_expo.date_realisation, 
        oeuvres_expo.largeur, 
        oeuvres_expo.hauteur, 
        oeuvres_expo.poids, 
        oeuvres_expo.id_type_oeuvre, 
        type_oeuvre.libelle_type_oeuvre
        FROM oeuvres_expo 
        JOIN type_oeuvre ON oeuvres_expo.id_type_oeuvre = type_oeuvre.id_type_oeuvre
        WHERE oeuvres_expo.id_type_oeuvre = ?";
$requete = $db->prepare($sql);
$requete->execute([$selected_type_id]);
$oeuvres = $requete->fetchAll(PDO::FETCH_ASSOC);
$selected_type_label = '';
foreach ($types as $type) {
    if ($type['id_type_oeuvre'] == $selected_type_id) {
        $selected_type_label = $type['libelle_type_oeuvre'];
        break;
    }
}
?>

<div id="container-project">
    <form action="" method="get" id="select_type">
        <label for="type_oeuvre"><?php echo choseType?></label>
        <select name="type_oeuvre" id="type_oeuvre" onchange="selectType()">
            <?php foreach ($types as $type) : ?>
                <option value="<?= $type['id_type_oeuvre'] ?>" <?= ($type['id_type_oeuvre'] == $selected_type_id) ? 'selected' : '' ?>>
                    <?= $type['libelle_type_oeuvre'] ?>
                </option>
            <?php endforeach; ?>
        </select>
        
    </form>

    <h2><?= $selected_type_label ?></h2>
    <section class="grid-card">
        <?php foreach ($oeuvres as $oeuvre) : ?>
            <div class="columna">
                <h2><?= $oeuvre["nom_oeuvre"] ?></h2>
                <div class="img-card">
                    <?php
                    $picUrl = !empty($oeuvre['chemin_image']) && file_exists($oeuvre['chemin_image']) ? $oeuvre['chemin_image'] : "./assets/images/img_cards/placeimage.jpg";
                    ?>
                    <img src="<?= $picUrl ?>" alt="projet image">
                </div>
                <button>
                    <a href="details_oeuvre.php?id=<?= $oeuvre['id_oeuvres'] ?>&lang=<?= $lang ?>" id="<?= $oeuvre["id_oeuvres"] ?>"><?php echo seeMore ?></a>
                </button>
            </div>
        <?php endforeach; ?>
    </section>
</div>

<?php
$db = null;
?>