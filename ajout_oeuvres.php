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

    $chemin_image = null;
    if (isset($_FILES["image"]) && $_FILES["image"]["error"] === UPLOAD_ERR_OK) {
        $nom_fichier = basename($_FILES["image"]["name"]);
        $dossier_images = "./assets/images/";
        $chemin_image = $dossier_images . $nom_fichier;
    }

    $sql = "INSERT INTO oeuvres_expo (nom_oeuvre, ref_oeuvre, description_oeuvre, date_realisation, largeur, hauteur, profondeur, date_livraison_prevu, date_livraison_reel, id_type_oeuvre, id_theme, chemin_image) 
           VALUES (:nom_oeuvre, :ref_oeuvre, :description_oeuvre, :date_realisation, :largeur, :hauteur, :profondeur, :date_livraison_prevu, :date_livraison_reel, :id_type_oeuvre, :id_theme, :chemin_image)";
    $stmt = $db->prepare($sql);

    $stmt->bindParam(':nom_oeuvre', $nom_oeuvre);
    $stmt->bindParam(':ref_oeuvre', $ref_oeuvre);
    $stmt->bindParam(':description_oeuvre', $description_oeuvre);
    $stmt->bindParam(':date_realisation', $date_realisation);
    $stmt->bindParam(':largeur', $largeur);
    $stmt->bindParam(':hauteur', $hauteur);
    $stmt->bindParam(':profondeur', $profondeur);
    $stmt->bindParam(':date_livraison_prevu', $date_livraison_prevu);
    $stmt->bindParam(':date_livraison_reel', $date_livraison_reel);
    $stmt->bindParam(':id_type_oeuvre', $id_type_oeuvre);
    $stmt->bindParam(':id_theme', $id_theme);
    $stmt->bindParam(':chemin_image', $chemin_image);

    $success = $stmt->execute();

    if ($success) {
        $last_insert_id = $db->lastInsertId();
        // Générer le QR code
        $qr_code_url = "https://api.qr-code-generator.com/v1/create?access-token=your-acces-token-here";
        $qr_code_data = json_encode([
            "frame_name" => "no-frame",
            "qr_code_text" => "https://www.example.com/oeuvre_details.php?id=$last_insert_id",
            "image_format" => "SVG",
            "background_color" => "#ffffff",
            "foreground_color" => "#000000",
            "marker_right_inner_color" => "#000000",
            "marker_right_outer_color" => "#000000",
            "marker_left_template" => "version13",
            "marker_right_template" => "version13",
            "marker_bottom_template" => "version13"
        ]);
        $ch = curl_init($qr_code_url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $qr_code_data);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        if ($response !== false) {
            file_put_contents("./includes/components/phpqrcode/$last_insert_id.svg", $response);
            $confirmation_message = "L'œuvre a été ajoutée avec succès et le QR code a été généré.";
        } else {
            $error_message = "Erreur lors de la génération du QR code: " . curl_error($ch);
        }
        curl_close($ch);
    } else {
        $error_message = "Une erreur s'est produite lors de l'ajout de l'œuvre.";
    }
}

$stmt_types = $db->query("SELECT id_type_oeuvre, libelle_type_oeuvre as nom FROM type_oeuvre");
$types = $stmt_types->fetchAll();

$stmt_themes = $db->query("SELECT id_theme, libelle_theme as nom FROM theme");
$themes = $stmt_themes->fetchAll();

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

</body>
</html>
