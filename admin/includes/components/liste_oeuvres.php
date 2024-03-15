<?php
$host = 'localhost';
$dbname = 'grand';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données: " . $e->getMessage());
}

$titre = "Accueil admin";
$nav = "dashboard";
$error_message = '';

try {
    $sql = "SELECT * FROM oeuvres_expo";
    $requete = $pdo->query($sql);
    $oeuvres = $requete->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $error_message = "Erreur de requête : " . $e->getMessage();
}

try {
    $sql = "SELECT * FROM type_oeuvre";
    $requete = $pdo->query($sql);
    $types_oeuvre = $requete->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $error_message = "Erreur de requête : " . $e->getMessage();
}

try {
    $sql = "SELECT * FROM theme";
    $requete = $pdo->query($sql);
    $themes = $requete->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $error_message = "Erreur de requête : " . $e->getMessage();
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["modifier"])) {
    $id_oeuvres = $_POST["id_oeuvres"];
    $nom_oeuvre = $_POST["nom_oeuvre"];
    $description_oeuvre = $_POST["description_oeuvre"];
    $date_realisation = $_POST["date_realisation"];
    $largeur = $_POST["largeur"];
    $hauteur = $_POST["hauteur"];
    $profondeur = $_POST["profondeur"];
    $poids = $_POST["poids"];
    $date_livraison_prevu = $_POST["date_livraison_prevu"];
    $date_livraison_reel = $_POST["date_livraison_reel"];
    $id_type_oeuvre = $_POST["id_type_oeuvre"];
    $id_theme = $_POST["id_theme"];

    try {
        $sql = "UPDATE oeuvres_expo SET nom_oeuvre = :nom_oeuvre, description_oeuvre = :description_oeuvre, date_realisation = :date_realisation, largeur = :largeur, hauteur = :hauteur, profondeur = :profondeur, poids = :poids, date_livraison_prevu = :date_livraison_prevu, date_livraison_reel = :date_livraison_reel, id_type_oeuvre = :id_type_oeuvre, id_theme = :id_theme WHERE id_oeuvres = :id_oeuvres";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'nom_oeuvre' => $nom_oeuvre,
            'description_oeuvre' => $description_oeuvre,
            'date_realisation' => $date_realisation,
            'largeur' => $largeur,
            'hauteur' => $hauteur,
            'profondeur' => $profondeur,
            'poids' =>$poids,
            'date_livraison_prevu' => $date_livraison_prevu,
            'date_livraison_reel' => $date_livraison_reel,
            'id_type_oeuvre' => $id_type_oeuvre,
            'id_theme' => $id_theme,
            'id_oeuvres' => $id_oeuvres
        ]);
    } catch (PDOException $e) {
        $error_message = "Erreur de modification : " . $e->getMessage();
    }
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["supprimer"])) {
    $id_oeuvres = $_POST["id_oeuvres"];

    try {
        $sql = "DELETE FROM oeuvres_expo WHERE id_oeuvres = :id_oeuvres";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id_oeuvres' => $id_oeuvres]);
    } catch (PDOException $e) {
        $error_message = "Erreur de suppression : " . $e->getMessage();
    }
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
            <p><?= $oeuvre["description_oeuvre"] ?></p>
            <img src="<?= $oeuvre["chemin_image"] ?>" alt="<?= $oeuvre["nom_oeuvre"] ?>">

            <div class="buttons">
                <button type="button" class="mod">Modifier</button>
                <button type="submit" name="supprimer" class="del">Supprimer</button>
            </div>

            <div class="modifier-form" style="display: none;">
                <label for="nom_oeuvre">Nom de l'œuvre :</label>
                <input type="text" name="nom_oeuvre" value="<?= $oeuvre["nom_oeuvre"] ?>"><br>
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
                <label for="poids">Poids :</label>
                <input type="text" name="poids" value="<?= $oeuvre["poids"] ?>"><br>
                <label for="date_livraison_prevu">Date de livraison prévue :</label>
                <input type="date" name="date_livraison_prevu" value="<?= $oeuvre["date_livraison_prevu"] ?>"><br>
                <label for="date_livraison_reel">Date de livraison réelle :</label>
                <input type="date" name="date_livraison_reel" value="<?= $oeuvre["date_livraison_reel"] ?>"><br>
                <label for="id_type_oeuvre">Type d'œuvre :</label>
                <select name="id_type_oeuvre">
                    <?php foreach ($types_oeuvre as $type) : ?>
                    <option value="<?= $type['id_type_oeuvre'] ?>"
                        <?= $type['id_type_oeuvre'] == $oeuvre['id_type_oeuvre'] ? 'selected' : '' ?>>
                        <?= $type['libelle_type_oeuvre'] ?>
                    </option>
                    <?php endforeach; ?>
                </select><br>
                <label for="id_theme">Type de thèmes :</label>
                <select name="id_theme">
                    <?php foreach ($themes as $theme) : ?>
                    <option value="<?= $theme['id_theme'] ?>"
                        <?= $theme['id_theme'] == $oeuvre['id_theme'] ? 'selected' : '' ?>>
                        <?= $theme['libelle_theme'] ?>
                    </option>
                    <?php endforeach; ?>
                </select><br>
                <label for="image_oeuvre">Image de l'œuvre :</label>
                <input type="file" name="image_oeuvre">
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