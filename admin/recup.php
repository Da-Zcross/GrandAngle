<?php

require_once "../config/pdo.php";



try {
    $db = new PDO("mysql:host=" . DBHOST . ";dbname=" . DBNAME, DBUSER, DBPASS);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}

$error_message = '';
$confirmation_message = '';




try {
    $sql = "SELECT * FROM oeuvres_expo";
    $requete = $db->query($sql);
    $oeuvres = $requete->fetchAll(); 
} catch (PDOException $e) {
    echo "Erreur de requête : " . $e->getMessage();
    exit();
}
?>

<div class="container">

    <?php if (!empty($oeuvres)) : ?>

        <?php foreach ($oeuvres as $oeuvre) : ?>

            <div class="card">

                <h2><?= $oeuvre["nom_oeuvre"] ?></h2>
                
                <a href="details_oeuvres.php?id=<?= $oeuvre['id_oeuvres'] ?>">
                    <img src="<?= $oeuvre['chemin_image'] ?>" alt="<?= $oeuvre['nom_oeuvre'] ?>">
                </a>
               
            </div>
        <?php endforeach; ?>

        <?php else : ?>
            <p> Rien ne peut être affiché </p>
        <?php endif; ?>

</div>
