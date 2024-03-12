<?php
if (!isset($id_artiste) || empty($id_artiste)) {
    echo "ID artiste non valide.";
    exit; 
}

$id_artiste = $_GET["id_artiste"];
$sql = "SELECT * FROM artiste WHERE id_artiste = :id_artiste";

try {
    $requete = $db->prepare($sql);
    $requete->bindParam(":id_artiste", $id_artiste, PDO::PARAM_INT);
    $requete->execute();
    

    $artiste = $requete->fetch(PDO::FETCH_ASSOC);
    
    if (!$artiste) {
        echo "ID artiste non valide.";
        exit;
    }
} catch (PDOException $e) {
    echo 'Erreur lors de la récupération de l\'artiste : ' . $e->getMessage();
    exit;
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom_artiste = $_POST["nom_artiste"];
    $prenom_artiste = $_POST["prenom_artiste"];
    $email_artiste = $_POST["email_artiste"];
    $num_telephone = $_POST["num_tel_artiste"];
    $adresse_artiste = $_POST["adresse_artiste"];
    $cp_artiste = $_POST["cp_artiste"];
    $ville_artiste = $_POST["ville_artiste"];
    $date_naissance_artiste = $_POST["date_naissance_artiste"];
    $date_deces_artiste = $_POST["date_deces_artiste"];
    $biographie_fr = $_POST["biographie_fr"];
    
    $sql_update = "UPDATE artiste SET ";
    $params = array();

    if (!empty($nom_artiste)) {
        $sql_update .= "nom_artiste = :nom_artiste, ";
        $params[':nom_artiste'] = $nom_artiste;
    }
    if (!empty($prenom_artiste)) {
        $sql_update .= "prenom_artiste = :prenom_artiste, ";
        $params[':prenom_artiste'] = $prenom_artiste;
    }
    if (!empty($email_artiste)) {
        $sql_update .= "email_artiste = :email_artiste, ";
        $params[':email_artiste'] = $email_artiste;
    }
    
    $sql_update = rtrim($sql_update, ', ');
    
    $sql_update .= " WHERE id_artiste = :id_artiste";
    $params[':id_artiste'] = $id_artiste;
    
    try {
        $requete_update = $db->prepare($sql_update);
        
        foreach ($params as $key => &$value) {
            $requete_update->bindParam($key, $value);
        }
        
        $requete_update->execute();
        
        echo "Les informations de l'artiste ont été mises à jour avec succès.";
    } catch (PDOException $e) {
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