<?php
session_start();

// Informations de connexion à la base de données
define("DBHOST", "127.0.0.1");
define("DBUSER", "root");
define("DBPASS", "");
define("DBNAME", "grandangle");

// Connexion à la base de données avec PDO

try {
    $db = new PDO("mysql:host=" . DBHOST . ";dbname=" . DBNAME, DBUSER, DBPASS);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}

$error_message = '';
$confirmation_message = '';


// Traitement du formulaire d'ajout d'œuvre
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nom_oeuvre = $_POST["nom_oeuvre"] ?? '';
    $ref_oeuvre = $_POST["ref_oeuvre"] ?? '';

    $description_oeuvre = $_POST["description_oeuvre"] ?? '';
    $date_realisation = $_POST["date_realisation"] ?? '';
    $largeur = $_POST["largeur"] ?? '';
    $hauteur = $_POST["hauteur"] ?? '';
    $profondeur = $_POST["profondeur"] ?? '';
    $date_livraison_prevu = $_POST["date_livraison_prevu"] ?? '';
    $date_livraison_reel = $_POST["date_livraison_reel"] ?? '';
    $id_type_oeuvre = $_POST["type_oeuvre"] ?? '';

    $id_theme = $_POST["theme"] ?? '';
    $id_artiste = $_POST["id_artiste"] ?? '';
    $poids = $_POST["poids"] ?? '';

    // Vérification si la référence de l'œuvre existe déjà
    $stmt_check_ref = $db->prepare("SELECT COUNT(*) FROM oeuvres_expo WHERE nom_oeuvre = :nom_oeuvre");
    $stmt_check_ref->bindParam(':nom_oeuvre', $nom_oeuvre);
    $stmt_check_ref->execute();
    $ref_exists = $stmt_check_ref->fetchColumn();

    if ($ref_exists) {
        $error_message = "La référence de l'œuvre existe déjà. Veuillez en choisir une autre.";
    } else {
        $chemin_image = null;
        if (isset($_FILES["image"]) && $_FILES["image"]["error"] === UPLOAD_ERR_OK) {
            $nom_fichier = basename($_FILES["image"]["name"]);
            $dossier_images = "./assets/images/";
            $chemin_image = $dossier_images . $nom_fichier;
        }

        try {
            $db->beginTransaction();

            // Insértion dans la table oeuvres_expo
            $sql_oeuvres_expo = "INSERT INTO oeuvres_expo (nom_oeuvre, chemin_image, description_oeuvre, date_realisation, largeur, hauteur, profondeur, date_livraison_prevu, date_livraison_reel, id_type_oeuvre, id_theme, id_artiste, poids) 
            VALUES (:nom_oeuvre, :chemin_image, :description_oeuvre, :date_realisation, :largeur, :hauteur, :profondeur, :date_livraison_prevu, :date_livraison_reel, :id_type_oeuvre, :id_theme, :id_artiste, :poids)";
            $stmt_oeuvres_expo = $db->prepare($sql_oeuvres_expo);
            $stmt_oeuvres_expo->bindParam(':id_artiste', $id_artiste);            
            $stmt_oeuvres_expo->bindParam(':nom_oeuvre', $nom_oeuvre);
            $stmt_oeuvres_expo->bindParam(':chemin_image', $chemin_image);
            $stmt_oeuvres_expo->bindParam(':description_oeuvre', $description_oeuvre);
            $stmt_oeuvres_expo->bindParam(':date_realisation', $date_realisation);
            $stmt_oeuvres_expo->bindParam(':largeur', $largeur);
            $stmt_oeuvres_expo->bindParam(':hauteur', $hauteur);
            $stmt_oeuvres_expo->bindParam(':profondeur', $profondeur);
            $stmt_oeuvres_expo->bindParam(':date_livraison_prevu', $date_livraison_prevu);
            $stmt_oeuvres_expo->bindParam(':date_livraison_reel', $date_livraison_reel);
            $stmt_oeuvres_expo->bindParam(':id_type_oeuvre', $id_type_oeuvre);
            $stmt_oeuvres_expo->bindParam(':id_theme', $id_theme);
            $stmt_oeuvres_expo->bindParam(':poids', $poids);
            $stmt_oeuvres_expo->execute();

            // Commit de la transaction
            $db->commit();

            $confirmation_message = "L'oeuvre à été ajouté avec succès.";
        } catch (PDOException $e) {
            // Rollback en cas d'erreur
            $db->rollback();
            $error_message = "Erreur lors de l'insertion des données : " . $e->getMessage();
        }
    }
}

$stmt_types = $db->query("SELECT id_type_oeuvre, libelle_type_oeuvre as nom FROM type_oeuvre");
$types = $stmt_types->fetchAll();

$stmt_themes = $db->query("SELECT id_theme, libelle_theme as nom FROM theme");
$themes = $stmt_themes->fetchAll();

$stmt_artistes = $db->query("SELECT id_artiste, CONCAT(nom_artiste, ' ', prenom_artiste) AS nom_complet FROM artiste");
$artistes = $stmt_artistes->fetchAll();
?>


<h2>Ajouter une œuvre</h2>
<?php if (!empty($error_message)) : ?>
<div class="error"><?= $error_message; ?></div>
<?php endif; ?>
<?php if (!empty($confirmation_message)) : ?>
<div class="confirmation"><?= $confirmation_message; ?></div>
<?php endif; ?>

<form method="POST" enctype="multipart/form-data">
        
    <label for="id_artiste">Nom de l'artiste :</label><br>
    <select id="id_artiste" name="id_artiste" required>
        <option value="">Sélectionner un artiste</option>
        <?php foreach ($artistes as $artiste) : ?>
        <option value="<?= $artiste['id_artiste']; ?>"><?= $artiste['nom_complet']; ?></option>
        <?php endforeach; ?>
    </select><br>

    <label for="nom_oeuvre">Nom de l'œuvre :</label><br>
    <input type="text" id="nom_oeuvre" name="nom_oeuvre" required><br>

    <label for="description_oeuvre">Description :</label><br>
    <textarea id="description_oeuvre" name="description_oeuvre" required></textarea><br>

    <label for="date_realisation">Date de réalisation :</label><br>
    <input type="date" id="date_realisation" name="date_realisation" required><br>

    <label for="largeur">Largeur :</label><br>
    <input type="text" id="largeur" name="largeur" required><br>

    <label for="hauteur">Hauteur :</label><br>
    <input type="text" id="hauteur" name="hauteur" required><br>

    <label for="profondeur">Profondeur :</label><br>
    <input type="text" id="profondeur" name="profondeur" required><br>

    <label for="poids">Poids :</label><br>
    <input type="text" id="poids" name="poids"><br>

    <label for="date_livraison_prevu">Date de livraison prévue :</label><br>
    <input type="date" id="date_livraison_prevu" name="date_livraison_prevu" required><br>

    <label for="date_livraison_reel">Date de livraison réelle :</label><br>
    <input type="date" id="date_livraison_reel" name="date_livraison_reel"><br>

    <label for="type_oeuvre">Type d'œuvre :</label><br>
    <select id="type_oeuvre" name="type_oeuvre" required>
        <option value="">Sélectionner un type d'œuvre</option>
        <?php foreach ($types as $type) : ?>
        <option value="<?= $type['id_type_oeuvre']; ?>"><?= $type['nom']; ?></option>
        <?php endforeach; ?>
    </select><br>

    <label for="theme">Type de thèmes :</label><br>
    <select id="theme" name="theme" required>
        <option value="">Sélectionner un type de thème</option>
        <?php foreach ($themes as $theme) : ?>
        <option value="<?= $theme['id_theme']; ?>"><?= $theme['nom']; ?></option>
        <?php endforeach; ?>
    </select><br>

    <label for="image">Image :</label><br>
    <input type="file" id="image" name="image" accept="image/*" required><br>

    <input type="submit" name="ajouter" value="Ajouter">
</form>


    // Chemin de l'image
    $chemin_image = null;
    if (isset($_FILES["image"]) && $_FILES["image"]["error"] === UPLOAD_ERR_OK) {
        $nom_fichier = basename($_FILES["image"]["name"]);
        $dossier_images = "./assets/images/";
        $chemin_image = $dossier_images . $nom_fichier;
    }

    // Insertion des données dans la base de données
    $sql = "INSERT INTO oeuvres_expo (nom_oeuvre, ref_oeuvre, description_oeuvre, date_realisation, largeur, hauteur, profondeur, date_livraison_prevu, date_livraison_reel, id_type_oeuvre, chemin_image) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $db->prepare($sql);
    $success = $stmt->execute([$nom_oeuvre, $ref_oeuvre, $description_oeuvre, $date_realisation, $largeur, $hauteur, $profondeur, $date_livraison_prevu, $date_livraison_reel, $id_type_oeuvre, $chemin_image]);

    if ($success) {
        $confirmation_message = "L'œuvre a été ajoutée avec succès.";
    } else {
        $error_message = "Une erreur s'est produite lors de l'ajout de l'œuvre.";
    }
}

// Récupération des types d'œuvres depuis la base de données
$stmt_types = $db->query("SELECT id_type_oeuvre, libelle_type_oeuvre as nom FROM type_oeuvre");
$types = $stmt_types->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une œuvre</title>
</head>
<body>
    <h2>Ajouter une œuvre</h2>
    <?php if (!empty($error_message)) : ?>
        <div class="error"><?= $error_message; ?></div>
    <?php endif; ?>
    <?php if (!empty($confirmation_message)) : ?>
        <div class="confirmation"><?= $confirmation_message; ?></div>
    <?php endif; ?>
    
    <form method="POST" enctype="multipart/form-data">
        <label for="nom_oeuvre">Nom de l'œuvre :</label><br>
        <input type="text" id="nom_oeuvre" name="nom_oeuvre" required><br>
        
        <label for="ref_oeuvre">Référence de l'œuvre :</label><br>
        <input type="text" id="ref_oeuvre" name="ref_oeuvre" required><br>
        
        <label for="description_oeuvre">Description :</label><br>
        <textarea id="description_oeuvre" name="description_oeuvre" required></textarea><br>
        
        <label for="date_realisation">Date de réalisation :</label><br>
        <input type="date" id="date_realisation" name="date_realisation" required><br>
        
        <label for="largeur">Largeur :</label><br>
        <input type="text" id="largeur" name="largeur" required><br>
        
        <label for="hauteur">Hauteur :</label><br>
        <input type="text" id="hauteur" name="hauteur" required><br>
        
        <label for="profondeur">Profondeur :</label><br>
        <input type="text" id="profondeur" name="profondeur" required><br>
        
        <label for="date_livraison_prevu">Date de livraison prévue :</label><br>
        <input type="date" id="date_livraison_prevu" name="date_livraison_prevu" required><br>
        
        <label for="date_livraison_reel">Date de livraison réelle :</label><br>
        <input type="date" id="date_livraison_reel" name="date_livraison_reel"><br>
        
        <label for="type_oeuvre">Type d'œuvre :</label><br>
        <select id="type_oeuvre" name="type_oeuvre" required>
            <option value="">Sélectionner un type d'œuvre</option>
            <?php foreach ($types as $type) : ?>
                <option value="<?= $type['id_type_oeuvre']; ?>"><?= $type['nom']; ?></option>
            <?php endforeach; ?>
        </select><br>
        
        <label for="image">Image :</label><br>
        <input type="file" id="image" name="image" accept="image/*" required><br>
        
        <input type="submit" name="ajouter" value="Ajouter">
    </form>
</body>
</html>

