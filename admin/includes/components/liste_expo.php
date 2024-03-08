<?php

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

// Traitement de l'ajout d'exposition
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["ajouter"])) {
    $nom_expo = $_POST["nom_expo"];
    $date_debut = $_POST["date_debut"];
    $date_fin = $_POST["date_fin"];
    $horaire_visite = $_POST["horaire_visite"];
    $report_frequentation = $_POST["report_frequentation"];
    $prenom_directeur_artistique = $_POST["prenom_directeur_artistique"];
    $nom_directeur_artistique = $_POST["nom_directeur_artistique"];
    $email_directeur_artistique = $_POST["email_directeur_artistique"];
    $nombre_oeuvres = $_POST["nombre_oeuvres"];
    $id_theme = $_POST["id_theme"];
    
    try {
        $sql = "INSERT INTO exposition (nom_expo, date_debut, date_fin, horaire_visite, report_frequentation, prenom_directeur_artistique, nom_directeur_artistique, email_directeur_artistique, nombre_oeuvres, id_theme) 
                VALUES (:nom_expo, :date_debut, :date_fin, :horaire_visite, :report_frequentation, :prenom_directeur_artistique, :nom_directeur_artistique, :email_directeur_artistique, :nombre_oeuvres, :id_theme)";
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':nom_expo', $nom_expo);
        $stmt->bindValue(':date_debut', $date_debut);
        $stmt->bindValue(':date_fin', $date_fin);
        $stmt->bindValue(':horaire_visite', $horaire_visite);
        $stmt->bindValue(':report_frequentation', $report_frequentation);
        $stmt->bindValue(':prenom_directeur_artistique', $prenom_directeur_artistique);
        $stmt->bindValue(':nom_directeur_artistique', $nom_directeur_artistique);
        $stmt->bindValue(':email_directeur_artistique', $email_directeur_artistique);
        $stmt->bindValue(':nombre_oeuvres', $nombre_oeuvres);
        $stmt->bindValue(':id_theme', $id_theme);
        $stmt->execute();
        $confirmation_message = "Exposition ajoutée avec succès.";
    } catch (PDOException $e) {
        $error_message = "Erreur lors de l'ajout de l'exposition : " . $e->getMessage();
    }
}

// Traitement de la modification d'exposition
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["modifier"])) {
    $id_expo = $_POST["id_expo"];
    $nom_expo = $_POST["nom_expo"];
    $date_debut = $_POST["date_debut"];
    $date_fin = $_POST["date_fin"];
    $horaire_visite = $_POST["horaire_visite"];
    $report_frequentation = $_POST["report_frequentation"];
    $prenom_directeur_artistique = $_POST["prenom_directeur_artistique"];
    $nom_directeur_artistique = $_POST["nom_directeur_artistique"];
    $email_directeur_artistique = $_POST["email_directeur_artistique"];
    $nombre_oeuvres = $_POST["nombre_oeuvres"];
    $id_theme = $_POST["id_theme"];
    
    try {
        $sql = "UPDATE exposition SET 
                    nom_expo = :nom_expo, 
                    date_debut = :date_debut, 
                    date_fin = :date_fin, 
                    horaire_visite = :horaire_visite, 
                    report_frequentation = :report_frequentation, 
                    prenom_directeur_artistique = :prenom_directeur_artistique, 
                    nom_directeur_artistique = :nom_directeur_artistique, 
                    email_directeur_artistique = :email_directeur_artistique, 
                    nombre_oeuvres = :nombre_oeuvres, 
                    id_theme = :id_theme 
                WHERE id_expo = :id_expo";
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':nom_expo', $nom_expo);
        $stmt->bindValue(':date_debut', $date_debut);
        $stmt->bindValue(':date_fin', $date_fin);
        $stmt->bindValue(':horaire_visite', $horaire_visite);
        $stmt->bindValue(':report_frequentation', $report_frequentation);
        $stmt->bindValue(':prenom_directeur_artistique', $prenom_directeur_artistique);
        $stmt->bindValue(':nom_directeur_artistique', $nom_directeur_artistique);
        $stmt->bindValue(':email_directeur_artistique', $email_directeur_artistique);
        $stmt->bindValue(':nombre_oeuvres', $nombre_oeuvres);
        $stmt->bindValue(':id_theme', $id_theme);
        $stmt->bindValue(':id_expo', $id_expo);
        $stmt->execute();
        $confirmation_message = "Exposition modifiée avec succès.";
    } catch (PDOException $e) {
        $error_message = "Erreur lors de la modification de l'exposition : " . $e->getMessage();
    }
}

// Traitement de la suppression d'exposition
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["supprimer"])) {
    $id_expo = $_POST["id_expo"];
    
    try {
        $sql = "DELETE FROM exposition WHERE id_expo = :id_expo";
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':id_expo', $id_expo);
        $stmt->execute();
        $confirmation_message = "Exposition supprimée avec succès.";
    } catch (PDOException $e) {
        $error_message = "Erreur lors de la suppression de l'exposition : " . $e->getMessage();
    }
}

try {
    $sql = "SELECT * FROM exposition";
    $requete = $db->query($sql);
    $expositions = $requete->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $error_message = "Erreur de requête : " . $e->getMessage();
}

?>

<div class="container">
    <h1>Ajouter une exposition</h1>
    <form method="POST" action="">
        <label for="nom_expo">Nom de l'exposition :</label>
        <input type="text" name="nom_expo" required><br>
        
        <label for="date_debut">Date de début :</label>
        <input type="date" name="date_debut" required><br>
        
        <label for="date_fin">Date de fin :</label>
        <input type="date" name="date_fin" required><br>
        
        <label for="horaire_visite">Horaire de visite :</label>
        <input type="time" name="horaire_visite" required><br>
        
        <label for="report_frequentation">Rapport de fréquentation :</label>
        <input type="number" name="report_frequentation"><br>
        
        <label for="prenom_directeur_artistique">Prénom du directeur artistique :</label>
        <input type="text" name="prenom_directeur_artistique"><br>
        
        <label for="nom_directeur_artistique">Nom du directeur artistique :</label>
        <input type="text" name="nom_directeur_artistique"><br>
        
        <label for="email_directeur_artistique">Email du directeur artistique :</label>
        <input type="email" name="email_directeur_artistique"><br>
        
        <label for="nombre_oeuvres">Nombre d'œuvres :</label>
        <input type="number" name="nombre_oeuvres"><br>
        
        <label for="id_theme">ID du thème :</label>
        <input type="number" name="id_theme" required><br>
        
        <button type="submit" name="ajouter">Ajouter</button>
    </form>

    <h1>Liste des expositions</h1>
    <?php if (!empty($expositions)) : ?>
        <?php foreach ($expositions as $exposition) : ?>
            <div class="card">
                <h2><?= $exposition["nom_expo"] ?></h2>
                <p>Date de début : <?= $exposition["date_debut"] ?></p>
                <p>Date de fin : <?= $exposition["date_fin"] ?></p>
                <p>Directeur artistique : <?= $exposition["prenom_directeur_artistique"] ?> <?= $exposition["nom_directeur_artistique"] ?></p>
                <p>Email directeur artistique : <?= $exposition["email_directeur_artistique"] ?></p>
                <p>Nombre d'œuvres : <?= $exposition["nombre_oeuvres"] ?></p>
                
                <form method="POST" action="">
                    <input type="hidden" name="id_expo" value="<?= $exposition["id_expo"] ?>">
                    <button type="button" class="modifier">Modifier</button>
                    <button type="submit" name="supprimer">Supprimer</button>
                    <div class="modifier-form" style="display: none;">
                        <label for="nom_expo">Nom de l'exposition :</label>
                        <input type="text" name="nom_expo" value="<?= $exposition["nom_expo"] ?>"><br>
                        
                        <label for="date_debut">Date de début :</label>
                        <input type="date" name="date_debut" value="<?= $exposition["date_debut"] ?>"><br>
                        
                        <label for="date_fin">Date de fin :</label>
                        <input type="date" name="date_fin" value="<?= $exposition["date_fin"] ?>"><br>
                        
                        <label for="horaire_visite">Horaire de visite :</label>
                        <input type="time" name="horaire_visite" value="<?= $exposition["horaire_visite"] ?>"><br>
                        
                        <label for="report_frequentation">Rapport de fréquentation :</label>
                        <input type="number" name="report_frequentation" value="<?= $exposition["report_frequentation"] ?>"><br>
                        
                        <label for="prenom_directeur_artistique">Prénom du directeur artistique :</label>
                        <input type="text" name="prenom_directeur_artistique" value="<?= $exposition["prenom_directeur_artistique"] ?>"><br>
                        
                        <label for="nom_directeur_artistique">Nom du directeur artistique :</label>
                        <input type="text" name="nom_directeur_artistique" value="<?= $exposition["nom_directeur_artistique"] ?>"><br>
                        
                        <label for="email_directeur_artistique">Email du directeur artistique :</label>
                        <input type="email" name="email_directeur_artistique" value="<?= $exposition["email_directeur_artistique"] ?>"><br>
                        
                        <label for="nombre_oeuvres">Nombre d'œuvres :</label>
                        <input type="number" name="nombre_oeuvres" value="<?= $exposition["nombre_oeuvres"] ?>"><br>
                        
                        <label for="id_theme">ID du thème :</label>
                        <input type="number" name="id_theme" value="<?= $exposition["id_theme"] ?>"><br>
                        
                        <button type="submit" name="modifier">Valider</button>
                    </div>
                </form>
            </div>
        <?php endforeach; ?>
    <?php else : ?>
        <p>Aucune exposition à afficher pour le moment.</p>
    <?php endif; ?>
</div>

<script>
    const modifierButtons = document.querySelectorAll('.modifier');
    modifierButtons.forEach(button => {
        button.addEventListener('click', () => {
            const modifierForm = button.parentElement.querySelector('.modifier-form');
            modifierForm.style.display = modifierForm.style.display === 'none' ? 'block' : 'none';
            button.style.display = 'none'; 
        });
    });
</script>
