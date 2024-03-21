<?php

$typeOeuvre = $db->query("SELECT id_type_oeuvre, libelle_type_oeuvre FROM type_oeuvre");
$libelle_type_oeuvre = $typeOeuvre->fetchALL(PDO::FETCH_ASSOC);

function set_oeuvre($db, $datas = [])
{
    $sql = "INSERT INTO `oeuvres_expo` (`nom_oeuvre`, `chemin_image`, `description_oeuvre`, `date_realisation`, `nombre_vues`, `largeur`, `hauteur`, `poids`, `profondeur`, `duree`, `date_livraison_prevu`, `date_livraison_reel`, `id_type_oeuvre`)
    VALUES (:nom_oeuvre, :img_link, :description_oeuvre, :date_realisation, :nombre_vues, :largeur, :hauteur, :poids, :profondeur, :duree, :date_livraison_prevu, :date_livraison_reel, :id_type_oeuvre)";
    $exec = $db->prepare($sql);
    $exec->execute($datas);
    return $db->lastInsertId();
}

if (!empty($_POST)) {
    if (
        isset($_POST["nom_oeuvre"], $_FILES["image_oeuvre"], $_POST["id_type_oeuvre"], $_POST["date_realisation"])
        && !empty($_POST["nom_oeuvre"]) && !empty($_FILES["image_oeuvre"]['name']) && !empty($_POST["id_type_oeuvre"]) && !empty($_POST["date_realisation"])

    ) {

        $dataImage = [
            'img_link' => './assets_admin/images/img_oeuvres/' . $_FILES['image_oeuvre']['name'],
            'img_relative_link' => './assets_admin/images/img_oeuvres/' . $_FILES['image_oeuvre']['name'],
            'img_file' => $_FILES['image_oeuvre']['tmp_name']
        ];

        $nom_oeuvre = test_input($_POST["nom_oeuvre"]);
        $description_oeuvre = !empty($_POST["description_oeuvre"]) ? test_input($_POST["description_oeuvre"]) : null;
        $date_realisation = !empty($_POST["date_realisation"]) ? test_input($_POST["date_realisation"]) : null;
        $nombre_vues = !empty($_POST["nombre_vues"]) ? test_input($_POST["nombre_vues"]) : null;
        $largeur = !empty($_POST["largeur"]) ? test_input($_POST["largeur"]) : null;
        $hauteur = !empty($_POST["hauteur"]) ? test_input($_POST["hauteur"]) : null;
        $poids = !empty($_POST["poids"]) ? test_input($_POST["poids"]) : null;
        $profondeur = test_input($_POST["profondeur"]) ? test_input($_POST["profondeur"]) : null;
        $duree = !empty($_POST["duree"]) ? test_input($_POST["duree"]) : null;
        $date_livraison_prevu = !empty($_POST["date_livraison_prevu"]) ? test_input($_POST["date_livraison_prevu"]) : null;
        $date_livraison_reel = !empty($_POST["date_livraison_reel"]) ? test_input($_POST["date_livraison_reel"]) : null;
        $id_type_oeuvre = !empty($_POST["id_type_oeuvre"]) ? test_input($_POST["id_type_oeuvre"]) : null;

        $data = [
            'nom_oeuvre' => $nom_oeuvre,
            'img_link' => $dataImage['img_link'],
            'description_oeuvre' => $description_oeuvre,
            'date_realisation' => $date_realisation,
            'nombre_vues' => $nombre_vues,
            'largeur' =>  $largeur,
            'hauteur' => $hauteur,
            'poids' => $poids,
            'profondeur' => $profondeur,
            'duree' => $duree,
            'date_livraison_prevu' => $date_livraison_prevu,
            'date_livraison_reel' =>  $date_livraison_reel,
            'id_type_oeuvre' =>  $id_type_oeuvre
        ];

        move_uploaded_file($dataImage['img_file'], $dataImage['img_link']);


        $last_project = set_oeuvre($db, $data);



        header("Location: oeuvres.php");
        exit;
    } else {
        die("Le formulaire est incomplet");
    }
}
?>



<form class="window_modal" method="POST" enctype="multipart/form-data">

    <div class="window_main">
        <div class="window_head">
            <h2 class="title_form">Ajouter une oeuvre</h2>
        </div>

        <div class="window_info_bloc">
            <div class="window_info_left">
                <div class="inp_nom">
                    <label for="nom_oeuvre" class="nom_oeuvre">Nom <span>*</span></label>
                    <input type="text" name="nom_oeuvre" id="nom_oeuvre" placeholder="Nom">
                </div>
                <div class="inp_image">
                    <label for="image_oeuvre" class="image_oeuvre">Télécharger
                        image <span>*</span></label>
                    <input type="file" name="image_oeuvre" id="image_oeuvre" placeholder="Télécharger
                    image ">
                </div>

                <div class="inp_type_oeuvre">
                    <p>Choisir le type de l'oeuvre</p>
                    <select name="id_type_oeuvre" id="type_oeuvre" class="type_oeuvre"> 
                        <?php foreach ($libelle_type_oeuvre as $value) : ?>
                            <option value="<?= $value["id_type_oeuvre"] ?>"><?= $value["libelle_type_oeuvre"] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="inp_date">
                    <label for="date_oeuvre" class="date_oeuvre">Date de réalisation *</label>
                    <input type="date" name="date_realisation" id="date_oeuvre" placeholder="Date de réalisation de l'oeuvre" required>
                </div>

                <div class="inp_date_livraison_prevu">
                    <label for="date_livraison_prevu_oeuvre" class="date_livraison_prevu_oeuvre" required>Date de livraison
                        prévu *</label>
                    <input type="date" name="date_livraison_prevu" id="nombres_de_vues_oeuvre" placeholder="E-mail">
                </div>

                <div class="inp_date_livraison_reel">
                    <label for="date_livraison_reel_oeuvre" class="date_livraison_reel_oeuvre">Date de livraison
                        réel</label>
                    <input type="date" name="date_livraison_reel" id="nombres_de_vues_oeuvre" placeholder="E-mail">
                </div>

                <div class="inp_nombres_de_vues">
                    <label for="nombres_de_vues_oeuvre" class="nombres_de_vues_oeuvre">Nombre de vues</label>
                    <input type="number" name="nombre_vues" id="nombres_de_vues_oeuvre" placeholder="Nombre de vues">
                </div>

            </div>

            <div class="window_info_right">
                <div class="inp_largeur">
                    <label for="largeur_oeuvre" class="largeur_oeuvre">Largeur en cm</label>
                    <input type="number" name="largeur" id="largeur_oeuvre" placeholder="Largeur en cm">
                </div>
                <div class="inp_hauteur">
                    <label for="hauteur_oeuvre" class="hauteur_oeuvre">Hauteur en cm</label>
                    <input type="number" name="hauteur" id="hauteur_oeuvre" placeholder="Hauteur en cm">
                </div>
                <div class="inp_profondeur">
                    <label for="profondeur_oeuvre" class="profondeur_oeuvre">Profondeur en cm</label>
                    <input type="number" name="profondeur" id="profondeur_oeuvre" placeholder="Profondeur en cm">
                </div>
                <div class="inp_poids">
                    <label for="poids_oeuvre" class="poids_oeuvre">Poids en kg<span></span></label>
                    <input type="number" name="poids" id="poids_oeuvre" placeholder="Poids en kg/mb">
                </div>
                <div class="inp_duree">
                    <label for="duree_oeuvre" class="duree_oeuvre">Durée</label>
                    <input type="time" name="duree" id="duree_oeuvre" placeholder="Date de décès">
                </div>
                <div class="inp_description">
                    <label for="description_oeuvre" class="description_oeuvre">Description</label>
                    <textarea name="description_oeuvre" id="description_oeuvre" cols="30" rows="6" placeholder="Description"></textarea>
                    <div class="box_button_description">
                        <div class="button_description"><button type="">FRA</button></div>
                        <div class="button_description"><button type="">GBR</button></div>
                        <div class="button_description"><button type="">DEU</button></div>
                        <div class="button_description"><button type="">RUS</button></div>
                        <div class="button_description"><button type="">CHN</button></div>
                    </div>
                </div>

            </div>
        </div>
        <div class="get_mit window_footer">
            <div class="box_button"><button type="submit">Ajouter</button></div>
        </div>
    </div>
</form>