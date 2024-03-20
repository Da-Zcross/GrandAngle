<?php

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION["user"])) {
    // Rediriger vers une page d'erreur ou une autre page appropriée
    echo "Ceci n'est pas votre page de modification, dans 3 secondes vous reviendrez en arrière.";
    header("Refresh: 2; URL=collaborateurs.php");
    exit;
}

// Vérifier si l'utilisateur est admin ou s'il tente de modifier sa propre page
if ($_SESSION["user"]["id_role"] !== "ADMIN" && $_SESSION["user"]["id_collab"] != $_GET["id_collab"]) {
    // Rediriger vers une page d'erreur ou une autre page appropriée
    echo "Accès non autorisé pour cette action.";
    header("Refresh: 2; URL=collaborateurs.php");
    exit;
}

$id_role = $db->query("SELECT id_role, libelle_role FROM role");
$libelle_role = $id_role->fetchALL(PDO::FETCH_ASSOC);

$id_poste = $db->query("SELECT id_poste, libelle_poste FROM postes");
$libelle_poste = $id_poste->fetchALL(PDO::FETCH_ASSOC);

$id_collab = $_GET["id_collab"];
$sql = "SELECT * FROM collaborateur WHERE id_collab = :id_collab";

$id_collab = $_GET["id_collab"];

$sql = "SELECT collaborateur.*, postes.libelle_poste
FROM collaborateur
LEFT JOIN postes ON collaborateur.id_poste = postes.id_poste
WHERE collaborateur.id_collab = :id_collab";

try {
    $requete = $db->prepare($sql);
    $requete->bindParam(":id_collab", $id_collab, PDO::PARAM_INT);
    $requete->execute();
    $collab = $requete->fetch(PDO::FETCH_ASSOC);

    if (!$collab) {
        echo "ID artiste non valide.";
        exit;
    }
} catch (PDOException $e) {
    echo 'Erreur lors de la récupération de l\'artiste : ' . $e->getMessage();
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom_collab = $_POST["nom_collab"];
    $prenom_collab = $_POST["prenom_collab"];
    $email_collab = $_POST["email_collab"];
    $adresse_collab = $_POST["adresse_collab"];
    $cp_collab = $_POST["cp_collab"];
    $ville_collab = $_POST["ville_collab"];
    $id_role = $_POST["id_role"];
    $id_poste = $_POST["id_poste"];


    $adresse_collab = !empty($_POST["adresse_collab"]) ? test_input($_POST["adresse_collab"]) : null;
    $cp_collab = !empty($_POST["cp_collab"]) ? test_input($_POST["cp_collab"]) : null;
    $ville_collab = !empty($_POST["ville_collab"]) ? test_input($_POST["ville_collab"]) : null;


    // Vérifier si le mot de passe respecte les critères
    $mot_de_passe = $_POST["mot_de_passe"];
    if (strlen($mot_de_passe) < 8 || !preg_match("/[A-Z]/", $mot_de_passe) || !preg_match("/[!@#$%^&*()\-_=+{};:,<.>]/", $mot_de_passe)) {
        die("Le mot de passe doit avoir au moins 8 caractères, inclure au moins une majuscule et un caractère spécial.");
    }

    $mot_de_passe_hash = password_hash($mot_de_passe, PASSWORD_ARGON2ID);

    $sql_update = "UPDATE collaborateur SET nom_collab=:nom_collab, prenom_collab=:prenom_collab, email_collab=:email_collab, adresse_collab=:adresse_collab, cp_collab=:cp_collab, ville_collab=:ville_collab, mot_de_passe=:mot_de_passe, id_role=:id_role, id_poste=:id_poste WHERE id_collab=:id_collab";

    try {
        $requete_update = $db->prepare($sql_update);

        $requete_update->bindParam(':nom_collab', $nom_collab);
        $requete_update->bindParam(':prenom_collab', $prenom_collab);
        $requete_update->bindParam(':email_collab', $email_collab);
        $requete_update->bindParam(':adresse_collab', $adresse_collab);
        $requete_update->bindParam(':cp_collab', $cp_collab);
        $requete_update->bindParam(':ville_collab', $ville_collab);
        $requete_update->bindParam(':mot_de_passe', $mot_de_passe_hash);
        $requete_update->bindParam(':id_role', $id_role);
        $requete_update->bindParam(':id_poste', $id_poste);
        $requete_update->bindParam(':id_collab', $id_collab);

        $requete_update->execute();

        $message = "Les informations de l'artiste ont été mises à jour avec succès.";
        header("Location: {$_SERVER['PHP_SELF']}?id_artiste=$id_collab");
        exit;
    } catch (PDOException $e) {
        echo 'Erreur lors de la mise à jour de l\'artiste : ' . $e->getMessage();
    }
}
?>


<form class="window_modal" method="POST">

    <div class="window_main">
        <div class="window_head">
            <h2 class="title_form">Modifier Collaborateur</h2>
        </div>

        <div class="window_info_bloc">
            <div class="window_info_left">
                <div class="inp_nom">
                    <label for="nom_collab" class="nom_collab">Nom <span>*</span></label>
                    <input type="text" name="nom_collab" id="nom_collab" placeholder="Nom" value="<?= $collab['nom_collab'] ?>">
                </div>
                <div class="inp_prenom">
                    <label for="prenom_collab" class="prenom_collab">Prenom <span>*</span></label>
                    <input type="text" name="prenom_collab" id="prenom_collab" placeholder="Prenom" value="<?= $collab['prenom_collab'] ?>">
                </div>
                <div class="inp_email">
                    <label for="email_collab" class="email_collab">E-mail <span>*</span></label>
                    <input type="email" name="email_collab" id="email_collab" placeholder="E-mail" value="<?= $collab['email_collab'] ?>">
                </div>
                <div class="inp_adresse">
                    <label for="adresse_collab" class="adresse_collab">Adresse</label>
                    <textarea name="adresse_collab" id="adresse_collab" cols="30" rows="6" placeholder="Adresse" value="<?= $collab['adresse_collab'] ?>"></textarea>
                    <!-- <input type="text" name="email_collab" id="email_collab" placeholder="Adresse"> -->
                </div>
            </div>

            <div class="window_info_right">
                <div class="inp_cp">
                    <label for="cp_collab" class="cp_collab">Code Postal</label>
                    <input type="text" name="cp_collab" id="cp_collab" placeholder="code postal" value="<?= $collab['cp_collab'] ?>">
                </div>
                <div class="inp_ville">
                    <label for="ville_collab" class="ville_collab">Ville</label>
                    <input type="text" name="ville_collab" id="ville_collab" placeholder="Ville" value="<?= $collab['ville_collab'] ?>">
                </div>
                <div class="inp_pass">
                    <label for="pass_collab" class="pass_collab">Mot de Passe <span>*</span></label>
                    <input type="password" name="mot_de_passe" id="mot_de_passe_collab" placeholder="Mot de Passe" value="<?= $collab['mot_de_passe'] ?>">
                </div>
                <div class="inp_role">
                <?php if ($_SESSION["user"]["id_role"] === "ADMIN") : ?>

                    <label for="role_collab" class="role_collab">Rôle <span>*</span></label>
                    <select name="id_role" id="role_collab">
                        <?php foreach ($libelle_role as $value) : ?>
                            <option value="<?= $value["id_role"] ?>" <?= ($collab["id_role"] == $value["id_role"]) ? "selected" : "" ?>>
                                <?= $value["libelle_role"] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <?php endif; ?>

                    <!-- <input type="text" name="email_collab" id="email_collab" placeholder="Role"> -->
                </div>
                
                <div class="inp_poste">
                <?php if ($_SESSION["user"]["id_role"] === "ADMIN") : ?>

                    <label for="poste_collab" class="poste_collab">Poste <span>*</span></label>
                    <select name="id_poste" id="poste_collab">
                        <?php foreach ($libelle_poste as $value) : ?>
                            <option value="<?= $value["id_poste"] ?>" <?= ($collab["id_poste"] == $value["id_poste"]) ? "selected" : "" ?>>
                                <?= $value["libelle_poste"] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <?php endif; ?>

                    <!-- <input type="selector" name="email_collab" id="email_collab" placeholder="Poste"> -->
                </div>
            </div>
        </div>
        <div class="get_mit window_footer">
            <div class="box_button"><button type="submit">Valider</button></div>
        </div>
    </div>

    </div>
</form>