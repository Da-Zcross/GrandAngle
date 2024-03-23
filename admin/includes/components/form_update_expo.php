<?php

$themeExpo = $db->query("SELECT id_theme, libelle_theme FROM theme");
$libelle_theme = $themeExpo->fetchALL(PDO::FETCH_ASSOC);

$id_expo = $_GET["id_expo"];

$sql = "SELECT exposition.*, theme.libelle_theme
        FROM exposition
        LEFT JOIN theme ON exposition.id_theme = theme.id_theme
        WHERE exposition.id_expo = :id_expo";

try {
    $requete = $db->prepare($sql);
    $requete->bindParam(":id_expo", $id_expo, PDO::PARAM_INT);
    $requete->execute();
    $expo = $requete->fetch(PDO::FETCH_ASSOC);

    if (!$expo) {
        echo "ID exposition non valide.";
        exit;
    }
} catch (PDOException $e) {
    echo 'Erreur lors de la récupération de l\'exposition : ' . $e->getMessage();
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validation des dates
    if (!empty($_POST["date_debut_expo"]) && !empty($_POST["date_fin_expo"])) {
        $date_debut = test_input($_POST["date_debut_expo"]);
        $date_fin = test_input($_POST["date_fin_expo"]);

        // Vérification du format de date
        if (validateDate($date_debut) && validateDate($date_fin)) {
            // Continuer avec la mise à jour de l'exposition
            $report_frequentation = !empty($_POST["report_freq"]) ? test_input($_POST["report_freq"]) : null;
            $nom_directeur_artistique = !empty($_POST["nom_directeur_art"]) ? test_input($_POST["nom_directeur_art"]) : null;
            $prenom_directeur_artistique = !empty($_POST["prenom_directeur_art"]) ? test_input($_POST["prenom_directeur_art"]) : null;
            $email_directeur_artistique = !empty($_POST["email_directeur_art"]) ? test_input($_POST["email_directeur_art"]) : null;
            $nombre_oeuvres = !empty($_POST["nombre_oeuvres"]) ? test_input($_POST["nombre_oeuvres"]) : null;
            $nom_expo = test_input($_POST["nom_expo"]);
            $id_theme = !empty($_POST["theme_expo"]) ? test_input($_POST["theme_expo"]) : null;

            $sql_update = "UPDATE exposition 
                           SET date_debut=:date_debut, date_fin=:date_fin, 
                               report_frequentation=:report_frequentation, 
                               nom_directeur_artistique=:nom_directeur_artistique, 
                               prenom_directeur_artistique=:prenom_directeur_artistique, 
                               email_directeur_artistique=:email_directeur_artistique, 
                               nombre_oeuvres=:nombre_oeuvres, 
                               nom_expo=:nom_expo, 
                               id_theme=:id_theme 
                           WHERE id_expo=:id_expo";

            try {
                // Préparation de la requête
                $requete_update = $db->prepare($sql_update);

                // Liaison des paramètres
                $requete_update->bindParam(':date_debut', $date_debut);
                $requete_update->bindParam(':date_fin', $date_fin);
                $requete_update->bindParam(':report_frequentation', $report_frequentation);
                $requete_update->bindParam(':nom_directeur_artistique', $nom_directeur_artistique);
                $requete_update->bindParam(':prenom_directeur_artistique', $prenom_directeur_artistique);
                $requete_update->bindParam(':email_directeur_artistique', $email_directeur_artistique);
                $requete_update->bindParam(':nombre_oeuvres', $nombre_oeuvres);
                $requete_update->bindParam(':nom_expo', $nom_expo);
                $requete_update->bindParam(':id_theme', $id_theme);
                $requete_update->bindParam(':id_expo', $id_expo);

                // Exécution de la requête
                $requete_update->execute();

                // Redirection ou message de succès
                $message = "Les informations de l'exposition ont été mises à jour avec succès.";
                header("Location: {$_SERVER['PHP_SELF']}?id_expo=$id_expo");
                exit;
            } catch (PDOException $e) {
                echo 'Erreur lors de la mise à jour de l\'exposition : ' . $e->getMessage();
            }
        } else {
            echo "Format de date invalide.";
            exit;
        }
    } else {
        echo "Veuillez remplir les champs de date.";
        exit;
    }
}

// Fonction de validation de date
function validateDate($date, $format = 'Y-m-d')
{
    $d = DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) === $date;
}
?>


<form class="window_modal" method="POST">

    <div class="window_main">
        <div class="window_head">
            <h2 class="title_form">Modifier exposition</h2>
        </div>

        <div class="window_info_bloc">
            <div class="window_info_left">
                <div class="inp_nom_expo">
                    <label for="nom_expo" class="nom_expo">Nom exposition <span>*</span></label>
                    <input type="text" name="nom_expo" class="nom_expo" id="nom_expo" placeholder="Nom exposition" value="<?= $expo['nom_expo'] ?>">
                </div>

                <div class="inp_theme_expo">

                    <label for="theme_expo" class="theme_expo">Thême exposition</label>
                    <select name="theme_expo" id="theme_expo" class="theme_expo"> <?php foreach ($libelle_theme as $value) : ?>
                            <option value="<?= $value["id_theme"] ?>" <?= ($expo["id_theme"] == $value["id_theme"]) ? "selected" : "" ?>>
                                <?= $value["libelle_theme"] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="inp_date_debut_expo">
                    <label for="date_debut_expo" class="date_debut_expo">Date début d'exposition</label>
                    <input type="date" name="date_debut_expo" class="date_debut_expo" id="date_debut_expo" placeholder="Date début d'exposition" value="<?= $expo['date_debut'] ?>">
                </div>

                <div class="inp_date_fin_expo">
                    <label for="date_fin_expo" class="date_fin_expo">Date fin d'exposition</label>
                    <input type="date" name="date_fin_expo" class="date_fin_expo" id="date_fin_expo" placeholder="Date fin d'exposition" value="<?= $expo['date_fin'] ?>">
                </div>


            </div>

            <div class="window_info_right">

                <div class="inp_nom_directeur_art">
                    <label for="nom_directeur_art" class="nom_directeur_art">Nom directeur artistique</label>
                    <input type="text" name="nom_directeur_art" class="nom_directeur_art" id="nom_directeur_art" placeholder="Nom" value="<?= $expo['nom_directeur_artistique'] ?>">
                </div>

                <div class="inp_prenom_directeur_art">
                    <label for="prenom_directeur_art" class="prenom_directeur_art">Prénom directeur
                        artistique</label>
                    <input type="text" name="prenom_directeur_art" class="prenom_directeur_art" id="prenom_directeur_art" placeholder="Prénom" value="<?= $expo['prenom_directeur_artistique'] ?>">
                </div>
                <div class="inp_email_directeur_art">
                    <label for="email_directeur_art" class="email_directeur_art">Email directeur artistique</label>
                    <input type="email" name="email_directeur_art" class="email_directeur_art" id="email_directeur_art" placeholder="Email directeur artistique" value="<?= $expo['email_directeur_artistique'] ?>">
                </div>

                <div class="inp_nombre_oeuvres">
                    <label for="nombre_oeuvres" class="nombre_oeuvres">Nombre d'oeuvres</label>
                    <input type="number" name="nombre_oeuvres" class="nombre_oeuvres" id="nombre_oeuvres" placeholder="Nombre d'oeuvres" value="<?= $expo['nombre_oeuvres'] ?>">
                </div>

                <div class="inp_report_freq">
                    <label for="report_freq" class="report_freq">Fréquentation</label>
                    <input type="number" name="report_freq" class="report_freq" id="report_freq" placeholder="Fréquentation" value="<?= $expo['report_frequentation'] ?>">
                </div>

            </div>
        </div>
        <div class="get_mit window_footer">
            <div class="box_button"><button type="submit">Modifier</button></div>
        </div>
    </div>

    </div>
</form>