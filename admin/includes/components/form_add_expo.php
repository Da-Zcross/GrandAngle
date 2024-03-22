<?php
ini_set('display_errors', 'on');

$themeExpo = $db->query("SELECT id_theme, libelle_theme FROM theme");
$libelle_theme = $themeExpo->fetchALL(PDO::FETCH_ASSOC);

function set_expo($db, $datas = [])
{
    $sql = "INSERT INTO exposition (date_debut, date_fin, report_frequentation, nom_directeur_artistique, prenom_directeur_artistique, email_directeur_artistique, nombre_oeuvres, nom_expo,id_theme)
    VALUES (:date_debut, :date_fin, :report_frequentation, :nom_directeur_artistique, :prenom_directeur_artistique, :email_directeur_artistique, :nombre_oeuvres, :nom_expo, :id_theme)";
    $exec = $db->prepare($sql);
    $exec->execute($datas);
    return $db->lastInsertId();
}

if (!empty($_POST)) {
    if (
empty($_POST["date_debut"]) || empty($_POST["date_fin"]) || empty($_POST["nom_expo"]) || empty($_POST["id_theme"])

    ) {
        if (!empty($_POST['new_theme'])) {
            $nouveau_theme = test_input($_POST['new_theme']);
            // Insérer le nouveau rôle dans la base de données
            $db->exec("INSERT INTO theme (libelle_theme) VALUES ('$nouveau_theme')");
            // Rediriger ou afficher un message indiquant que le rôle a été ajouté
        }

    }else{

        $date_debut = test_input($_POST["date_debut"]);
        $date_fin = test_input($_POST["date_fin"]);
        $report_frequentation = !empty($_POST["report_frequentation"]) ? test_input($_POST["report_frequentation"]) : null;
        $nom_directeur_artistique = !empty($_POST["nom_directeur_artistique"]) ? test_input($_POST["nom_directeur_artistique"]) : null;
        $prenom_directeur_artistique = !empty($_POST["prenom_directeur_artistique"]) ? test_input($_POST["prenom_directeur_artistique"]) : null;
        $email_directeur_artistique = !empty($_POST["email_directeur_artistique"]) ? test_input($_POST["email_directeur_artistique"]) : null;
        $nombre_oeuvres = !empty($_POST["nombre_oeuvres"]) ? test_input($_POST["nombre_oeuvres"]) : null;
        $nom_expo = test_input($_POST["nom_expo"]);
        $id_theme = !empty($_POST["id_theme"]);

        $data = [
            ':date_debut' => $date_debut,
            ':date_fin' => $date_fin,
            ':report_frequentation' => $report_frequentation,
            ':nom_directeur_artistique' => $nom_directeur_artistique,
            ':prenom_directeur_artistique' => $prenom_directeur_artistique,
            ':email_directeur_artistique' => $email_directeur_artistique,
            ':nombre_oeuvres' => $nombre_oeuvres,
            ':nom_expo' =>  $nom_expo,
            ':id_theme' => $id_theme,
        ];

        $last_expo = set_expo($db, $data);

        header("Location: exposition.php");
        exit;
    }
}
?>

<form class="window_modal" method="POST">

<div class="window_main">
    <div class="window_head">
        <h2 class="title_form">Ajouter une nouvelle exposition</h2>
    </div>

    <div class="window_info_bloc">
        <div class="window_info_left">
            <div class="inp_nom">
                <label for="nom_expo" class="nom_expo">Nom exposition <span>*</span></label>
                <input type="text" name="nom_expo" id="nom_expo" placeholder="Nom exposition">
            </div>
            <div class="inp_date_debut_expo">
                <label for="date_debut_expo" class="date_debut_expo">Date début d'exposition</label>
                <input type="date" name="date_debut" id="date_debut_expo"
                    placeholder="Date début d'exposition">
            </div>
            <div class="inp_date_fin_expo">
                <label for="date_fin_expo" class="date_fin_expo">Date fin d'exposition</label>
                <input type="date" name="date_fin" id="date_fin_expo" placeholder="Date fin d'exposition">
            </div>
            
            <div class="inp_theme_expo">
                <label for="theme_expo" class="theme_expo">Theme exposition</label>
                <select name="id_theme" id="theme_expo" class="theme_expo">
                <?php foreach ($libelle_theme as $value) : ?>
                            <option value="<?= $value["id_theme"] ?>"><?= $value["libelle_theme"] ?></option>
                        <?php endforeach; ?>
                </select>
                <div class="inp_new_theme">
                        <label for="new_theme" class="new_theme">Nouveau Theme</label>
                        <input type="text" name="new_theme" id="new_theme" class="new_theme" placeholder="Nouveau theme">
                    </div>
            </div>

        </div>

        <div class="window_info_right">

            <div class="inp_nom_directeur_art">
                <label for="nom_directeur_art" class="nom_directeur_art">Nom directeur artistique</label>
                <input type="text" name="nom_directeur_artistique" id="nom_directeur_art" placeholder="Nom">
            </div>

            <div class="inp_prenom_directeur_art">
                <label for="prenom_directeur_art" class="prenom_directeur_art">Prénom directeur
                    artistique</label>
                <input type="text" name="prenom_directeur_artistique" id="prenom_directeur_art" placeholder="Prénom">
            </div>
            <div class="inp_email_directeur_art">
                <label for="email_directeur_art" class="email_directeur_art">Email directeur artistique</label>
                <input type="email" name="email_directeur_artistique" id="email_directeur_art"
                    placeholder="Email directeur artistique">
            </div>

            <div class="inp_nombre_oeuvres">
                <label for="nombre_oeuvres" class="nombre_oeuvres">Nombre d'oeuvres</label>
                <input type="number" name="nombre_oeuvres" id="nombre_oeuvres" placeholder="Nombre d'oeuvres">
            </div>

            <div class="inp_report_freq">
                <label for="report_freq" class="report_freq">Fréquentation</label>
                <input type="number" name="report_frequentation" id="report_freq" placeholder="Fréquentation">
            </div>




        </div>
    </div>
    <div class="get_mit window_footer">
        <div class="box_button"><button type="submit">Ajouter</button></div>
    </div>
</div>

</div>
</form>