<?php

$postes = $db->query("SELECT id_poste, libelle_poste FROM postes");
$libelle_poste = $postes->fetchALL(PDO::FETCH_ASSOC);

function set_collaborateur($db, $datas = [])
{
    $sql = "INSERT INTO `collaborateur` (`nom_collab`, `prenom_collab`, `email_collab`, `adresse_collab`, `cp_collab`, `ville_collab`, `mot_de_passe`, `roles`, `id_poste`)
    VALUES (:nom_collab, :prenom_collab, :email_collab, :adresse_collab, :cp_collab, :ville_collab, :mot_de_passe, :roles, :id_poste)";
    $exec = $db->prepare($sql);
    $exec->execute($datas);
    return $db->lastInsertId();
}


if (!empty($_POST)) {
    if (
        isset($_POST["nom_collab"], $_POST["prenom_collab"], $_POST["email_collab"], $_POST["mot_de_passe"], $_POST["roles"], $_POST["id_poste"])
        && !empty($_POST["nom_collab"]) && !empty($_POST["prenom_collab"]) && !empty($_POST["email_collab"]) && !empty($_POST["mot_de_passe"]) && !empty($_POST["roles"]) && !empty($_POST["id_poste"])

    ) {
        $nom_collab = test_input($_POST["nom_artiste"]);
        $prenom_collab = test_input($_POST["prenom_artiste"]);
        $email_collab = !empty($_POST["date_deces_artiste"]) ? test_input($_POST["email_artiste"]) : null;
        $adresse_collab = !empty($_POST["num_telephone"]) ? test_input($_POST["num_telephone"]) : null;
        $cp_collab = !empty($_POST["artiste_artiste"]) ? test_input($_POST["adresse_artiste"]) : null;
        $ville_collab = !empty($_POST["cp_artiste"]) ? test_input($_POST["cp_artiste"]) : null;
        $ville_artiste = !empty($_POST["ville_artiste"]) ? test_input($_POST["ville_artiste"]) : null;
        $date_naissance_artiste = test_input($_POST["date_naissance_artiste"]);
        $date_deces_artiste = !empty($_POST["date_deces_artiste"]) ? test_input($_POST["date_deces_artiste"]) : null;
        $biographie_fr = !empty($_POST["biographie_fr"]) ? test_input($_POST["biographie_fr"]) : null;

        $data = [
            ':nom_artiste' => $nom_artiste,
            ':prenom_artiste' => $prenom_artiste,
            ':email_artiste' => $email_artiste,
            ':num_telephone' => $num_telephone,
            ':adresse_artiste' => $adresse_artiste,
            ':cp_artiste' => $cp_artiste,
            ':ville_artiste' => $ville_artiste,
            ':date_naissance_artiste' => $date_naissance_artiste,
            ':date_deces_artiste' => $date_deces_artiste,
            ':biographie_fr' => $biographie_fr
        ];

        $last_artiste = set_collaborateur($db, $data);

        header("Location: artistes.php");
        exit;
    } else {
        die("Le formulaire est incomplet");
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
                        <textarea name="adresse_collab" id="adresse_collab" cols="30" rows="6"
                            placeholder="Adresse"></textarea>
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
                        <input type="password" name="mot_de_passe_collab" id="mot_de_passe_collab"
                            placeholder="Mot de Passe">
                    </div>
                    <div class="inp_role">
                        <label for="role_collab" class="role_collab">Rôle <span>*</span></label>
                        <select name="role_collab" id="role_collab"></select>
                        <!-- <input type="text" name="email_collab" id="email_collab" placeholder="Role"> -->
                    </div>
                    <div class="inp_poste">
                        <label for="poste_collab" class="poste_collab">Poste <span>*</span></label>
                        <select name="poste_collab" id="poste_collab"></select>
                        <!-- <input type="selector" name="email_collab" id="email_collab" placeholder="Poste"> -->
                    </div>
                </div>
            </div>
            <div class="get_mit window_footer">
                <div class="box_button"><button type="submit">Ajouter</button></div>
            </div>
        </div>

        </div>
    </form>