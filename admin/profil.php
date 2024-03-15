<?php
session_start();
require_once "../config/pdo.php";

$titre = "Profil";
$nav = "profil";

include "includes/pages/header.php";
include "includes/pages/sidebar_left.php";

if (!isset($_SESSION["user"])) {
    header("Location: connexion.php");
    exit;
}
$user = $_SESSION["user"];

$error_message = '';
$success_message = '';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["annuler"])) {
        try {
            $sql = "SELECT collaborateur.*, postes.libelle_poste 
                    FROM collaborateur 
                    LEFT JOIN postes ON collaborateur.id_poste = postes.id_poste
                    WHERE id_collab = :id_collab";
            $stmt = $db->prepare($sql);
            $stmt->bindValue(":id_collab", $user["id_collab"], PDO::PARAM_INT);
            $stmt->execute();
            $collab_info = $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            $error_message = "Erreur de requête : " . $e->getMessage();
        }
    } elseif (isset($_POST["modifier"])) {
        try {
            $sql = "SELECT collaborateur.*, postes.libelle_poste 
                    FROM collaborateur 
                    LEFT JOIN postes ON collaborateur.id_poste = postes.id_poste
                    WHERE id_collab = :id_collab";
            $stmt = $db->prepare($sql);
            $stmt->bindValue(":id_collab", $user["id_collab"], PDO::PARAM_INT);
            $stmt->execute();
            $collab_info = $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            $error_message = "Erreur de requête : " . $e->getMessage();
        }
    } elseif (isset($_POST["valider"])) {
        
        // Vérification des champs requis sui sont  remplis
        if (!empty($_POST["nom_collab"]) && !empty($_POST["prenom_collab"]) && !empty($_POST["email_collab"]) && !empty($_POST["adresse_collab"]) && !empty($_POST["cp_collab"]) && !empty($_POST["ville_collab"]) && !empty($_POST["id_poste"]) && !empty($_POST["roles"])) {
            $nom_collab = $_POST["nom_collab"];
            $prenom_collab = $_POST["prenom_collab"];
            $email_collab = $_POST["email_collab"];
            $adresse_collab = $_POST["adresse_collab"];
            $cp_collab = $_POST["cp_collab"];
            $ville_collab = $_POST["ville_collab"];
            $id_poste = $_POST["id_poste"];
            $roles = $_POST["roles"];

            try {
                $sql = "UPDATE collaborateur 
                        SET nom_collab = :nom_collab, prenom_collab = :prenom_collab, email_collab = :email_collab, adresse_collab = :adresse_collab, cp_collab = :cp_collab, ville_collab = :ville_collab, id_poste = :id_poste, roles = :roles 
                        WHERE id_collab = :id_collab";
                $stmt = $db->prepare($sql);
                $stmt->bindValue(":nom_collab", $nom_collab, PDO::PARAM_STR);
                $stmt->bindValue(":prenom_collab", $prenom_collab, PDO::PARAM_STR);
                $stmt->bindValue(":email_collab", $email_collab, PDO::PARAM_STR);
                $stmt->bindValue(":adresse_collab", $adresse_collab, PDO::PARAM_STR);
                $stmt->bindValue(":cp_collab", $cp_collab, PDO::PARAM_INT);
                $stmt->bindValue(":ville_collab", $ville_collab, PDO::PARAM_STR);
                $stmt->bindValue(":id_poste", $id_poste, PDO::PARAM_INT);
                $stmt->bindValue(":roles", $roles, PDO::PARAM_STR);
                $stmt->bindValue(":id_collab", $user["id_collab"], PDO::PARAM_INT);
                $stmt->execute();

                $success_message = "Modifications enregistrées avec succès.";
                
                // Réactualisation  des informations du profil
                $sql = "SELECT collaborateur.*, postes.libelle_poste 
                        FROM collaborateur 
                        LEFT JOIN postes ON collaborateur.id_poste = postes.id_poste
                        WHERE id_collab = :id_collab";
                $stmt = $db->prepare($sql);
                $stmt->bindValue(":id_collab", $user["id_collab"], PDO::PARAM_INT);
                $stmt->execute();
                $collab_info = $stmt->fetch(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                $error_message = "Erreur de modification : " . $e->getMessage();
            }
        } else {
            $error_message = "Veuillez remplir tous les champs.";
        }
    }
} else {
    // Récupération des  informations du profil
    try {
        $sql = "SELECT collaborateur.*, postes.libelle_poste 
                FROM collaborateur 
                LEFT JOIN postes ON collaborateur.id_poste = postes.id_poste
                WHERE id_collab = :id_collab";
        $stmt = $db->prepare($sql);
        $stmt->bindValue(":id_collab", $user["id_collab"], PDO::PARAM_INT);
        $stmt->execute();
        $collab_info = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        $error_message = "Erreur de requête : " . $e->getMessage();
    }
}
?>

<main>
    <h1><?php echo $titre; ?></h1>
    <div>
        <form method="post">
            <div>
                <label for="nom_collab">Nom :</label>
                <?php if (isset($_POST['modifier'])) : ?>
                    <input type="text" id="nom_collab" name="nom_collab" value="<?php echo $collab_info['nom_collab']; ?>" required>
                <?php else : ?>
                    <span><?php echo $collab_info['nom_collab']; ?></span>
                <?php endif; ?>
            </div>
            <div>
                <label for="prenom_collab">Prénom :</label>
                <?php if (isset($_POST['modifier'])) : ?>
                    <input type="text" id="prenom_collab" name="prenom_collab" value="<?php echo $collab_info['prenom_collab']; ?>" required>
                <?php else : ?>
                    <span><?php echo $collab_info['prenom_collab']; ?></span>
                <?php endif; ?>
            </div>
            <div>
                <label for="email_collab">E-mail :</label>
                <?php if (isset($_POST['modifier'])) : ?>
                    <input type="email" id="email_collab" name="email_collab" value="<?php echo $collab_info['email_collab']; ?>" required>
                <?php else : ?>
                    <span><?php echo $collab_info['email_collab']; ?></span>
                <?php endif; ?>
            </div>
            <div>
                <label for="adresse_collab">Adresse :</label>
                <?php if (isset($_POST['modifier'])) : ?>
                    <input type="text" id="adresse_collab" name="adresse_collab" value="<?php echo $collab_info['adresse_collab']; ?>" required>
                <?php else : ?>
                    <span><?php echo $collab_info['adresse_collab']; ?></span>
                <?php endif; ?>
            </div>
            <div>
                <label for="cp_collab">Code postal :</label>
                <?php if (isset($_POST['modifier'])) : ?>
                    <input type="text" id="cp_collab" name="cp_collab" value="<?php echo $collab_info['cp_collab']; ?>" required>
                <?php else : ?>
                    <span><?php echo $collab_info['cp_collab']; ?></span>
                <?php endif; ?>
            </div>
            <div>
                <label for="ville_collab">Ville :</label>
                <?php if (isset($_POST['modifier'])) : ?>
                    <input type="text" id="ville_collab" name="ville_collab" value="<?php echo $collab_info['ville_collab']; ?>" required>
                <?php else : ?>
                    <span><?php echo $collab_info['ville_collab']; ?></span>
                <?php endif; ?>
            </div>
            <div>
                <label for="id_poste">Poste :</label>
                <?php if (isset($_POST['modifier'])) : ?>
                    <select id="id_poste" name="id_poste" required>
                        <?php
                        $sql = "SELECT * FROM postes";
                        $stmt = $db->query($sql);
                        $postes = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($postes as $poste) {
                            $selected = ($poste['id_poste'] == $collab_info['id_poste']) ? 'selected' : '';
                            echo "<option value='{$poste['id_poste']}' $selected>{$poste['libelle_poste']}</option>";
                        }
                        ?>
                    </select>
                <?php else : ?>
                    <span><?php echo $collab_info['libelle_poste']; ?></span>
                <?php endif; ?>
            </div>
            <div>
                <label for="roles">Rôles :</label>
                <?php if (isset($_POST['modifier'])) : ?>
                    <input type="text" id="roles" name="roles" value="<?php echo $collab_info['roles']; ?>" required>
                <?php else : ?>
                    <span><?php echo $collab_info['roles']; ?></span>
                <?php endif; ?>
            </div>
            <?php if (isset($_POST['modifier'])) : ?>
                <div>
                    <button type="submit" name="valider">Valider les modifications</button>
                    <button type="submit" name="annuler">Annuler</button>
                </div>
            <?php else : ?>
                <div>
                    <button type="submit" name="modifier">Modifier</button>
                </div>
            <?php endif; ?>
            <?php if (!empty($error_message)) : ?>
                <p><?php echo $error_message; ?></p>
            <?php elseif (!empty($success_message)) : ?>
                <p><?php echo $success_message; ?></p>
            <?php endif; ?>
        </form>
    </div>
</main>
