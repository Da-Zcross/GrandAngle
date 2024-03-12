<?php

if (!empty($_POST)) {
    if (
        isset($_POST["nom_artiste"], $_POST["prenom_artiste"], $_POST["date_naissance_artiste"])
        && !empty($_POST["nom_artiste"])
        && !empty($_POST["prenom_artiste"])
        && !empty($_POST["date_naissance_artiste"])

    ) {
        $nom_artiste = test_input($_POST["nom_artiste"]);
        $prenom_artiste = test_input($_POST["prenom_artiste"]);
        $email_artiste = test_input($_POST["email_artiste"]);
        $num_telephone = test_input($_POST["num_telephone"]);
        $adresse_artiste = test_input($_POST["adresse_artiste"]);
        $cp_artiste = test_input($_POST["cp_artiste"]);
        $ville_artiste = test_input($_POST["ville_artiste"]);
        $date_naissance_artiste = test_input($_POST["date_naissance_artiste"]);
        $date_deces_artiste = test_input($_POST["date_deces_artiste"]);
        $biographie_fr = test_input($_POST["biographie_fr"]);

        if (empty(trim($_POST["biographie_fr"]))) {
            $errors["biographie_fr"] = "La biographie est requise.";
        }

        if (!filter_var($_POST["email_artiste"], FILTER_VALIDATE_EMAIL)) {
            $mailErr = "message";
        }

        if (!preg_match("/^[a-zA-Z- ']*$/", $nom_artiste)) {
            $nomErr = "message";

            ////^ : Cela indique que le motif recherché doit commencer au début de la chaîne.
        }


        require_once "../config/pdo.php";
        $roles = json_encode(["ROLE_ADMIN"]);
        $sql = "INSERT INTO artiste (nom_artiste, prenom_artiste, email_artiste, num_telephone, adresse_artiste, cp_artiste, ville_artiste, date_naissance_artiste, date_deces_artiste, biographie_fr) VALUES (:nom_artiste, :prenom_artiste, :email_artiste, :num_telephone, :adresse_artiste, :cp_artiste, :ville_artiste, :date_naissance_artiste, :date_deces_artiste, :biographie_fr)";
        $query = $db->prepare($sql);
        $query->bindValue(":nom_artiste", $nom_artiste, PDO::PARAM_STR);
        $query->bindValue(":prenom_artiste", $prenom_artiste, PDO::PARAM_STR);
        $query->bindValue(":email_artiste", $_POST["email_artiste"], PDO::PARAM_STR);
        $query->bindValue(":num_telephone", $num_telephone, PDO::PARAM_STR);
        $query->bindValue(":adresse_artiste", $adresse_artiste, PDO::PARAM_STR);
        $query->bindValue(":cp_artiste", $cp_artiste, PDO::PARAM_STR);
        $query->bindValue(":ville_artiste", $ville_artiste, PDO::PARAM_STR);
        $query->bindValue(":date_naissance_artiste", $date_naissance_artiste, PDO::PARAM_STR);
        $query->bindValue(":date_deces_artiste", $date_deces_artiste, PDO::PARAM_STR);
        $query->bindValue(":biographie_fr", $biographie_fr, PDO::PARAM_STR);
        $query->execute();
        $id = $db->lastInsertId();

        $_SESSION["user"] = [
            "id_artiste" => $id_artiste,
            "nom_artiste" => $nom_artiste,
            "prenom_artiste" => $prenom_artiste,
            "email_artiste" => $_POST["email_artiste"],
            "num_telephone" => $num_telephone,
            "adresse_artiste" => $adresse_artiste,
            "cp_artiste" => $cp_artiste,
            "ville_artiste" => $ville_artiste,
            "date_naissance_artiste" => $date_naissance_artiste,
            "date_deces_artiste" => $date_deces_artiste,
            "biographie_fr" => $biographie_fr

        ];


        header("Location: artistes.php");
        exit;
    } else {

        die("Le formulaire est incomplet");
    }
};
?>

<form class="window_modal" method="POST">

    <div class="window_main">
        <div class="window_head">
            <h2 class="title_form">Ajouter Artiste</h2>
        </div>

        <div class="window_info_bloc">
            <div class="window_info_left">
                <div class="inp_nom">
                    <label for="nom_artiste" class="nom_artiste">Nom <span>*</span></label>
                    <input type="text" name="nom_artiste" id="nom_artiste" placeholder="Nom">
                </div>
                <div class="inp_prenom">
                    <label for="prenom_artiste" class="prenom_artiste">Prenom <span>*</span></label>
                    <input type="text" name="prenom_artiste" id="prenom_artiste" placeholder="Prenom">
                </div>
                <div class="inp_email">
                    <label for="email_artiste" class="email_artiste">E-mail</label>
                    <input type="email" name="email_artiste" id="email_artiste" placeholder="E-mail">
                </div>
                <div class="inp_num_tel">
                    <label for="num_telephone" class="num_telephone">Numéro téléphone</label>
                    <input type="tel" name="num_telephone" id="num_telephone" placeholder="Numéro téléphone">
                </div>
                <div class="inp_adresse">
                    <label for="adresse_artiste" class="adresse_artiste">Adresse</label>
                    <textarea name="adresse_artiste" id="adresse_artiste" cols="30" rows="6" placeholder="Adresse"></textarea>
                </div>
            </div>

            <div class="window_info_right">
                <div class="inp_cp">
                    <label for="cp_artiste" class="cp_artiste">Code Postal</label>
                    <input type="text" name="cp_artiste" id="cp_artiste" placeholder="code postal">
                </div>
                <div class="inp_ville">
                    <label for="ville_artiste" class="ville_artiste">Ville</label>
                    <input type="text" name="ville_artiste" id="ville_artiste" placeholder="Ville">
                </div>
                <div class="inp_date_naissance">
                    <label for="date_naissance_artiste" class="date_naissance_artiste">Date de naissance <span>*</span></label>
                    <input type="date" name="date_naissance_artiste" id="date_naissance_artiste" placeholder="Date de naissance">
                </div>
                <div class="inp_date_deces">
                    <label for="date_deces_artiste" class="date_deces_artiste">Date de décès</label>
                    <input type="date" name="date_deces_artiste" id="date_deces_artiste" placeholder="Date de décès">
                </div>
                <div class="inp_bio">
                    <label for="biographie_fr" class="biographie_fr">Biographie</label>
                    <textarea name="biographie_fr" id="biographie_fr" cols="30" rows="6" placeholder="Biographie"></textarea>
                    <div class="box_button_bio">
                        <div class="button_bio"><button type="">FRA</button></div>
                        <div class="button_bio"><button type="">GBR</button></div>
                        <div class="button_bio"><button type="">DEU</button></div>
                        <div class="button_bio"><button type="">RUS</button></div>
                        <div class="button_bio"><button type="">CHN</button></div>
                    </div>
                </div>

            </div>
        </div>
        <div class="get_mit window_footer">
            <div class="box_button"><button type="submit">Ajouter</button></div>
        </div>
    </div>

    </div>
</form>