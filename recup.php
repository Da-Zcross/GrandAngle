<?php
require_once './config/pdo.php';
require_once './includes/components/phpqrcode/qrlib.php';



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
