<?php

$postes = $db->query("SELECT id_poste, libelle_poste FROM postes");
$libelle_poste = $postes->fetchALL(PDO::FETCH_ASSOC);

$roles = $db->query("SELECT id_role, libelle_role FROM role");
$libelle_role = $roles->fetchAll(PDO::FETCH_ASSOC);

function set_collaborateur($db, $datas = [])
{
    $sql = "INSERT INTO `collaborateur` (`nom_collab`, `prenom_collab`, `email_collab`, `adresse_collab`, `cp_collab`, `ville_collab`, `mot_de_passe`, `id_role`, `id_poste`)
    VALUES (:nom_collab, :prenom_collab, :email_collab, :adresse_collab, :cp_collab, :ville_collab, :mot_de_passe, :id_role, :id_poste)";
    $exec = $db->prepare($sql);
    $exec->execute($datas);
    return $db->lastInsertId();
}

if (!empty($_POST)) {
    if (
        empty($_POST["nom_collab"]) || empty($_POST["prenom_collab"]) || empty($_POST["email_collab"]) || empty($_POST["mot_de_passe"]) || empty($_POST["id_role"]) || empty($_POST["id_poste"])
    ) {
        // Si les champs obligatoires ne sont pas remplis, vérifier s'il y a un nouveau rôle ou poste à ajouter
        if (!empty($_POST['new_role'])) {
            $nouveau_role = test_input($_POST['new_role']);
            // Insérer le nouveau rôle dans la base de données
            $db->exec("INSERT INTO role (libelle_role) VALUES ('$nouveau_role')");
            // Rediriger ou afficher un message indiquant que le rôle a été ajouté
        }

        if (!empty($_POST['new_poste'])) {
            $nouveau_poste = test_input($_POST['new_poste']);
            // Insérer le nouveau poste dans la base de données
            $db->exec("INSERT INTO postes (libelle_poste) VALUES ('$nouveau_poste')");
            // Rediriger ou afficher un message indiquant que le poste a été ajouté
        }

        // Rediriger ou afficher un message indiquant que le formulaire est incomplet
    } else {
        // Si les champs obligatoires sont remplis, traiter le formulaire normalement comme auparavant
        $nom_collab = test_input($_POST["nom_collab"]);
        $prenom_collab = test_input($_POST["prenom_collab"]);
        $email_collab = test_input($_POST["email_collab"]);
        $adresse_collab = !empty($_POST["adresse_collab"]) ? test_input($_POST["adresse_collab"]) : null;
        $cp_collab = !empty($_POST["cp_collab"]) ? test_input($_POST["cp_collab"]) : null;
        $ville_collab = !empty($_POST["ville_collab"]) ? test_input($_POST["ville_collab"]) : null;
        $id_role = test_input($_POST["id_role"]);
        $id_poste = test_input($_POST["id_poste"]);

        // Vérifier si le mot de passe respecte les critères
        $mot_de_passe = $_POST["mot_de_passe"];
        if (strlen($mot_de_passe) < 8 || !preg_match("/[A-Z]/", $mot_de_passe) || !preg_match("/[!@#$%^&*()\-_=+{};:,<.>]/", $mot_de_passe)) {
            die("Le mot de passe doit avoir au moins 8 caractères, inclure au moins une majuscule et un caractère spécial.");
        }

        $mot_de_passe_hash = password_hash($mot_de_passe, PASSWORD_ARGON2ID);

        // Insérer le collaborateur dans la base de données
        $data = [
            ':nom_collab' => $nom_collab,
            ':prenom_collab' => $prenom_collab,
            ':email_collab' => $email_collab,
            ':adresse_collab' => $adresse_collab,
            ':cp_collab' => $cp_collab,
            ':ville_collab' => $ville_collab,
            ':mot_de_passe' => $mot_de_passe_hash, // Utiliser le mot de passe hashé
            ':id_role' => $id_role,
            ':id_poste' => $id_poste
        ];

        $last_collaborateur = set_collaborateur($db, $data);

        header("Location: collaborateurs.php");
        exit;
    }
}

?>







<form class="window_modal" method="POST">

    <div class="window_main">
        <div class="window_head">
            <h2 class="title_form">Ajouter Collaborateur</h2>
        </div>

        <div class="window_info_bloc">
            <div class="window_info_left">
                <div class="inp_nom">
                    <label for="nom_collab" class="nom_collab">Nom <span>*</span></label>
                    <input type="text" name="nom_collab" id="nom_collab" placeholder="Nom">
                </div>
                <div class="inp_prenom">
                    <label for="prenom_collab" class="prenom_collab">Prenom <span>*</span></label>
                    <input type="text" name="prenom_collab" id="prenom_collab" placeholder="Prenom">
                </div>
                <div class="inp_email">
                    <label for="email_collab" class="email_collab">E-mail <span>*</span></label>
                    <input type="email" name="email_collab" id="email_collab" placeholder="E-mail">
                </div>
                <div class="inp_adresse">
                    <label for="adresse_collab" class="adresse_collab">Adresse</label>
                    <textarea name="adresse_collab" id="adresse_collab" cols="30" rows="6" placeholder="Adresse"></textarea>
                    <!-- <input type="text" name="email_collab" id="email_collab" placeholder="Adresse"> -->
                </div>
            </div>

            <div class="window_info_right">
                <div class="inp_cp">
                    <label for="cp_collab" class="cp_collab">Code Postal</label>
                    <input type="text" name="cp_collab" id="cp_collab" placeholder="code postal">
                </div>
                <div class="inp_ville">
                    <label for="ville_collab" class="ville_collab">Ville</label>
                    <input type="text" name="ville_collab" id="ville_collab" placeholder="Ville">
                </div>
                <div class="inp_pass">
                    <label for="pass_collab" class="pass_collab">Mot de Passe <span>*</span></label>
                    <input type="password" name="mot_de_passe" id="mot_de_passe_collab" placeholder="Mot de Passe">
                </div>
                <div class="inp_role">
                    <label for="role_collab" class="role_collab">Rôle <span>*</span></label>
                    <select name="id_role" id="role_collab">
                        <?php foreach ($libelle_role as $value) : ?>
                            <option value="<?= $value["id_role"] ?>"><?= $value["libelle_role"] ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="inp_new_role">
                        <label for="new_role" class="new_role">Nouveau Rôle</label>
                        <input type="text" name="new_role" id="new_role" placeholder="Nouveau Rôle">
                    </div>

                    <!-- <input type="text" name="email_collab" id="email_collab" placeholder="Role"> -->
                </div>
                <div class="inp_poste">
                    <label for="poste_collab" class="poste_collab">Poste <span>*</span></label>
                    <select name="id_poste" id="poste_collab">
                        <?php foreach ($libelle_poste as $value) : ?>
                            <option value="<?= $value["id_poste"] ?>"><?= $value["libelle_poste"] ?></option>
                        <?php endforeach; ?>
                    </select>
                    <!-- <input type="selector" name="email_collab" id="email_collab" placeholder="Poste"> -->
                </div>
                <div class="inp_new_poste">
                    <label for="new_poste" class="new_poste">Nouveau Poste</label>
                    <input type="text" name="new_poste" id="new_poste" placeholder="Nouveau Poste">
                </div>
            </div>
        </div>
        <div class="get_mit window_footer">
            <div class="box_button"><button type="submit">Ajouter</button></div>
        </div>
    </div>

    </div>
</form>