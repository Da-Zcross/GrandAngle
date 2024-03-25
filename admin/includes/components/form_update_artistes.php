<?php
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
    $biographie_FR = $_POST["biographie_FR"];
    $biographie_EN = $_POST["biographie_en"];
    $biographie_DE = $_POST["biographie_de"];
    $biographie_RU = $_POST["biographie_ru"];
    $biographie_CH = $_POST["biographie_ch"];

    echo "Contenu de biographie_FR : " . $biographie_FR;
    echo "Contenu de biographie_EN : " . $biographie_EN;

    if (empty($biographie_FR)) {
        echo "La biographie en français est obligatoire.";
        exit;
    }


    
    $email_artiste = !empty($email_artiste) ? $email_artiste : null;
    $num_telephone = !empty($num_telephone) ? $num_telephone : null;
    $adresse_artiste = !empty($adresse_artiste) ? $adresse_artiste : null;
    $cp_artiste = !empty($cp_artiste) ? $cp_artiste : null;
    $ville_artiste = !empty($ville_artiste) ? $ville_artiste : null;
    $date_deces_artiste = !empty($date_deces_artiste) ? $date_deces_artiste : null;
    $biographie_FR = !empty($biographie_FR) ? $biographie_FR : null;
    $biographie_EN = !empty($biographie_EN) ? $biographie_EN : null;
    $biographie_DE = !empty($biographie_DE) ? $biographie_DE : null;
    $biographie_RU = !empty($biographie_RU) ? $biographie_RU : null;
    $biographie_CH = !empty($biographie_CH) ? $biographie_CH : null;


    $sql_update = "UPDATE artiste SET nom_artiste=:nom_artiste, prenom_artiste=:prenom_artiste, email_artiste=:email_artiste, num_telephone=:num_telephone, adresse_artiste=:adresse_artiste, cp_artiste=:cp_artiste, ville_artiste=:ville_artiste, date_naissance_artiste=:date_naissance_artiste, date_deces_artiste=:date_deces_artiste, biographie_FR=:biographie_FR, biographie_EN=:biographie_EN, biographie_DE=:biographie_DE, biographie_RU=:biographie_RU, biographie_CH=:biographie_CH WHERE id_artiste=:id_artiste";

    try {
        $requete_update = $db->prepare($sql_update);

        $requete_update->bindParam(':nom_artiste', $nom_artiste);
        $requete_update->bindParam(':prenom_artiste', $prenom_artiste);
        $requete_update->bindParam(':email_artiste', $email_artiste);
        $requete_update->bindParam(':num_telephone', $num_telephone);
        $requete_update->bindParam(':adresse_artiste', $adresse_artiste);
        $requete_update->bindParam(':cp_artiste', $cp_artiste);
        $requete_update->bindParam(':ville_artiste', $ville_artiste);
        $requete_update->bindParam(':date_naissance_artiste', $date_naissance_artiste);
        $requete_update->bindParam(':date_deces_artiste', $date_deces_artiste);
        $requete_update->bindParam(':biographie_FR', $biographie_FR);
        $requete_update->bindParam(':biographie_EN', $biographie_EN);
        $requete_update->bindParam(':biographie_DE', $biographie_DE);
        $requete_update->bindParam(':biographie_RU', $biographie_RU);
        $requete_update->bindParam(':biographie_CH', $biographie_CH);

        $requete_update->bindParam(':id_artiste', $id_artiste);

        $requete_update->execute();

        $message = "Les informations de l'artiste ont été mises à jour avec succès.";
        header("Location: {$_SERVER['PHP_SELF']}?id_artiste=$id_artiste");
        exit;
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
                    <input type="text" name="nom_artiste" id="nom_artiste" value="<?= $artiste['nom_artiste'] ?>">
                </div>
                <div class="inp_prenom">
                    <label for="prenom_artiste" class="prenom_artiste">Prenom <span>*</span></label>
                    <input type="text" name="prenom_artiste" id="prenom_artiste" value="<?= $artiste['prenom_artiste'] ?>">
                </div>
                <div class="inp_email">
                    <label for="email_artiste" class="email_artiste">E-mail</label>
                    <input type="email" name="email_artiste" id="email_artiste" placeholder="E-mail" value="<?= $artiste['email_artiste'] ?>">
                </div>
                <div class="inp_num_tel">
                    <label for="num_tel_artiste" class="num_tel_artiste">Numéro téléphone</label>
                    <input type="tel" name="num_tel_artiste" id="num_tel_artiste" placeholder="Numéro téléphone" value="<?= $artiste['num_telephone'] ?>">
                </div>
                <div class="inp_adresse">
                    <label for="adresse_artiste" class="adresse_artiste">Adresse</label>
                    <textarea name="adresse_artiste" id="adresse_artiste" cols="30" rows="6" placeholder="Adresse"><?= $artiste['adresse_artiste'] ?></textarea>
                </div>
            </div>

            <div class="window_info_right">
                <div class="inp_cp">
                    <label for="cp_artiste" class="cp_artiste">Code Postal</label>
                    <input type="text" name="cp_artiste" id="cp_artiste" placeholder="code postal" value="<?= $artiste['cp_artiste'] ?>">
                </div>
                <div class="inp_ville">
                    <label for="ville_artiste" class="ville_artiste">Ville</label>
                    <input type="text" name="ville_artiste" id="ville_artiste" placeholder="Ville" value="<?= $artiste['ville_artiste'] ?>">
                </div>
                <div class="inp_date_naissance">
                    <label for="date_naissance_artiste" class="date_naissance_artiste">Date de naissance <span>*</span></label>
                    <input type="date" name="date_naissance_artiste" id="date_naissance_artiste" placeholder="Date de naissance" value="<?= $artiste['date_naissance_artiste'] ?>">
                </div>
                <div class="inp_date_deces">
                    <label for="date_deces_artiste" class="date_deces_artiste">Date de décès</label>
                    <input type="date" name="date_deces_artiste" id="date_deces_artiste" placeholder="Date de décès" value="<?= $artiste['date_deces_artiste'] ?>">
                </div>
                <div class="inp_bio">
    <label for="biographie_fr" class="biographie_fr">Biographie (FR)</label>
    <textarea name="biographie_FR" id="biographie_fr" cols="30" rows="6" placeholder="Biographie en français"><?= $artiste['biographie_FR'] ?></textarea>

    <label for="biographie_en" class="biographie_en" style="display: none;">Biographie (EN)</label>
    <textarea name="biographie_EN" id="biographie_en" cols="30" rows="6" placeholder="Biographie en anglais" style="display: none;"><?= $artiste['biographie_EN'] ?></textarea>

    <label for="biographie_de" class="biographie_de" style="display: none;">Biographie (DE)</label>
    <textarea name="biographie_DE" id="biographie_de" cols="30" rows="6" placeholder="Biographie en allemand" style="display: none;"><?= $artiste['biographie_DE'] ?></textarea>

    <label for="biographie_ru" class="biographie_ru" style="display: none;">Biographie (RU)</label>
    <textarea name="biographie_RU" id="biographie_ru" cols="30" rows="6" placeholder="Biographie en russe" style="display: none;"><?= $artiste['biographie_RU'] ?></textarea>

    <label for="biographie_ch" class="biographie_ch" style="display: none;">Biographie (CH)</label>
    <textarea name="biographie_CH" id="biographie_ch" cols="30" rows="6" placeholder="Biographie en chinois" style="display: none;"><?= $artiste['biographie_CH'] ?></textarea>

    <div class="box_button_bio">
        <div class="button_bio"><button type="button" class="active" id="btn_fr">FRA</button></div>
        <div class="button_bio"><button type="button" id="btn_en">GBR</button></div>
        <div class="button_bio"><button type="button" id="btn_de">DEU</button></div>
        <div class="button_bio"><button type="button" id="btn_ru">RUS</button></div>
        <div class="button_bio"><button type="button" id="btn_ch">CHN</button></div>
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

<script>
    const boutonFrancais = document.getElementById('btn_fr');
    const boutonAnglais = document.getElementById('btn_en');
    const boutonAllemand = document.getElementById('btn_de');
    const boutonRusse = document.getElementById('btn_ru');
    const boutonChinois = document.getElementById('btn_ch');
    const zoneTexteFrancais = document.getElementById('biographie_fr');
    const zoneTexteAnglais = document.getElementById('biographie_en');
    const zoneTexteAllemand = document.getElementById('biographie_de');
    const zoneTexteRusse = document.getElementById('biographie_ru');
    const zoneTexteChinois = document.getElementById('biographie_ch');

    boutonFrancais.addEventListener('click', () => {
        afficherBiographie(zoneTexteFrancais);
    });

    boutonAnglais.addEventListener('click', () => {
        afficherBiographie(zoneTexteAnglais);
    });

    boutonAllemand.addEventListener('click', () => {
        afficherBiographie(zoneTexteAllemand);
    });

    boutonRusse.addEventListener('click', () => {
        afficherBiographie(zoneTexteRusse);
    });

    boutonChinois.addEventListener('click', () => {
        afficherBiographie(zoneTexteChinois);
    });

    function afficherBiographie(zoneTexte) {
        // Masquer toutes les zones de texte
        const zonesTexte = document.querySelectorAll('.inp_bio textarea');
        zonesTexte.forEach(zone => {
            zone.style.display = 'none';
        });

        // Afficher la zone de texte sélectionnée
        zoneTexte.style.display = 'block';

        // Mettre à jour la classe active du bouton correspondant
        const boutonsLangue = document.querySelectorAll('.box_button_bio button');
        boutonsLangue.forEach(bouton => {
            bouton.classList.remove('active');
        });
        zoneTexte.previousElementSibling.classList.add('active');
    }
</script>

