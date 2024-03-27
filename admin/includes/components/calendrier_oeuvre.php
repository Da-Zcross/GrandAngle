<?php
define("DBHOST", "127.0.0.1");
define("DBUSER", "root");
define("DBPASS", "");
define("DBNAME", "grand");

try {
    $db = new PDO("mysql:host=" . DBHOST . ";dbname=" . DBNAME, DBUSER, DBPASS);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}

function getOeuvresByDate($pdo, $date) {
    try {
        $sql = "SELECT oe.*, a.nom_artiste, a.prenom_artiste FROM oeuvres_expo oe
                JOIN artiste a ON oe.id_artiste = a.id_artiste
                WHERE oe.date_livraison_prevu = :date OR oe.date_livraison_reel = :date";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['date' => $date]);
        return $stmt->fetchAll();
    } catch (PDOException $e) {
        return [];
    }
}

function getAllArtistes($pdo) {
    try {
        $sql = "SELECT * FROM artiste";
        $stmt = $pdo->query($sql);
        return $stmt->fetchAll();
    } catch (PDOException $e) {
        return [];
    }
}

function getAllTypesOeuvre($pdo) {
    try {
        $sql = "SELECT * FROM type_oeuvre";
        $stmt = $pdo->query($sql);
        return $stmt->fetchAll();
    } catch (PDOException $e) {
        return [];
    }
}

function getAllThemes($pdo) {
    try {
        $sql = "SELECT * FROM theme";
        $stmt = $pdo->query($sql);
        return $stmt->fetchAll();
    } catch (PDOException $e) {
        return [];
    }
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["modifier"])) {
    $id_oeuvres = $_POST["id_oeuvres"];
    $nom_oeuvre = $_POST["nom_oeuvre"];
    $description_oeuvre = $_POST["description_oeuvre"];
    $date_realisation = $_POST["date_realisation"];
    $largeur = $_POST["largeur"];
    $hauteur = $_POST["hauteur"];
    $profondeur = $_POST["profondeur"];
    $poids = $_POST["poids"];
    $date_livraison_prevu = $_POST["date_livraison_prevu"];
    $date_livraison_reel = $_POST["date_livraison_reel"];
    $id_type_oeuvre = $_POST["id_type_oeuvre"];
    $id_theme = $_POST["id_theme"];
    $id_artiste = $_POST["id_artiste"];

    try {
        $sql = "UPDATE oeuvres_expo SET 
        nom_oeuvre = :nom_oeuvre, 
        description_oeuvre = :description_oeuvre, 
        date_realisation = :date_realisation, 
        largeur = :largeur, 
        hauteur = :hauteur, 
        profondeur = :profondeur, 
        poids = :poids, 
        date_livraison_prevu = :date_livraison_prevu, 
        date_livraison_reel = :date_livraison_reel, 
        id_type_oeuvre = :id_type_oeuvre, 
        id_theme = :id_theme,
        id_artiste = :id_artiste
        WHERE id_oeuvres = :id_oeuvres";

        $stmt = $db->prepare($sql);
        $stmt->execute([
            'nom_oeuvre' => $nom_oeuvre,
            'description_oeuvre' => $description_oeuvre,
            'date_realisation' => $date_realisation,
            'largeur' => $largeur,
            'hauteur' => $hauteur,
            'profondeur' => $profondeur,
            'poids' => $poids,
            'date_livraison_prevu' => $date_livraison_prevu,
            'date_livraison_reel' => $date_livraison_reel,
            'id_type_oeuvre' => $id_type_oeuvre,
            'id_theme' => $id_theme,
            'id_artiste' => $id_artiste,
            'id_oeuvres' => $id_oeuvres
        ]);
    } catch (PDOException $e) {
        $error_message = "Erreur de modification : " . $e->getMessage();
    }
}

$artistes = getAllArtistes($db);
$typesOeuvre = getAllTypesOeuvre($db);
$themes = getAllThemes($db);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendrier des dates de livraison</title>
    <style>
        /* Styles CSS pour le corps de la page */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }

        /* Styles CSS pour les calendriers */
        .calendar-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
            max-width: 1200px;
            margin: 20px auto;
        }

        .calendar {
            width: 30%;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border-radius: 10px;
            overflow: hidden;
        }

        th, td {
            padding: 10px;
            text-align: center;
            font-size: 16px;
        }

        th {
            background-color: #f2f2f2;
            color: #333;
        }

        td {
            background-color: #fff;
            color: #555;
            border-bottom: 1px solid #ddd;
        }

        .today {
            background-color: #ffe0a8; /* Jaune clair pour le jour actuel */
            font-weight: bold;
        }

        .selectable {
            background-color: #e0f7ff; /* Bleu très clair pour les dates sélectionnables */
            cursor: pointer;
        }

        .has-oeuvre {
            position: relative;
        }

        .has-oeuvre:before {
            content: "";
            position: absolute;
            width: 8px;
            height: 8px;
            background-color: #00a8ff; /* Bleu clair pour indiquer la présence d'une œuvre */
            border-radius: 50%;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .info-container {
            border: 1px solid #ddd;
            padding: 10px;
            display: none;
        }

        /* Styles CSS pour la popup */
        .popup-container {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: rgba(0, 0, 0, 0.8);
            padding: 20px;
            border-radius: 10px;
            color: #fff;
            z-index: 1000;
        }

        .popup-content {
            max-width: 400px;
            margin: auto;
        }

        .close-popup {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
        }

        /* Styles CSS pour les liens */
        a {
            color: #007bff;
            text-decoration: none;
            cursor: pointer;
        }

        /* Style CSS pour le survol des liens */
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="calendar-container">
    <?php
    $currentYear = date('Y');
    $monthNames = ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'];
    for ($month = 1; $month <= 12; $month++) {
        ?>
        <div class="calendar">
            <div class="calendar-header">
                <h2><?php echo $monthNames[$month - 1]; ?></h2>
            </div>
            <table>
                <thead>
                <tr>
                    <th>Dim</th>
                    <th>Lun</th>
                    <th>Mar</th>
                    <th>Mer</th>
                    <th>Jeu</th>
                    <th>Ven</th>
                    <th>Sam</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $firstDayOfMonth = mktime(0, 0, 0, $month, 1, $currentYear);
                $numDaysInMonth = date('t', $firstDayOfMonth);
                $firstDayOfWeek = date('w', $firstDayOfMonth);
                $startDate = 1 - $firstDayOfWeek;
                if ($startDate <= 0) {
                    $startDate += 7; 
                }
                for ($i = 0; $i < 6; $i++) {
                    echo "<tr>";
                    for ($j = 0; $j < 7; $j++) {
                        echo "<td>";
                        $currentDate = $startDate + $i * 7 + $j;
                        if ($currentDate > 0 && $currentDate <= $numDaysInMonth) {
                            echo $currentDate;
                            $date = "$currentYear-$month-$currentDate";
                            $oeuvres = getOeuvresByDate($db, $date);
                            if (!empty($oeuvres)) {
                                echo "<div class='has-oeuvre' data-oeuvres='" . htmlspecialchars(json_encode($oeuvres), ENT_QUOTES, 'UTF-8') . "'></div>";
                            }
                        }
                        echo "</td>";
                    }
                    echo "</tr>";
                    if ($startDate + $i * 7 > $numDaysInMonth) {
                        break;
                    }
                }
                ?>
                </tbody>
            </table>
        </div>

        
        <?php
    }
    ?>
</div>

<div id="infoContainer" class="info-container"></div>

<div id="popupContainer" class="popup-container">
    <div id="popupContent" class="popup-content">
        <span id="closePopup" class="close-popup">&times;</span>
        <div id="popupInfo" class="popup-info"></div>
        <div class="modifier-form" style="display: none;">
            <h3>Modifier les informations de l'œuvre</h3>
            <form method="post">
                <input type="hidden" name="id_oeuvres" id="id_oeuvres">
                <label for="id_artiste">Artiste :</label>
                <select name="id_artiste" id="id_artiste">
                    <?php foreach ($artistes as $artiste): ?>
                        <option value="<?= $artiste['id_artiste'] ?>"><?= $artiste['nom_artiste'] . ' ' . $artiste['prenom_artiste'] ?></option>
                    <?php endforeach; ?>
                </select><br>
                <label for="nom_oeuvre">Nom de l'œuvre :</label>
                <input type="text" name="nom_oeuvre" id="nom_oeuvre"><br>
                <label for="description_oeuvre">Description :</label>
                <textarea name="description_oeuvre" id="description_oeuvre"></textarea><br>
                <label for="date_realisation">Date de réalisation :</label>
                <input type="date" name="date_realisation" id="date_realisation"><br>
                <label for="largeur">Largeur :</label>
                <input type="text" name="largeur" id="largeur"><br>
                <label for="hauteur">Hauteur :</label>
                <input type="text" name="hauteur" id="hauteur"><br>
                <label for="profondeur">Profondeur :</label>
                <input type="text" name="profondeur" id="profondeur"><br>
                <label for="poids">Poids :</label>
                <input type="text" name="poids" id="poids"><br>
                <label for="date_livraison_prevu">Date de livraison prévue :</label>
                <input type="date" name="date_livraison_prevu" id="date_livraison_prevu"><br>
                <label for="date_livraison_reel">Date de livraison réelle :</label>
                <input type="date" name="date_livraison_reel" id="date_livraison_reel"><br>
                <label for="id_type_oeuvre">Type d'œuvre :</label>
                <select name="id_type_oeuvre" id="id_type_oeuvre">
                    <?php
                    $sql = "SELECT * FROM type_oeuvre";
                    $stmt = $db->query($sql);
                    while ($row = $stmt->fetch()) {
                        echo "<option value=\"" . $row['id_type_oeuvre'] . "\">" . $row['libelle_type_oeuvre'] . "</option>";
                    }
                    ?>
                </select><br>
                <label for="id_theme">Thème :</label>
                <select name="id_theme" id="id_theme">
                    <?php
                    $sql = "SELECT * FROM theme";
                    $stmt = $db->query($sql);
                    while ($row = $stmt->fetch()) {
                        echo "<option value=\"" . $row['id_theme'] . "\">" . $row['libelle_theme'] . "</option>";
                    }
                    ?>
                </select><br>
                <label for="image_oeuvre">Image de l'œuvre :</label> <!-- Ajoutez ce champ pour l'image -->
                <input type="file" name="image_oeuvre" id="image_oeuvre"><br> <!-- Champ de type file pour le téléchargement de l'image -->
                <button type="submit" name="modifier">Valider</button>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const infoContainer = document.getElementById('infoContainer');
        const popupContainer = document.getElementById('popupContainer');
        const popupContent = document.getElementById('popupContent');
        const closePopup = document.getElementById('closePopup');
        const modifierButton = document.getElementById('modifierButton');
        const nomOeuvreInput = document.getElementById('nom_oeuvre');
        const descriptionOeuvreInput = document.getElementById('description_oeuvre');
        const dateRealisationInput = document.getElementById('date_realisation');
        const largeurInput = document.getElementById('largeur');
        const hauteurInput = document.getElementById('hauteur');
        const profondeurInput = document.getElementById('profondeur');
        const poidsInput = document.getElementById('poids');
        const dateLivraisonPrevuInput = document.getElementById('date_livraison_prevu');
        const dateLivraisonReelInput = document.getElementById('date_livraison_reel');
        const idTypeOeuvreSelect = document.getElementById('id_type_oeuvre');
        const idThemeSelect = document.getElementById('id_theme');

        let isEditMode = false;

        function displayOeuvrePopup(oeuvre) {
            const popupInfo = document.getElementById('popupInfo');
            popupInfo.innerHTML = `
                <h3>Informations sur l'œuvre</h3>
                <p><strong>Nom de l'œuvre:</strong> ${oeuvre.nom_oeuvre}</p>
                <p><strong>Description:</strong> ${oeuvre.description_oeuvre}</p>
                <p><strong>Date de réalisation:</strong> ${oeuvre.date_realisation}</p>
                <p><strong>Dimensions:</strong> ${oeuvre.largeur} x ${oeuvre.hauteur} x ${oeuvre.profondeur} (Poids: ${oeuvre.poids})</p>
                <p><strong>Date de livraison prévue:</strong> ${oeuvre.date_livraison_prevu}</p>
                <p><strong>Date de livraison réelle:</strong> ${oeuvre.date_livraison_reel || 'Non disponible'}</p>
                <p><strong>Type d'œuvre:</strong> ${oeuvre.id_type_oeuvre}</p>
                <p><strong>Thème:</strong> ${oeuvre.id_theme || 'Non spécifié'}</p>
                <button id="modifyButton">Modifier</button>
            `;

            document.getElementById('id_oeuvres').value = oeuvre.id_oeuvres;
            document.getElementById('nom_oeuvre').value = oeuvre.nom_oeuvre;
            document.getElementById('description_oeuvre').value = oeuvre.description_oeuvre;
            document.getElementById('date_realisation').value = oeuvre.date_realisation;
            document.getElementById('largeur').value = oeuvre.largeur;
            document.getElementById('hauteur').value = oeuvre.hauteur;
            document.getElementById('profondeur').value = oeuvre.profondeur;
            document.getElementById('poids').value = oeuvre.poids;
            document.getElementById('date_livraison_prevu').value = oeuvre.date_livraison_prevu;
            document.getElementById('date_livraison_reel').value = oeuvre.date_livraison_reel || '';
            document.getElementById('id_type_oeuvre').value = oeuvre.id_type_oeuvre;
            document.getElementById('id_theme').value = oeuvre.id_theme || '';

            popupContainer.style.display = 'block';
        }

        const calendarCells = document.querySelectorAll('.calendar td');
        calendarCells.forEach(cell => {
            cell.addEventListener('click', () => {
                const hasOeuvre = cell.querySelector('.has-oeuvre');
                if (hasOeuvre) {
                    const oeuvres = JSON.parse(hasOeuvre.dataset.oeuvres);
                    if (oeuvres.length === 1) {
                        displayOeuvrePopup(oeuvres[0]);
                    } else {
                        infoContainer.innerHTML = "<p>Plusieurs œuvres prévues pour cette date. <a href='#'>Afficher toutes les œuvres</a></p>";
                        infoContainer.style.display = 'block';
                    }
                } else {
                    infoContainer.innerHTML = "<p>Aucune œuvre prévue pour cette date.</p>";
                    infoContainer.style.display = 'block';
                }
            });
        });

        closePopup.addEventListener('click', () => {
            popupContainer.style.display = 'none';
        });

        window.addEventListener('click', (event) => {
            if (event.target === popupContainer) {
                popupContainer.style.display = 'none';
            }
        });

        popupContent.addEventListener('click', (event) => {
            if (event.target.id === 'modifyButton') {
                event.preventDefault();
                isEditMode = true;
                toggleFormDisplay();
            }
        });

        function toggleFormDisplay() {
            const form = document.querySelector('.modifier-form');
            const info = document.getElementById('popupInfo');
            if (isEditMode) {
                form.style.display = 'block';
                info.style.display = 'none';
            } else {
                form.style.display = 'none';
                info.style.display = 'block';
            }
        }

     
    });
</script>
</body>
</html>
