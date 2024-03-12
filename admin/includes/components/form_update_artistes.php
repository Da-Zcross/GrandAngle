<?php
// Assurez-vous que $id_artiste est défini et non vide
if (!isset($_GET["id_artiste"]) || empty($_GET["id_artiste"])) {
    echo "ID artiste non valide.";
    exit; // Arrête l'exécution du script si l'ID de l'artiste n'est pas valide
}

$id_artiste = $_GET["id_artiste"];

// Requête SQL pour récupérer les données de l'artiste
$sql = "SELECT * FROM artiste WHERE id_artiste = :id_artiste";

try {
    // Préparation et exécution de la requête SQL
    $requete = $db->prepare($sql);
    $requete->bindParam(":id_artiste", $id_artiste, PDO::PARAM_INT);
    $requete->execute();
    
    // Récupération des données de l'artiste
    $artiste = $requete->fetch(PDO::FETCH_ASSOC);
    
    // Vérification si l'artiste existe
    if (!$artiste) {
        echo "ID artiste non valide.";
        exit;
    }
} catch (PDOException $e) {
    // Gestion des erreurs s'il y a des problèmes avec la requête SQL
    echo 'Erreur lors de la récupération de l\'artiste : ' . $e->getMessage();
    exit;
}

// Traitement du formulaire de modification lorsque soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des valeurs du formulaire
    $nom_artiste = $_POST["nom_artiste"];
    $prenom_artiste = $_POST["prenom_artiste"];
    $email_artiste = $_POST["email_artiste"];

    // Vérifier si les champs obligatoires sont vides
    if (empty($nom_artiste) || empty($prenom_artiste) || empty($email_artiste)) {
        echo "Les champs Nom, Prénom et Email sont obligatoires.";
        exit;
    }

    // Requête SQL pour mettre à jour les informations de l'artiste
    $sql_update = "UPDATE artiste 
                   SET nom_artiste = :nom_artiste, 
                       prenom_artiste = :prenom_artiste, 
                       email_artiste = :email_artiste";

    // Ajouter les autres champs à la requête uniquement s'ils ne sont pas vides
    if (!empty($_POST["num_tel_artiste"])) {
        $sql_update .= ", num_telephone = :num_telephone";
    }

    if (!empty($_POST["adresse_artiste"])) {
        $sql_update .= ", adresse_artiste = :adresse_artiste";
    }

    if (!empty($_POST["cp_artiste"])) {
        $sql_update .= ", cp_artiste = :cp_artiste";
    }

    if (!empty($_POST["ville_artiste"])) {
        $sql_update .= ", ville_artiste = :ville_artiste";
    }

    if (!empty($_POST["date_naissance_artiste"])) {
        $sql_update .= ", date_naissance_artiste = :date_naissance_artiste";
    }

    if (!empty($_POST["date_deces_artiste"])) {
        $sql_update .= ", date_deces_artiste = :date_deces_artiste";
    }

    if (!empty($_POST["biographie_fr"])) {
        $sql_update .= ", biographie_fr = :biographie_fr";
    }

    // Clôture de la requête SQL
    $sql_update .= " WHERE id_artiste = :id_artiste";

    try {
        // Préparation de la requête SQL de mise à jour
        $requete_update = $db->prepare($sql_update);
        
        // Liaison des paramètres
        $requete_update->bindParam(":nom_artiste", $nom_artiste);
        $requete_update->bindParam(":prenom_artiste", $prenom_artiste);
        $requete_update->bindParam(":email_artiste", $email_artiste);

        // Ajouter les autres liaisons de paramètres uniquement s'ils ne sont pas vides
        if (!empty($_POST["num_tel_artiste"])) {
            $requete_update->bindParam(":num_telephone", $_POST["num_tel_artiste"]);
        }

        if (!empty($_POST["adresse_artiste"])) {
            $requete_update->bindParam(":adresse_artiste", $_POST["adresse_artiste"]);
        }

        if (!empty($_POST["cp_artiste"])) {
            $requete_update->bindParam(":cp_artiste", $_POST["cp_artiste"]);
        }

        if (!empty($_POST["ville_artiste"])) {
            $requete_update->bindParam(":ville_artiste", $_POST["ville_artiste"]);
        }

        if (!empty($_POST["date_naissance_artiste"])) {
            $requete_update->bindParam(":date_naissance_artiste", $_POST["date_naissance_artiste"]);
        }

        if (!empty($_POST["date_deces_artiste"])) {
            $requete_update->bindParam(":date_deces_artiste", $_POST["date_deces_artiste"]);
        }

        if (!empty($_POST["biographie_fr"])) {
            $requete_update->bindParam(":biographie_fr", $_POST["biographie_fr"]);
        }

        $requete_update->bindParam(":id_artiste", $id_artiste);
        
        // Exécution de la requête de mise à jour
        $requete_update->execute();

         // Redirection vers la page précédente
    header("Location: updating_artiste.php?id_artiste=" . $id_artiste);
    exit; // Assure que le script s'arrête ici pour éviter toute exécution supplémentaire
        
        echo "Les informations de l'artiste ont été mises à jour avec succès.";
    } catch (PDOException $e) {
        // Gestion des erreurs s'il y a des problèmes avec la requête SQL de mise à jour
        echo 'Erreur lors de la mise à jour de l\'artiste : ' . $e->getMessage();
    }
}
?>





<form class="window_modal" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir modifier cet artiste ?')">

        <div class="window_main">
            <div class="window_head">
                <h2 class="title_form">Modifier Artiste</h2>
            </div>

            <div class="window_info_bloc">
                <div class="window_info_left">
                    <div class="inp_nom">
                        <label for="nom_artiste" class="nom_artiste">Nom <span>*</span></label>
                        <input type="text" name="nom_artiste" id="nom_artiste" value="<?= $artiste['nom_artiste']?>">
                    </div>
                    <div class="inp_prenom">
                        <label for="prenom_artiste" class="prenom_artiste">Prenom <span>*</span></label>
                        <input type="text" name="prenom_artiste" id="prenom_artiste" value="<?= $artiste['prenom_artiste']?>">
                    </div>
                    <div class="inp_email">
                        <label for="email_artiste" class="email_artiste">E-mail</label>
                        <input type="email" name="email_artiste" id="email_artiste" placeholder="E-mail" value="<?= $artiste['email_artiste']?>">
                    </div>
                    <div class="inp_num_tel">
                        <label for="num_tel_artiste" class="num_tel_artiste">Numéro téléphone</label>
                        <input type="tel" name="num_tel_artiste" id="num_tel_artiste" placeholder="Numéro téléphone" value="<?= $artiste['num_telephone']?>">
                    </div>
                    <div class="inp_adresse">
                        <label for="adresse_artiste" class="adresse_artiste">Adresse</label>
                        <textarea name="adresse_artiste" id="adresse_artiste" cols="30" rows="6"
                            placeholder="Adresse"><?= $artiste['adresse_artiste']?></textarea>
                    </div>
                </div>

                <div class="window_info_right">
                    <div class="inp_cp">
                        <label for="cp_artiste" class="cp_artiste">Code Postal</label>
                        <input type="text" name="cp_artiste" id="cp_artiste" placeholder="code postal" value="<?= $artiste['cp_artiste']?>">
                    </div>
                    <div class="inp_ville">
                        <label for="ville_artiste" class="ville_artiste">Ville</label>
                        <input type="text" name="ville_artiste" id="ville_artiste" placeholder="Ville" value="<?= $artiste['ville_artiste']?>">
                    </div>
                    <div class="inp_date_naissance">
                        <label for="date_naissance_artiste" class="date_naissance_artiste">Date de naissance <span>*</span></label>
                        <input type="date" name="date_naissance_artiste" id="date_naissance_artiste" placeholder="Date de naissance" value="<?= $artiste['date_naissance_artiste']?>">
                    </div>
                    <div class="inp_date_deces">
                        <label for="date_deces_artiste" class="date_deces_artiste">Date de décès</label>
                        <input type="date" name="date_deces_artiste" id="date_deces_artiste" placeholder="Date de décès" value="<?= $artiste['date_deces_artiste']?>">
                    </div>
                    <div class="inp_bio">
                        <label for="biographie_fr" class="biographie_fr">Biographie</label>
                        <textarea name="biographie_fr" id="biographie_fr" cols="30" rows="6"
                            placeholder="Biographie"><?= $artiste['biographie_fr']?></textarea>
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
                <div class="box_button"><button type="submit">Modifier</button></div>
            </div>
        </div>

        </div>
    </form>