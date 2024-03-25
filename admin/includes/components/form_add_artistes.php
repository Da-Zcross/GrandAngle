<?php
ini_set('display_errors', 1);
$artiste = $db->query("SELECT id_artiste FROM artiste");
$idArtiste = $artiste->fetchALL(PDO::FETCH_ASSOC);

function set_artiste($db, $datas = [])
{
    $sql = "INSERT INTO artiste (nom_artiste, prenom_artiste, email_artiste, num_telephone, adresse_artiste, cp_artiste, ville_artiste, date_naissance_artiste, date_deces_artiste, biographie_FR, biographie_EN, biographie_DE, biographie_RU, biographie_CH, photo_profil)
    VALUES (:nom_artiste, :prenom_artiste, :email_artiste, :num_telephone, :adresse_artiste, :cp_artiste, :ville_artiste, :date_naissance_artiste, :date_deces_artiste, :biographie_FR, :biographie_EN, :biographie_DE, :biographie_RU, :biographie_CH, :img_link)";
    $exec = $db->prepare($sql);
    $exec->execute($datas);
    return $db->lastInsertId();
}

if (!empty($_POST)) {
    if (
        isset($_POST["nom_artiste"], $_POST["prenom_artiste"], $_POST["date_naissance_artiste"], $_FILES["image_profil"], $_POST["biographie_FR"], $_POST["biographie_EN"], $_POST["biographie_DE"], $_POST["biographie_RU"], $_POST["biographie_CH"])
        && !empty($_POST["nom_artiste"]) && !empty($_POST["prenom_artiste"]) && !empty($_POST["date_naissance_artiste"]) && !empty($_FILES["image_profil"]['name']) && !empty($_POST["biographie_FR"]) && !empty($_POST["biographie_EN"]) && !empty($_POST["biographie_DE"]) && !empty($_POST["biographie_RU"]) && !empty($_POST["biographie_CH"])
    ) {
        $dataImage = [
            'img_link' => '../assets/images/artistes/' . $_FILES['image_profil']['name'],
            'img_relative_link' => '../assets/images/artistes/' . $_FILES['image_profil']['name'],
            'img_file' => $_FILES['image_profil']['tmp_name']
        ];

        $nom_artiste = test_input($_POST["nom_artiste"]);
        $prenom_artiste = test_input($_POST["prenom_artiste"]);
        $email_artiste = !empty($_POST["date_deces_artiste"]) ? test_input($_POST["email_artiste"]) : null;
        $num_telephone = !empty($_POST["num_telephone"]) ? test_input($_POST["num_telephone"]) : null;
        $adresse_artiste = !empty($_POST["artiste_artiste"]) ? test_input($_POST["adresse_artiste"]) : null;
        $cp_artiste = !empty($_POST["cp_artiste"]) ? test_input($_POST["cp_artiste"]) : null;
        $ville_artiste = !empty($_POST["ville_artiste"]) ? test_input($_POST["ville_artiste"]) : null;
        $date_naissance_artiste = test_input($_POST["date_naissance_artiste"]);
        $date_deces_artiste = !empty($_POST["date_deces_artiste"]) ? test_input($_POST["date_deces_artiste"]) : null;
        $biographie_fr = test_input($_POST["biographie_FR"]);
        $biographie_en = test_input($_POST["biographie_EN"]);
        $biographie_de = test_input($_POST["biographie_DE"]);
        $biographie_ru = test_input($_POST["biographie_RU"]);
        $biographie_ch = test_input($_POST["biographie_CH"]);

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
            ':biographie_FR' => $biographie_fr,
            ':biographie_EN' => $biographie_en,
            ':biographie_DE' => $biographie_de,
            ':biographie_RU' => $biographie_ru,
            ':biographie_CH' => $biographie_ch,
            ':img_link' => $dataImage['img_link']

        ];

        if (move_uploaded_file($dataImage['img_file'], $dataImage['img_link'])) {
            // Succès de la copie du fichier
            $last_artiste = set_artiste($db, $data);
            header("Location: artistes.php");
            exit;
        } else {
            // Erreur lors de la copie du fichier
            echo "Une erreur s'est produite lors du téléchargement de l'image.";
        }
    } else {
        die("Le formulaire est incomplet");
    }
}
?>


<form class="window_modal" method="POST" enctype="multipart/form-data">

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
                <div class="inp_image_profil">
                    <label for="image_profil" class="image_profil">Télécharger
                        image <span>*</span></label>
                    <input type="file" name="image_profil" id="image_profil" placeholder="Télécharger
                    image ">
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
                    <label for="biographie_fr" class="biographie_fr">Biographie FR</label>
                    <textarea name="biographie_FR" id="biographie_fr" cols="30" rows="6" placeholder="Biographie FR"></textarea>

                    <label for="biographie_en" class="biographie_en" style="display: none;">Biographie EN</label>
                    <textarea name="biographie_EN" id="biographie_en" cols="30" rows="6" placeholder="Biographie EN" style="display: none;"></textarea>

                    <label for="biographie_de" class="biographie_de" style="display: none;">Biographie DE</label>
                    <textarea name="biographie_DE" id="biographie_de" cols="30" rows="6" placeholder="Biographie DE" style="display: none;"></textarea>

                    <label for="biographie_ru" class="biographie_ru" style="display: none;">Biographie RU</label>
                    <textarea name="biographie_RU" id="biographie_ru" cols="30" rows="6" placeholder="Biographie RU" style="display: none;"></textarea>

                    <label for="biographie_ch" class="biographie_ch" style="display: none;">Biographie CH</label>
                    <textarea name="biographie_CH" id="biographie_ch" cols="30" rows="6" placeholder="Biographie CH" style="display: none;"></textarea>
                    <div class="box_button_bio">
                        <div class="button_bio"><button type="button" data-lang="fr" class="lang-btn active">FR</button></div>
                        <div class="button_bio"><button type="button" data-lang="en" class="lang-btn">EN</button></div>
                        <div class="button_bio"><button type="button" data-lang="de" class="lang-btn">DE</button></div>
                        <div class="button_bio"><button type="button" data-lang="ru" class="lang-btn">RU</button></div>
                        <div class="button_bio"><button type="button" data-lang="ch" class="lang-btn">CH</button></div>
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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const langButtons = document.querySelectorAll('.lang-btn');
        const textareas = document.querySelectorAll('.inp_bio textarea');

        langButtons.forEach(button => {
            button.addEventListener('click', () => {
                const lang = button.getAttribute('data-lang');
                textareas.forEach(textarea => {
                    if (textarea.id === `biographie_${lang}`) {
                        textarea.style.display = 'block';
                        button.classList.add('active');
                    } else {
                        textarea.style.display = 'none';
                        button.classList.remove('active');
                    }
                });
            });
        });
    });
</script>