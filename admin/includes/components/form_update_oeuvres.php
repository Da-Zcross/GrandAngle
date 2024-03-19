<?php
$typeOeuvre = $db->query("SELECT id_type_oeuvre, libelle_type_oeuvre FROM type_oeuvre");
$libelle_type_oeuvre = $typeOeuvre->fetchALL(PDO::FETCH_ASSOC);
$id_oeuvres = $_GET["id_oeuvres"];
$sql = "SELECT oeuvres_expo.*, type_oeuvre.libelle_type_oeuvre
FROM oeuvres_expo
LEFT JOIN type_oeuvre ON oeuvres_expo.id_type_oeuvre = type_oeuvre.id_type_oeuvre
WHERE oeuvres_expo.id_oeuvres = :id_oeuvres"; // Ajout de la clause WHERE pour récupérer une seule oeuvre par ID

try {
    $requete = $db->prepare($sql);
    $requete->bindParam(":id_oeuvres", $id_oeuvres, PDO::PARAM_INT);
    $requete->execute();
    $oeuvre = $requete->fetch(PDO::FETCH_ASSOC);

    if (!$oeuvre) {
        echo "ID oeuvres non valide.";
        exit;
    }
} catch (PDOException $e) {
    echo 'Erreur lors de la récupération de l\'oeuvre : ' . $e->getMessage();
    exit;
}

$imgUrl = isset($oeuvre['chemin_image']) && file_exists("." . $oeuvre['chemin_image']) ? $oeuvre['chemin_image'] : "./assets_admin/images/img_oeuvres/";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom_oeuvre = $_POST["nom_oeuvre"];
    $description_oeuvre = $_POST["description_oeuvre"];
    $date_realisation = $_POST["date_realisation"];
    $nombre_vues = $_POST["nombre_vues"];
    $largeur = $_POST["largeur"];
    $hauteur = $_POST["hauteur"];
    $poids = $_POST["poids"];
    $profondeur = $_POST["profondeur"];
    $duree = $_POST["duree"];
    $date_livraison_prevu = $_POST["date_livraison_prevu"];
    $date_livraison_reel = $_POST["date_livraison_reel"];
    $id_type_oeuvre = $_POST["id_type_oeuvre"];

    $description_oeuvre = !empty($_POST["description_oeuvre"]) ? $_POST["description_oeuvre"] : null;
    $nombre_vues = !empty($_POST["nombre_vues"]) ? $_POST["nombre_vues"] : null;
    $largeur = !empty($_POST["largeur"]) ? $_POST["largeur"] : null;
    $hauteur = !empty($_POST["hauteur"]) ? $_POST["hauteur"] : null;
    $poids = !empty($_POST["poids"]) ? $_POST["poids"] : null;
    $profondeur = !empty($_POST["profondeur"]) ? $_POST["profondeur"] : null;
    $duree = !empty($_POST["duree"]) ? $_POST["duree"] : null;
    $date_livraison_reel = !empty($_POST["date_livraison_reel"]) ? $_POST["date_livraison_reel"] : null;

    // Vérification du fichier téléchargé
    if (isset($_FILES['img']) && $_FILES['img']['error'] === 0) {
        $tmp_path = $_FILES['img']['tmp_name'];
        $filename = $_FILES['img']['name'];
        $filename = uniqid() . '_' . $_FILES['img']['name'];
        $destination = './assets_admin/images/img_oeuvres/' . $filename;
        $relative_destination = './assets_admin/images/img_oeuvres/' . $filename;

        // Déplacement du fichier téléchargé vers le dossier de destination
        if (move_uploaded_file($tmp_path, $destination)) {
            echo 'Le fichier a été téléchargé et déplacé avec succès.';
            $_FILES['img']['error'];
            // Requête SQL pour mettre à jour l'oeuvre avec l'image
            $sql = 'UPDATE oeuvres_expo SET nom_oeuvre = :nom_oeuvre, chemin_image = :chemin_image, description_oeuvre = :description_oeuvre, date_realisation = :date_realisation, nombre_vues = :nombre_vues, largeur = :largeur, hauteur = :hauteur, poids = :poids, profondeur = :profondeur, duree = :duree, date_livraison_prevu = :date_livraison_prevu, date_livraison_reel = :date_livraison_reel, id_type_oeuvre = :id_type_oeuvre WHERE id_oeuvres = :id_oeuvres';

            try {
                $requete = $db->prepare($sql);
                $requete->bindParam(':nom_oeuvre', $nom_oeuvre);
                $requete->bindParam(':chemin_image', $relative_destination);
                $requete->bindParam(':description_oeuvre', $description_oeuvre);
                $requete->bindParam(':date_realisation', $date_realisation);
                $requete->bindParam(':nombre_vues', $nombre_vues);
                $requete->bindParam(':largeur', $largeur);
                $requete->bindParam(':hauteur', $hauteur);
                $requete->bindParam(':poids', $poids);
                $requete->bindParam(':profondeur', $profondeur);
                $requete->bindParam(':duree', $duree);
                $requete->bindParam(':date_livraison_prevu', $date_livraison_prevu);
                $requete->bindParam(':date_livraison_reel', $date_livraison_reel);
                $requete->bindParam(':id_type_oeuvre', $id_type_oeuvre);
                $requete->bindParam(':id_oeuvres', $id_oeuvres);
                $requete->execute();

                $message = "Succès de la modification";
            } catch (PDOException $e) {
                echo 'Erreur lors de la mise à jour du projet : ' . $e->getMessage();
                exit();
            }
        } else {
            echo 'Erreur lors du déplacement du fichier.';
            exit();
        }
    } else {
        // Requête SQL pour mettre à jour l'oeuvre sans l'image
        $sql = "UPDATE oeuvres_expo SET nom_oeuvre = :nom_oeuvre, description_oeuvre = :description_oeuvre, date_realisation = :date_realisation, nombre_vues = :nombre_vues, largeur = :largeur, hauteur = :hauteur, poids = :poids, profondeur = :profondeur, duree = :duree, date_livraison_prevu = :date_livraison_prevu, date_livraison_reel = :date_livraison_reel, id_type_oeuvre = :id_type_oeuvre WHERE id_oeuvres = :id_oeuvres";

        try {
            $requete = $db->prepare($sql);
            $requete->bindParam(':nom_oeuvre', $nom_oeuvre);
            $requete->bindParam(':description_oeuvre', $description_oeuvre);
            $requete->bindParam(':date_realisation', $date_realisation);
            $requete->bindParam(':nombre_vues', $nombre_vues);
            $requete->bindParam(':largeur', $largeur);
            $requete->bindParam(':hauteur', $hauteur);
            $requete->bindParam(':poids', $poids);
            $requete->bindParam(':profondeur', $profondeur);
            $requete->bindParam(':duree', $duree);
            $requete->bindParam(':date_livraison_prevu', $date_livraison_prevu);
            $requete->bindParam(':date_livraison_reel', $date_livraison_reel);
            $requete->bindParam(':id_type_oeuvre', $id_type_oeuvre);
            $requete->bindParam(':id_oeuvres', $id_oeuvres);
            $requete->execute();

            $message = "Les informations de l'artiste ont été mises à jour avec succès.";
            header("Location: {$_SERVER['PHP_SELF']}?id_oeuvres=$id_oeuvres");
            exit;
        } catch (PDOException $e) {
            echo 'Erreur lors de la mise à jour du projet : ' . $e->getMessage();
            exit();
        }
    }
}
?>


<form class="window_modal" method="POST" enctype="multipart/form-data">

    <div class="window_main">
        <div class="window_head">
            <h2 class="title_form">Modifier une oeuvre</h2>
        </div>

        <div class="window_info_bloc">
            <div class="window_info_left">

                <div></div>
                <div class="inp_nom">
                    <label for="nom_oeuvre" class="nom_oeuvre">Nom <span>*</span></label>
                    <input type="text" name="nom_oeuvre" id="nom_oeuvre" placeholder="Nom" value="<?= $oeuvre['nom_oeuvre'] ?>">
                </div>
                <div class="inp_image add-ipt">
                    <label for="image_oeuvre" class="image_oeuvre">Télécharger image <span>*</span></label>
                    <input type="file" name="img" id="img" value="<?= $oeuvre['chemin_image'] ?>" src="<?= $oeuvre['chemin_image'] ?>">
                    <span class="img-preview">
                        <img id="preview-image" src="<?= $imgUrl ?>" alt="Preview Image">
                    </span>
                </div>

                <div class="inp_type_oeuvre">
                    <p>Choisir le type de l'oeuvre</p>
                    <select name="id_type_oeuvre" id="type_oeuvre" class="type_oeuvre">
                        <?php foreach ($libelle_type_oeuvre as $value) : ?>
                            <option value="<?= $value["id_type_oeuvre"] ?>" <?= ($oeuvre['id_type_oeuvre'] == $value["id_type_oeuvre"]) ? 'selected' : '' ?>>
                                <?= $value["libelle_type_oeuvre"] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>


                <div class="inp_date">
                    <label for="date_oeuvre" class="date_oeuvre">Date de réalisation</label>
                    <input type="date" name="date_realisation" id="date_oeuvre" placeholder="Date de réalisation de l'oeuvre" value="<?= $oeuvre['date_realisation'] ?>">
                </div>

                <div class="inp_date_livraison_prevu">
                    <label for="date_livraison_prevu_oeuvre" class="date_livraison_prevu_oeuvre">Date de livraison
                        prévu</label>
                    <input type="date" name="date_livraison_prevu" id="date_livraison_prevu_oeuvre" placeholder="E-mail" value="<?= $oeuvre['date_livraison_prevu'] ?>">
                </div>

                <div class="inp_date_livraison_reel">
                    <label for="date_livraison_reel_oeuvre" class="date_livraison_reel_oeuvre">Date de livraison
                        réel</label>
                    <input type="date" name="date_livraison_reel" id="date_livraison_reel_oeuvre" placeholder="E-mail" value="<?= $oeuvre['date_livraison_reel'] ?>">
                </div>

                <div class="inp_nombres_de_vues">
                    <label for="nombres_de_vues_oeuvre" class="nombres_de_vues_oeuvre">Nombre de vues</label>
                    <input type="number" name="nombre_vues" id="nombres_de_vues_oeuvre" placeholder="Nombre de vues" value="<?= $oeuvre['nombre_vues'] ?>">
                </div>

            </div>

            <div class="window_info_right">
                <div class="inp_largeur">
                    <label for="largeur_oeuvre" class="largeur_oeuvre">Largeur en cm</label>
                    <input type="number" name="largeur" id="largeur_oeuvre" placeholder="Largeur en cm" value="<?= $oeuvre['largeur'] ?>">
                </div>
                <div class="inp_hauteur">
                    <label for="hauteur_oeuvre" class="hauteur_oeuvre">Hauteur en cm</label>
                    <input type="number" name="hauteur" id="hauteur_oeuvre" placeholder="Hauteur en cm" value="<?= $oeuvre['hauteur'] ?>">
                </div>
                <div class="inp_profondeur">
                    <label for="profondeur_oeuvre" class="profondeur_oeuvre">Profondeur en cm</label>
                    <input type="number" name="profondeur" id="profondeur_oeuvre" placeholder="Profondeur en cm" value="<?= $oeuvre['profondeur'] ?>">
                </div>
                <div class="inp_poids">
                    <label for="poids_oeuvre" class="poids_oeuvre">Poids en kg<span></span></label>
                    <input type="number" name="poids" id="poids_oeuvre" placeholder="Poids en kg/mb" value="<?= $oeuvre['poids'] ?>">
                </div>
                <div class="inp_duree">
                    <label for="duree_oeuvre" class="duree_oeuvre">Durée</label>
                    <input type="time" name="duree" id="duree_oeuvre" placeholder="Durée" value="<?= $oeuvre['duree'] ?>">
                </div>
                <div class="inp_description">
                    <label for="description_oeuvre" class="description_oeuvre">Description</label>
                    <textarea name="description_oeuvre" id="description_oeuvre" cols="30" rows="6" placeholder="Description" value="<?= $oeuvre['description_oeuvre'] ?>"></textarea>
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
            <div class="box_button"><button type="submit">Modifier</button></div>
        </div>
    </div>
</form>