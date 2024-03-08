<?php
$id = $_GET["id"];
$categorie = $db->query("SELECT id, cat_name FROM categories");
$cat_name = $categorie->fetchAll(PDO::FETCH_ASSOC);

$sql = "SELECT cards.id_card, cards.title, cards.description, cards.img_url, cards.author, cards.number, cards.date_card, cards.categorie, categories.cat_name, categories.color, categories.text_color 
        FROM cards
        JOIN categories ON cards.categorie = categories.id
        WHERE id_card=:id";

try {
    $requete = $db->prepare($sql);
    $requete->bindValue(":id", $id, PDO::PARAM_INT);
    $requete->execute();
    $oeuvre = $requete->fetch();
} catch (PDOException $e) {
    echo 'Erreur lors de la récupération du projet : ' . $e->getMessage();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $img = $_POST['img'];
    $author = $_POST['author'];
    $date = $_POST['date'];
    $categorie = $_POST['categorie'];

    if ($_FILES['img']['error'] === 0) {
        $tmp_path = $_FILES['img']['tmp_name'];
        $filename = uniqid() . '.' . pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION);
        // $filename = $_FILES['img']['name'];
        $destination = '../assets/images/img_cards/' . $filename;
        move_uploaded_file($tmp_path, $destination);

        $sql = ('UPDATE cards SET cards.title = ?,cards.description = ?, cards.img_url = ?, cards.author = ?, cards.date_card = ?, cards.categorie = ? WHERE id_card = ?');
        try {
            $requete = $db->prepare($sql);
            $requete->execute([
                $title,
                $description,
                $destination,
                $author,
                $date,
                $categorie,
                $id,
            ]);

            $message = "Succès de la modification";

        } catch (PDOException $e) {
            echo 'Erreur lors de la mise à jour du projet : ' . $e->getMessage();
            exit();
        }
    } else {
        $sql = "UPDATE cards SET title=:title, description=:description, author=:author, date_card=:date_card, categorie=:categorie WHERE id_card=:id_card";
        try {
            $requete = $db->prepare($sql);
            $requete->execute([
                ':title' => $title,
                ':description' => $description,
                ':author' => $author,
                ':date_card' => $date,
                ':categorie' => $categorie,
                ':id_card' => $id,
            ]);

            $message = "La mise à jour du projet a bien été effectuée.";

        } catch (PDOException $e) {
            echo 'Erreur lors de la mise à jour du projet : ' . $e->getMessage();
            exit();
        }
    }
};
?>






<form class="window_modal" method="POST">

        <div class="window_main">
            <div class="window_head">
                <h2 class="title_form">Modifier Artiste</h2>
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
                        <label for="num_tel_artiste" class="num_tel_artiste">Numéro téléphone</label>
                        <input type="tel" name="num_tel_artiste" id="num_tel_artiste" placeholder="E-mail">
                    </div>
                    <div class="inp_adresse">
                        <label for="adresse_artiste" class="adresse_artiste">Adresse</label>
                        <textarea name="adresse_artiste" id="adresse_artiste" cols="30" rows="6"
                            placeholder="Adresse"></textarea>
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
                        <label for="bio_artiste" class="bio_artiste">Biographie</label>
                        <textarea name="bio_artiste" id="bio_artiste" cols="30" rows="6"
                            placeholder="Biographie"></textarea>
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