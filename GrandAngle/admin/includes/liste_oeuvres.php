<?php
session_start();

// Informations de connexion à la base de données
define("DBHOST", "127.0.0.1");
define("DBUSER", "root");
define("DBPASS", "");
define("DBNAME", "grandangle");

// Connexion à la base de données avec PDO
//Test
try {
    $db = new PDO("mysql:host=" . DBHOST . ";dbname=" . DBNAME, DBUSER, DBPASS);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) 
{
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}

$error_message = '';
$confirmation_message = '';
$titre = "Accueil admin";
$nav = "dashboard";

// Récupérer les données des œuvres depuis la base de données
try {
    $sql = "SELECT * FROM oeuvres_expo";
    $requete = $db->query($sql);
    $oeuvres = $requete->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    // Gérer les erreurs de requête
    echo "Erreur de requête : " . $e->getMessage();
    exit();
}

// Traitement de la modification de l'œuvre
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["modifier"])) {
    // Récupérer les données du formulaire
    $id_oeuvres = $_POST["id_oeuvres"];
    $nom_oeuvre = $_POST["nom_oeuvre"];
    $ref_oeuvre = $_POST["ref_oeuvre"];
    $chemin_image = $_POST["chemin_image"];
    $description_oeuvre = $_POST["description_oeuvre"];
    $date_realisation = $_POST["date_realisation"];
    $nb_vue = $_POST["nb_vue"];
    $largeur = $_POST["largeur"];
    $hauteur = $_POST["hauteur"];
    $profondeur = $_POST["profondeur"];
    $date_livraison_prevu = $_POST["date_livraison_prevu"];
    $date_livraison_reel = $_POST["date_livraison_reel"];
    $id_type_oeuvre = $_POST["id_type_oeuvre"];

    // Mettre à jour les données dans la base de données
    try {
        $sql = "UPDATE oeuvres_expo SET nom_oeuvre = :nom_oeuvre, ref_oeuvre = :ref_oeuvre, chemin_image = :chemin_image, description_oeuvre = :description_oeuvre, date_realisation = :date_realisation, nb_vue = :nb_vue, largeur = :largeur, hauteur = :hauteur, profondeur = :profondeur, date_livraison_prevu = :date_livraison_prevu, date_livraison_reel = :date_livraison_reel, id_type_oeuvre = :id_type_oeuvre WHERE id_oeuvres = :id_oeuvres";
        $stmt = $db->prepare($sql);
        $stmt->bindValue(":nom_oeuvre", $nom_oeuvre, PDO::PARAM_STR);
        $stmt->bindValue(":ref_oeuvre", $ref_oeuvre, PDO::PARAM_STR);
        $stmt->bindValue(":chemin_image", $chemin_image, PDO::PARAM_STR);
        $stmt->bindValue(":description_oeuvre", $description_oeuvre, PDO::PARAM_STR);
        $stmt->bindValue(":date_realisation", $date_realisation, PDO::PARAM_STR);
        $stmt->bindValue(":nb_vue", $nb_vue, PDO::PARAM_STR);
        $stmt->bindValue(":largeur", $largeur, PDO::PARAM_STR);
        $stmt->bindValue(":hauteur", $hauteur, PDO::PARAM_STR);
        $stmt->bindValue(":profondeur", $profondeur, PDO::PARAM_STR);
        $stmt->bindValue(":date_livraison_prevu", $date_livraison_prevu, PDO::PARAM_STR);
        $stmt->bindValue(":date_livraison_reel", $date_livraison_reel, PDO::PARAM_STR);
        $stmt->bindValue(":id_type_oeuvre", $id_type_oeuvre, PDO::PARAM_INT);
        $stmt->bindValue(":id_oeuvres", $id_oeuvres, PDO::PARAM_INT);
        $stmt->execute();
        // Redirection vers la page actuelle pour actualiser les données affichées
        header("Location: {$_SERVER['PHP_SELF']}");
        exit();
    } catch (PDOException $e) {
        // Gérer les erreurs de mise à jour
        echo "Erreur de mise à jour : " . $e->getMessage();
        exit();
    }
}

// Traitement de la suppression de l'œuvre
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["supprimer"])) {
    // Récupérer l'ID de l'œuvre à supprimer
    $id_oeuvres = $_POST["id_oeuvres"];
    // Supprimer l'œuvre de la base de données
    try {
        $sql = "DELETE FROM oeuvres_expo WHERE id_oeuvres = :id_oeuvres";
        $stmt = $db->prepare($sql);
        $stmt->bindValue(":id_oeuvres", $id_oeuvres, PDO::PARAM_INT);
        $stmt->execute();
        // Redirection vers la page actuelle pour actualiser les données affichées
        header("Location: {$_SERVER['PHP_SELF']}");
        exit();
    } catch (PDOException $e) {
        // Gérer les erreurs de suppression
        echo "Erreur de suppression : " . $e->getMessage();
        exit();
    }
}
?>
 
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="./assets/css/admin.css">
 
</head>
<body>
    <div class="container">
        <h1>Liste des œuvres</h1>
        <?php if (!empty($oeuvres)) : ?>
            <?php foreach ($oeuvres as $oeuvre) : ?>
                <div class="card" style="background-color: <?= $oeuvre["cat_color"] ?>;">
                    <form method="POST">
                        <input type="hidden" name="id_oeuvres" value="<?= $oeuvre["id_oeuvres"] ?>">
                        <h2><?= $oeuvre["nom_oeuvre"] ?></h2>
                        <h5>Référence: <?= $oeuvre["ref_oeuvre"] ?></h5>
                        <p><?= $oeuvre["description_oeuvre"] ?></p>
                        <img src="<?= $oeuvre["chemin_image"] ?>" alt="<?= $oeuvre["nom_oeuvre"] ?>">
                        <div class="buttons">
                            <!-- Bouton pour afficher le formulaire de modification -->
                            <button type="button" class="mod">Modifier</button>
                            <!-- Bouton pour supprimer l'œuvre -->
                            <button type="submit" name="supprimer" class="del">Supprimer</button>
                        </div>
                        <!-- Formulaire de modification caché -->
                        <div class="modifier-form" style="display: none;">
                            <label for="nom_oeuvre">Nom de l'œuvre :</label>
                            <input type="text" name="nom_oeuvre" value="<?= $oeuvre["nom_oeuvre"] ?>"><br>
                            <label for="ref_oeuvre">Référence de l'œuvre :</label>
                            <input type="text" name="ref_oeuvre" value="<?= $oeuvre["ref_oeuvre"] ?>"><br>
                            <label for="chemin_image">Chemin de l'image :</label>
                            <input type="text" name="chemin_image" value="<?= $oeuvre["chemin_image"] ?>"><br>
                            <label for="description_oeuvre">Description :</label>
                            <textarea name="description_oeuvre"><?= $oeuvre["description_oeuvre"] ?></textarea><br>
                            <label for="date_realisation">Date de réalisation :</label>
                            <input type="date" name="date_realisation" value="<?= $oeuvre["date_realisation"] ?>"><br>
                            <label for="nb_vue">Nombre de vues :</label>
                            <input type="text" name="nb_vue" value="<?= $oeuvre["nb_vue"] ?>"><br>
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
                            <label for="id_type_oeuvre">ID du type d'œuvre :</label>
                            <input type="text" name="id_type_oeuvre" value="<?= $oeuvre["id_type_oeuvre"] ?>"><br>
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
        // Script pour afficher/cacher les formulaires de modification
        const modifierButtons = document.querySelectorAll('.mod');
        modifierButtons.forEach(button => {
            button.addEventListener('click', () => {
                const modifierForm = button.parentElement.nextElementSibling;
                modifierForm.style.display = modifierForm.style.display === 'none' ? 'block' : 'none';
            });
        });
    </script>
</body>
</html>
