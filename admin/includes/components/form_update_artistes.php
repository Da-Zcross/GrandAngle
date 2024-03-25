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

$imgUrl = isset($artiste['photo_profil']) && file_exists("." . $artiste['photo_profil']) ? $artiste['photo_profil'] : "../assets/images/artistes/";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données du formulaire pour la mise à jour de l'artiste
    $nom_artiste = $_POST["nom_artiste"];
    $prenom_artiste = $_POST["prenom_artiste"];
    $email_artiste = $_POST["email_artiste"];
    $num_telephone = $_POST["num_telephone"];
    $adresse_artiste = $_POST["adresse_artiste"];
    $cp_artiste = $_POST["cp_artiste"];
    $ville_artiste = $_POST["ville_artiste"];
    $date_naissance_artiste = $_POST["date_naissance_artiste"];
    $date_deces_artiste = $_POST["date_deces_artiste"];
    $biographie_FR = $_POST["biographie_FR"];
    $biographie_EN = $_POST["biographie_EN"];
    $biographie_DE = $_POST["biographie_DE"];
    $biographie_RU = $_POST["biographie_RU"];
    $biographie_CH = $_POST["biographie_CH"];

    $email_artiste = !empty($_POST["email_artiste"]) ? test_input($_POST["email_artiste"]) : null;
    $num_telephone = !empty($_POST["num_telephone"]) ? test_input($_POST["num_telephone"]) : null;
    $adresse_artiste = !empty($_POST["adresse_artiste"]) ? test_input($_POST["adresse_artiste"]) : null;
    $cp_artiste = !empty($_POST["cp_artiste"]) ? test_input($_POST["cp_artiste"]) : null;
    $ville_artiste = !empty($_POST["ville_artiste"]) ? test_input($_POST["ville_artiste"]) : null;
    $date_deces_artiste = !empty($_POST["date_deces_artiste"]) ? test_input($_POST["date_deces_artiste"]) : null;

    // Vérification du fichier téléchargé pour la photo de profil de l'artiste
    if (isset($_FILES['img']) && $_FILES['img']['error'] === 0) {
        $tmp_path = $_FILES['img']['tmp_name'];
        $filename = $_FILES['img']['name'];
        $destination = '/var/www/html/GrandAngle/assets/images/artistes/' . $filename;
        $relative_destination = '../assets/images/artistes/' . $filename;

        if (move_uploaded_file($tmp_path, $destination)) {
            echo 'Le fichier a été téléchargé et déplacé avec succès.';
            $_FILES['img']['error'];
            // Requête SQL pour mettre à jour l'artiste avec la photo de profil
            $sql = "UPDATE artiste SET nom_artiste=:nom_artiste, prenom_artiste=:prenom_artiste, email_artiste=:email_artiste, num_telephone=:num_telephone, adresse_artiste=:adresse_artiste, cp_artiste=:cp_artiste, ville_artiste=:ville_artiste, date_naissance_artiste=:date_naissance_artiste, date_deces_artiste=:date_deces_artiste, biographie_FR=:biographie_FR, biographie_EN=:biographie_EN, biographie_DE=:biographie_DE, biographie_RU=:biographie_RU, biographie_CH=:biographie_CH, photo_profil=:photo_profil WHERE id_artiste=:id_artiste";

            try {
                $requete = $db->prepare($sql);
                $requete->bindParam(':nom_artiste', $nom_artiste);
                $requete->bindParam(':prenom_artiste', $prenom_artiste);
                $requete->bindParam(':email_artiste', $email_artiste);
                $requete->bindParam(':num_telephone', $num_telephone);
                $requete->bindParam(':adresse_artiste', $adresse_artiste);
                $requete->bindParam(':cp_artiste', $cp_artiste);
                $requete->bindParam(':ville_artiste', $ville_artiste);
                $requete->bindParam(':date_naissance_artiste', $date_naissance_artiste);
                $requete->bindParam(':date_deces_artiste', $date_deces_artiste);
                $requete->bindParam(':biographie_FR', $biographie_FR);
                $requete->bindParam(':biographie_EN', $biographie_EN);
                $requete->bindParam(':biographie_DE', $biographie_DE);
                $requete->bindParam(':biographie_RU', $biographie_RU);
                $requete->bindParam(':biographie_CH', $biographie_CH);
                $requete->bindParam(':photo_profil', $relative_destination);
                $requete->bindParam(':id_artiste', $id_artiste);
                $requete->execute();

                $message = "Succès de la modification";
            } catch (PDOException $e) {
                echo 'Erreur lors de la mise à jour de la photo de profil de l\'artiste : ' . $e->getMessage();
                exit();
            }
        } else {
            echo 'Erreur lors du déplacement du fichier de la photo de profil.';
            exit();
        }
    } else {

        // Mise à jour des informations de l'artiste dans la base de données
        $sql = "UPDATE artiste SET nom_artiste=:nom_artiste, prenom_artiste=:prenom_artiste, email_artiste=:email_artiste, num_telephone=:num_telephone, adresse_artiste=:adresse_artiste, cp_artiste=:cp_artiste, ville_artiste=:ville_artiste, date_naissance_artiste=:date_naissance_artiste, date_deces_artiste=:date_deces_artiste, biographie_FR=:biographie_FR, biographie_EN=:biographie_EN, biographie_DE=:biographie_DE, biographie_RU=:biographie_RU, biographie_CH=:biographie_CH WHERE id_artiste=:id_artiste";

        try {
            $requete = $db->prepare($sql);
            $requete->bindParam(':nom_artiste', $nom_artiste);
            $requete->bindParam(':prenom_artiste', $prenom_artiste);
            $requete->bindParam(':email_artiste', $email_artiste);
            $requete->bindParam(':num_telephone', $num_telephone);
            $requete->bindParam(':adresse_artiste', $adresse_artiste);
            $requete->bindParam(':cp_artiste', $cp_artiste);
            $requete->bindParam(':ville_artiste', $ville_artiste);
            $requete->bindParam(':date_naissance_artiste', $date_naissance_artiste);
            $requete->bindParam(':date_deces_artiste', $date_deces_artiste);
            $requete->bindParam(':biographie_FR', $biographie_FR);
            $requete->bindParam(':biographie_EN', $biographie_EN);
            $requete->bindParam(':biographie_DE', $biographie_DE);
            $requete->bindParam(':biographie_RU', $biographie_RU);
            $requete->bindParam(':biographie_CH', $biographie_CH);
            $requete->bindParam(':id_artiste', $id_artiste);

            $requete->execute();

            $message = "Les informations de l'artiste ont été mises à jour avec succès.";
            header("Location: {$_SERVER['PHP_SELF']}?id_artiste=$id_artiste");
            exit;
        } catch (PDOException $e) {
            echo 'Erreur lors de la mise à jour de l\'artiste : ' . $e->getMessage();
        }
    }
}
?>



<form class="window_modal" method="POST" enctype="multipart/form-data" onsubmit="return confirm('Êtes-vous sûr de vouloir modifier cet artiste ?')">

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
                <div class="inp_photo_profil">
                    <label for="img" class="photo_profil">Photo de profil</label>
                    <input type="file" name="img" id="img" accept="image/*">
                    <span class="img-preview">
                        <?php if (!empty($artiste['photo_profil'])) : ?>
                            <img id="preview-photo" src="<?= $artiste['photo_profil'] ?>" alt="Preview Photo" style="width: 150px; height: 150px;">
                        <?php else : ?>
                            <img id="preview-photo" src="#" alt="Preview Photo" style="width: 150px; height: 150px;">
                        <?php endif; ?>
                    </span>
                </div>

                <div class="inp_num_tel">
                    <label for="num_tel_artiste" class="num_tel_artiste">Numéro téléphone</label>
                    <input type="tel" name="num_telephone" id="num_tel_artiste" placeholder="Numéro téléphone" value="<?= $artiste['num_telephone'] ?>">
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
            <div class="box_button"><button type="submit">Modifier</button></div>
        </div>
    </div>

    </div>
</form>

<script>
    // Fonction pour afficher l'aperçu de l'image
    function previewImage(event) {
        const input = event.target;
        const preview = document.getElementById('preview-photo');

        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
            };

            reader.readAsDataURL(input.files[0]);
        } else {
            preview.src = '#';
        }
    }

    // // Ajoutez un événement onchange à l'input file pour appeler la fonction de prévisualisation
    // document.getElementById('photo_profil').addEventListener('change', previewImage);



    // Fonction pour afficher l'aperçu de l'image
    function previewImage(event) {
        const input = event.target;
        const preview = document.getElementById('preview-photo');

        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
            };

            reader.readAsDataURL(input.files[0]);
        } else {
            preview.src = '#';
        }
    }

    // Ajoutez un événement onchange à l'input file pour appeler la fonction de prévisualisation
    document.getElementById('img').addEventListener('change', previewImage);


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