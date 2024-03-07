<?php
session_start();

define("DBHOST", "127.0.0.1");
define("DBUSER", "root");
define("DBPASS", "");
define("DBNAME", "grandangle");

try {
    $db = new PDO("mysql:host=" . DBHOST . ";dbname=" . DBNAME, DBUSER, DBPASS);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}

$error_message = '';
$confirmation_message = '';
$titre = "Accueil admin";
$nav = "dashboard";

try {
    $sql = "SELECT * FROM oeuvres_expo";
    $requete = $db->query($sql);
    $oeuvres = $requete->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $error_message = "Erreur de requête : " . $e->getMessage();
}

try {
    $sql = "SELECT * FROM type_oeuvre";
    $requete = $db->query($sql);
    $types_oeuvre = $requete->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $error_message = "Erreur de requête : " . $e->getMessage();
}

try {
    $sql = "SELECT * FROM theme";
    $requete = $db->query($sql);
    $themes = $requete->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $error_message = "Erreur de requête : " . $e->getMessage();
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["modifier"])) {
    // Le code de modification des œuvres reste le même
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["supprimer"])) {
    // Le code de suppression des œuvres reste le même
}
?>

<div class="container">
    <h1>Liste des œuvres</h1>
    <?php if (!empty($oeuvres)) : ?>
        <?php foreach ($oeuvres as $oeuvre) : ?>
            <div class="card">
                <form method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id_oeuvres" value="<?= $oeuvre["id_oeuvres"] ?>">
                    <h2><?= $oeuvre["nom_oeuvre"] ?></h2>
                    <h5>Référence: <?= $oeuvre["ref_oeuvre"] ?></h5>
                    <p><?= $oeuvre["description_oeuvre"] ?></p>
                    <img src="<?= $oeuvre["chemin_image"] ?>" alt="<?= $oeuvre["nom_oeuvre"] ?>">

                    <div class="buttons">
                        <button type="button" class="mod">Modifier</button>
                        <button type="submit" name="supprimer" class="del">Supprimer</button>
                    </div>

                    <div class="modifier-form" style="display: none;">
                        <label for="nom_oeuvre">Nom de l'œuvre :</label>
                        <input type="text" name="nom_oeuvre" value="<?= $oeuvre["nom_oeuvre"] ?>"><br>
                        <label for="ref_oeuvre">Référence de l'œuvre :</label>
                        <input type="text" name="ref_oeuvre" value="<?= $oeuvre["ref_oeuvre"] ?>"><br>
                        <label for="image">Image :</label><br>
                        <input type="file" id="image" name="image" accept="image/*"><br>
                        <label for="description_oeuvre">Description :</label>
                        <textarea name="description_oeuvre"><?= $oeuvre["description_oeuvre"] ?></textarea><br>
                        <label for="date_realisation">Date de réalisation :</label>
                        <input type="date" name="date_realisation" value="<?= $oeuvre["date_realisation"] ?>"><br>
                        <label for="largeur">Largeur :</label>
                        <input type="text" name="largeur" value="<?= $oeuvre["largeur"] ?>"><br>
                        <label for="hauteur">Hauteur :</label>
                        <input type="text" name="hauteur" value="<?= $oeuvre["hauteur"] ?>"><br>
                        <label for="profondeur">Profondeur :</label>
                        <input type="text" name="profondeur" value="<?= $oeuvre["profondeur"] ?>"><br>
                        <label for="date_livraison_prevu">Date de livraison prévue :</label>
                        <input type="date" name="date_livraison_prevu" value="<?= $oeuvre["date_livraison_prevu"] ?>"><br>
                        <label for="date_livraison_reel">Date de livraison réelle :</label>
                        <input type="date" name="date_livraison_reel" value="<?= $oeuvre["date_livraison_reel"] ?>"><br>
                        
                        <label for="id_type_oeuvre">Type d'œuvre :</label>
                        <select name="id_type_oeuvre">
                            <?php foreach ($types_oeuvre as $type) : ?>
                                <option value="<?= $type['id_type_oeuvre'] ?>" <?= $type['id_type_oeuvre'] == $oeuvre['id_type_oeuvre'] ? 'selected' : '' ?>>
                                    <?= $type['libelle_type_oeuvre'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select><br>


                        <label for="id_theme">Type de thèmes :</label>
                        <select name="id_theme">
                            <?php foreach ($themes as $theme) : ?>
                                <option value="<?= $theme['id_theme'] ?>" <?= $theme['id_theme'] == $oeuvre['id_theme'] ? 'selected' : '' ?>>
                                    <?= $theme['libelle_theme'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select><br>
                        <button type="submit" name="modifier">Valider</button>
                    </div>
                </form>
            </div>
        <?php endforeach; ?>

    <?php else : ?>
        <p>Aucune œuvre à afficher pour le moment.</p>
    <?php endif; ?>
</div>  
<script>
    const modifierButtons = document.querySelectorAll('.mod');
    modifierButtons.forEach(button => {
        button.addEventListener('click', () => {
            const modifierForm = button.parentElement.nextElementSibling;
            modifierForm.style.display = modifierForm.style.display === 'none' ? 'block' : 'none';
            button.style.display = 'none'; 
        });
    });
</script>
