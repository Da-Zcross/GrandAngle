<?php
session_start();
if(isset($_SESSION["user"])) {
    header("Location: connexion.php");
    exit;
}
$titre = "Connexion Collaborateur";
$nav = "connexion";

if(!empty($_POST)) {
    if(isset($_POST["email_collab"], $_POST["mot_de_passe"])
    && !empty($_POST["email_collab"])
    && !empty($_POST["mot_de_passe"])
    ){
        if(!filter_var($_POST["email_collab"], FILTER_VALIDATE_EMAIL)) {
                // error
        }

        require_once "../config/pdo.php";
        $sql = "SELECT * FROM collaborateur WHERE email_collab=:email_collab";
        $query = $db->prepare($sql);
        $query->bindValue(":email_collab", $_POST["email_collab"], PDO::PARAM_STR);
        $query->execute();
        $user = $query->fetch();

        if (!$user){
            die("Utilisateur et/ou mot de passe incorrect");
        }

        if (password_verify($_POST["mot_de_passe"], $user["mot_de_passe"])) {
            die("User Fuck Off !");
        }

        // $roleArray = json_decode($user["id_roles"], true);

        $_SESSION["user"] = [
            "id_collab" => $user["id_collab"],
            "nom_collab" => $user["nom_collab"],
            "prenom_collab"=> $user["prenom_collab"],
            "email_collab" => $_POST["email_collab"],
            "mot_de_passe" => $user["mot_de_passe"],
            // "id_roles" => $roleArray["id_roles"]
                ];

        header("Location: dashboard.php");
    }
    else{
        die("Oups!! Wrong Way Bob !");
    }
}
include "includes/pages/header.php";
;?>



<div class="form_co">
                <form class="bloc_form" method="POST">
                    <h2 class="title_form">Connexion Admin</h2>
                    <div class="inp_mail">
                        <label for="email_collab"></label>
                        <input type="email" name="email_collab" id="email_collab" placeholder="E-mail">
                    </div>
                    <div class="inp_pass">
                        <label for="pass"></label>
                        <input type="password" name="mot_de_passe" id="mot_de_passe" placeholder="Mot de Passe">
                    </div>
                    <div class="get_mit">
                        <button type="submit">Se connecter</button>
                        <a class="forget" href="#">Mot de passe oublié ?</a>
                    </div>
                </form>
            </div>