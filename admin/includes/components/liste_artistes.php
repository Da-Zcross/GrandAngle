<?php
session_start();

define("DBHOST", "127.0.0.1");
define("DBUSER", "root");
define("DBPASS", "");
define("DBNAME", "grand");

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

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["ajouter"])) {
    $nom_artiste = $_POST["nom_artiste"];
    $prenom_artiste = $_POST["prenom_artiste"];
    $email_artiste = $_POST["email_artiste"];
    $num_telephone = $_POST["num_telephone"];
    $adresse_artiste = $_POST["adresse_artiste"];
    $cp_artiste = $_POST["cp_artiste"];
    $ville_artiste = $_POST["ville_artiste"];
    $date_naissance_artiste = $_POST["date_naissance_artiste"];
    $date_deces_artiste = $_POST["date_deces_artiste"];
    $biographie_fr = $_POST["biographie_fr"];

    // Vérifier si l'artiste existe déjà
    $existing_artiste_query = "SELECT COUNT(*) AS count FROM artiste WHERE email_artiste = :email_artiste";
    $stmt = $db->prepare($existing_artiste_query);
    $stmt->bindValue(":email_artiste", $email_artiste, PDO::PARAM_STR);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $existing_artiste_count = $row['count'];

    if ($existing_artiste_count > 0) {
        $error_message = "Cet artiste existe déjà dans la base de données.";
    } else {
        // Insérer l'artiste dans la base de données
        try {
            $sql = "INSERT INTO artiste (nom_artiste, prenom_artiste, email_artiste, num_telephone, adresse_artiste, cp_artiste, ville_artiste, date_naissance_artiste, date_deces_artiste, biographie_fr) 
                    VALUES (:nom_artiste, :prenom_artiste, :email_artiste, :num_telephone, :adresse_artiste, :cp_artiste, :ville_artiste, :date_naissance_artiste, :date_deces_artiste, :biographie_fr)";
            $stmt = $db->prepare($sql);
            $stmt->bindValue(":nom_artiste", $nom_artiste, PDO::PARAM_STR);
            $stmt->bindValue(":prenom_artiste", $prenom_artiste, PDO::PARAM_STR);
            $stmt->bindValue(":email_artiste", $email_artiste, PDO::PARAM_STR);
            $stmt->bindValue(":num_telephone", $num_telephone, PDO::PARAM_STR);
            $stmt->bindValue(":adresse_artiste", $adresse_artiste, PDO::PARAM_STR);
            $stmt->bindValue(":cp_artiste", $cp_artiste, PDO::PARAM_STR);
            $stmt->bindValue(":ville_artiste", $ville_artiste, PDO::PARAM_STR);
            $stmt->bindValue(":date_naissance_artiste", $date_naissance_artiste, PDO::PARAM_STR);
            $stmt->bindValue(":date_deces_artiste", $date_deces_artiste, PDO::PARAM_STR);
            $stmt->bindValue(":biographie_fr", $biographie_fr, PDO::PARAM_STR);
            $stmt->execute();

            $confirmation_message = "Artiste ajouté avec succès.";
        } catch (PDOException $e) {
            $error_message = "Erreur lors de l'ajout de l'artiste : " . $e->getMessage();
        }
    }
}

try {
    $sql = "SELECT * FROM artiste";
    $requete = $db->query($sql);
    $artistes = $requete->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Erreur de requête : " . $e->getMessage();
    exit();
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["modifier"])) {
    $id_artiste = $_POST["id_artiste"];
    $nom_artiste = $_POST["nom_artiste"];
    $prenom_artiste = $_POST["prenom_artiste"];
    $email_artiste = $_POST["email_artiste"];
    $num_telephone = $_POST["num_telephone"];
    $adresse_artiste = $_POST["adresse_artiste"];
    $cp_artiste = $_POST["cp_artiste"];
    $ville_artiste = $_POST["ville_artiste"];
    $date_naissance_artiste = $_POST["date_naissance_artiste"];
    $date_deces_artiste = $_POST["date_deces_artiste"];
    $biographie_fr = $_POST["biographie_fr"];

    try {
        $sql = "UPDATE artiste SET nom_artiste = :nom_artiste, prenom_artiste = :prenom_artiste, email_artiste = :email_artiste, num_telephone = :num_telephone, adresse_artiste = :adresse_artiste, cp_artiste = :cp_artiste, ville_artiste = :ville_artiste, date_naissance_artiste = :date_naissance_artiste, date_deces_artiste = :date_deces_artiste, biographie_fr = :biographie_fr WHERE id_artiste = :id_artiste";
        $stmt = $db->prepare($sql);
        $stmt->bindValue(":nom_artiste", $nom_artiste, PDO::PARAM_STR);
        $stmt->bindValue(":prenom_artiste", $prenom_artiste, PDO::PARAM_STR);
        $stmt->bindValue(":email_artiste", $email_artiste, PDO::PARAM_STR);
        $stmt->bindValue(":num_telephone", $num_telephone, PDO::PARAM_INT);
        $stmt->bindValue(":adresse_artiste", $adresse_artiste, PDO::PARAM_STR);
        $stmt->bindValue(":cp_artiste", $cp_artiste, PDO::PARAM_INT);
        $stmt->bindValue(":ville_artiste", $ville_artiste, PDO::PARAM_STR);
        $stmt->bindValue(":date_naissance_artiste", $date_naissance_artiste, PDO::PARAM_STR);
        $stmt->bindValue(":date_deces_artiste", $date_deces_artiste, PDO::PARAM_STR);
        $stmt->bindValue(":biographie_fr", $biographie_fr, PDO::PARAM_STR);
        $stmt->bindValue(":id_artiste", $id_artiste, PDO::PARAM_INT);
        $stmt->execute();

        header("Location: {$_SERVER['PHP_SELF']}");
        exit();
    } catch (PDOException $e) {
        echo "Erreur de modification : " . $e->getMessage();
        exit();
    }
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["supprimer"])) {
    $id_artiste = $_POST["id_artiste"];
    try {
        $sql = "DELETE FROM artiste WHERE id_artiste = :id_artiste";
        $stmt = $db->prepare($sql);
        $stmt->bindValue(":id_artiste", $id_artiste, PDO::PARAM_INT);
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

<h1>Ajouter un artiste</h1>
    <form method="POST" enctype="multipart/form-data">
        <label for="nom_artiste">Nom de l'artiste :</label>
        <input type="text" name="nom_artiste" required><br>
        
        <label for="prenom_artiste">Prénom de l'artiste :</label>
        <input type="text" name="prenom_artiste" required><br>
        
        <label for="email_artiste">Email :</label>
        <input type="email" name="email_artiste"><br>
        
        <label for="num_telephone">Numéro de téléphone :</label>
        <input type="text" name="num_telephone"><br>
        
        <label for="adresse_artiste">Adresse :</label>
        <input type="text" name="adresse_artiste"><br>
        
        <label for="cp_artiste">Code postal :</label>
        <input type="text" name="cp_artiste"><br>
        
        <label for="ville_artiste">Ville :</label>
        <input type="text" name="ville_artiste"><br>
        
        <label for="date_naissance_artiste">Date de naissance :</label>
        <input type="date" name="date_naissance_artiste"><br>
        
        <label for="date_deces_artiste">Date de décès :</label>
        <input type="date" name="date_deces_artiste"><br>
        
        <label for="biographie_fr">Biographie (français) :</label>
        <textarea name="biographie_fr"></textarea><br>
        
        <button type="submit" name="ajouter">Ajouter</button>
    </form>

<h1>Liste des artistes</h1>
    <?php if (!empty($artistes)) : ?>
        <?php foreach ($artistes as $artiste) : ?>
            <div class="card">
                <form method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id_artiste" value="<?= $artiste["id_artiste"] ?>">
                    <h2><?= $artiste["nom_artiste"] . ' ' . $artiste["prenom_artiste"] ?></h2>
                    <p><?= $artiste["biographie_fr"] ?></p>

                    <div class="buttons">
                        <button type="button" class="mod">Modifier</button>
                        <button type="submit" name="supprimer" class="del">Supprimer</button>
                    </div>

                    <div class="modifier-form" style="display: none;">
                        <label for="nom_artiste">Nom de l'artiste :</label>
                        <input type="text" name="nom_artiste" value="<?= $artiste["nom_artiste"] ?>"><br>
                        <label for="prenom_artiste">Prénom de l'artiste :</label>
                        <input type="text" name="prenom_artiste" value="<?= $artiste["prenom_artiste"] ?>"><br>
                        <label for="email_artiste">Email :</label>
                        <input type="email" name="email_artiste" value="<?= $artiste["email_artiste"] ?>"><br>
                        <label for="num_telephone">Numéro de téléphone :</label>
                        <input type="text" name="num_telephone" value="<?= $artiste["num_telephone"] ?>"><br>
                        <label for="adresse_artiste">Adresse :</label>
                        <input type="text" name="adresse_artiste" value="<?= $artiste["adresse_artiste"] ?>"><br>
                        <label for="cp_artiste">Code postal :</label>
                        <input type="text" name="cp_artiste" value="<?= $artiste["cp_artiste"] ?>"><br>
                        <label for="ville_artiste">Ville :</label>
                        <input type="text" name="ville_artiste" value="<?= $artiste["ville_artiste"] ?>"><br>
                        <label for="date_naissance_artiste">Date de naissance :</label>
                        <input type="date" name="date_naissance_artiste" value="<?= $artiste["date_naissance_artiste"] ?>"><br>
                        <label for="date_deces_artiste">Date de décès :</label>
                        <input type="date" name="date_deces_artiste" value="<?= $artiste["date_deces_artiste"] ?>"><br>
                        <label for="biographie_fr">Biographie (français) :</label>
                        <textarea name="biographie_fr"><?= $artiste["biographie_fr"] ?></textarea><br>
                        <button type="submit" name="modifier">Valider</button>
                    </div>
                </form>
            </div>
        <?php endforeach; ?>

    <?php else : ?>
        <p>Aucun artiste à afficher pour le moment.</p>
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
