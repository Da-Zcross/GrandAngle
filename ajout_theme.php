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
    $sql = "SELECT * FROM theme";
    $requete = $db->query($sql);
    $themes = $requete->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Erreur de requête : " . $e->getMessage();
    exit();
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["ajouter"])) {
    $libelle_theme = $_POST["libelle_theme"];
    $description = $_POST["description"];

    $chemin_image = '';
    if ($_FILES['image']['size'] > 0) {
        $image = $_FILES['image'];
        $chemin_image = './assets/images/' . $image['name'];
        move_uploaded_file($image['tmp_name'], $chemin_image);
    }

    try {
        $sql = "INSERT INTO theme (libelle_theme, description, chemin_image) VALUES (:libelle_theme, :description, :chemin_image)";
        $stmt = $db->prepare($sql);
        $stmt->bindValue(":libelle_theme", $libelle_theme, PDO::PARAM_STR);
        $stmt->bindValue(":description", $description, PDO::PARAM_STR);
        $stmt->bindValue(":chemin_image", $chemin_image, PDO::PARAM_STR);
        $stmt->execute();

        header("Location: {$_SERVER['PHP_SELF']}");
        exit();
    } catch (PDOException $e) {
        echo "Erreur d'ajout : " . $e->getMessage();
        exit();
    }
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["modifier"])) {
    $id_theme = $_POST["id_theme"];
    $libelle_theme = $_POST["libelle_theme"];
    $description = $_POST["description"];
    $ancien_chemin_image = $_POST["ancien_chemin_image"];

    $chemin_image = $ancien_chemin_image;
    if ($_FILES['image']['size'] > 0) {
        $image = $_FILES['image'];
        $chemin_image = './assets/images/' . $image['name'];
        move_uploaded_file($image['tmp_name'], $chemin_image);
    }

    try {
        $sql = "UPDATE theme SET libelle_theme = :libelle_theme, description = :description, chemin_image = :chemin_image WHERE id_theme = :id_theme";
        $stmt = $db->prepare($sql);
        $stmt->bindValue(":libelle_theme", $libelle_theme, PDO::PARAM_STR);
        $stmt->bindValue(":description", $description, PDO::PARAM_STR);
        $stmt->bindValue(":chemin_image", $chemin_image, PDO::PARAM_STR);
        $stmt->bindValue(":id_theme", $id_theme, PDO::PARAM_INT);
        $stmt->execute();

        header("Location: {$_SERVER['PHP_SELF']}");
        exit();
    } catch (PDOException $e) {
        echo "Erreur de modification : " . $e->getMessage();
        exit();
    }
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["supprimer"])) {
    $id_theme = $_POST["id_theme"];
    try {
        $sql = "DELETE FROM theme WHERE id_theme = :id_theme";
        $stmt = $db->prepare($sql);
        $stmt->bindValue(":id_theme", $id_theme, PDO::PARAM_INT);
        $stmt->execute();
        header("Location: {$_SERVER['PHP_SELF']}");
        exit();
    } catch (PDOException $e) {
        echo "Erreur de suppression : " . $e->getMessage();
        exit();
    }
}
?>

<div class="container">
    <h1>Ajouter un thème</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
        <label for="libelle_theme">Libellé du thème :</label><br>
        <input type="text" id="libelle_theme" name="libelle_theme" required><br><br>

        <label for="description">Description :</label><br>
        <textarea id="description" name="description" rows="4" cols="50"></textarea><br><br>

        <label for="image">Image :</label><br>
        <input type="file" id="image" name="image" accept="image/*" required><br><br>

        <button type="submit" name="ajouter">Ajouter</button>
    </form>

    <h1>Liste des thèmes</h1>
    <?php if (!empty($themes)) : ?>
        <?php foreach ($themes as $theme) : ?>
            <div class="card">
                <form method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id_theme" value="<?= $theme["id_theme"] ?>">
                    <h2><?= $theme["libelle_theme"] ?></h2>
                    <p><?= $theme["description"] ?></p>
                    <img src="<?= $theme["chemin_image"] ?>" alt="<?= $theme["libelle_theme"] ?>">

                    <div class="buttons">
                        <button type="button" class="mod">Modifier</button>
                        <button type="submit" name="supprimer" class="del">Supprimer</button>
                    </div>

                    <div class="modifier-form" style="display: none;">
                        <label for="libelle_theme">Libellé du thème :</label>
                        <input type="text" name="libelle_theme" value="<?= $theme["libelle_theme"] ?>"><br>

                        <label for="description">Description :</label>
                        <textarea name="description"><?= $theme["description"] ?></textarea><br>

                        <label for="image">Image :</label><br>
                        <input type="file" name="image" accept="image/*"><br>
                        <input type="hidden" name="ancien_chemin_image" value="<?= $theme["chemin_image"] ?>">

                        <button type="submit" name="modifier">Valider</button>
                    </div>
                </form>
            </div>
        <?php endforeach; ?>
    <?php else : ?>
        <p>Aucun thème à afficher pour le moment.</p>
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
