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

// Fonction pour récupérer les expositions par date
function getExpositionsByDate($pdo, $date) {
    $sql = "SELECT * FROM exposition WHERE date_debut <= :date AND date_fin >= :date";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['date' => $date]);
    return $stmt->fetchAll();
}

// Traitement de la modification de l'exposition
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["modifier_expo"])) {
    try {
        $sql = "UPDATE exposition SET 
        nom_expo = :nom_expo, 
        description = :description, 
        date_debut = :date_debut, 
        date_fin = :date_fin,
        horaire_visite = :horaire_visite,
        report_frequentation = :report_frequentation,
        nom_directeur_artistique = :nom_directeur_artistique,
        prenom_directeur_artistique = :prenom_directeur_artistique,
        email_directeur_artistique = :email_directeur_artistique,
        nombre_oeuvres = :nombre_oeuvres,
        id_theme = :id_theme
        WHERE id_expo = :id_expo";

        $stmt = $db->prepare($sql);
        $stmt->execute([
            'nom_expo' => $_POST["nom_expo"],
            'description' => $_POST["description"],
            'date_debut' => $_POST["date_debut"],
            'date_fin' => $_POST["date_fin"],
            'horaire_visite' => $_POST["horaire_visite"],
            'report_frequentation' => $_POST["report_frequentation"],
            'nom_directeur_artistique' => $_POST["nom_directeur_artistique"],
            'prenom_directeur_artistique' => $_POST["prenom_directeur_artistique"],
            'email_directeur_artistique' => $_POST["email_directeur_artistique"],
            'nombre_oeuvres' => $_POST["nombre_oeuvres"],
            'id_theme' => $_POST["id_theme"],
            'id_expo' => $_POST["id_expo"]
        ]);
        $success_message = "Exposition modifiée avec succès !";
    } catch (PDOException $e) {
        $error_message = "Erreur de modification : " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendrier des expositions</title>
</head>
<body>
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

        /* Ajout de styles CSS spécifiques à la popup */
        .popup-form label {
            display: block;
            margin-bottom: 5px;
        }

        .popup-form input[type="text"],
        .popup-form textarea,
        .popup-form input[type="date"] {
            width: 100%;
            padding: 5px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        .popup-form button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        .popup-form button:hover {
            background-color: #0056b3;
        }
    </style>
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
                            $expositions = getExpositionsByDate($db, $date);
                            if (!empty($expositions)) {
                                echo "<div class='has-oeuvre' data-expositions='" . htmlspecialchars(json_encode($expositions), ENT_QUOTES, 'UTF-8') . "'></div>";
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

<div class="popup-container" id="popupContainer">
    <div class="popup-content" id="popupContent">
        <span class="close-popup" id="closePopup">&times;</span>
        <div class="popup-info" id="popupInfo"></div>
        <div class="popup-form" id="popupForm" style="display: none;">
            <h3>Modifier les informations de l'exposition</h3>
            <form id="expoForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <input type="hidden" name="id_expo" id="expoId">
                <label for="nom_expo">Nom de l'exposition :</label>
                <input type="text" name="nom_expo" id="nom_expo"><br>
                <label for="description">Description :</label>
                <textarea name="description" id="description"></textarea><br>
                <label for="date_debut">Date de début :</label>
                <input type="date" name="date_debut" id="date_debut"><br>
                <label for="date_fin">Date de fin :</label>
                <input type="date" name="date_fin" id="date_fin"><br>
                <label for="horaire_visite">Horaire de visite :</label>
                <input type="time" name="horaire_visite" id="horaire_visite"><br>
                <label for="report_frequentation">Report de fréquentation :</label>
                <input type="number" name="report_frequentation" id="report_frequentation"><br>
                <label for="nom_directeur_artistique">Nom du directeur artistique :</label>
                <input type="text" name="nom_directeur_artistique" id="nom_directeur_artistique"><br>
                <label for="prenom_directeur_artistique">Prénom du directeur artistique :</label>
                <input type="text" name="prenom_directeur_artistique" id="prenom_directeur_artistique"><br>
                <label for="email_directeur_artistique">Email du directeur artistique :</label>
                <input type="email" name="email_directeur_artistique" id="email_directeur_artistique"><br>
                <label for="nombre_oeuvres">Nombre d'œuvres :</label>
                <input type="number" name="nombre_oeuvres" id="nombre_oeuvres"><br>
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

                <button type="submit" name="modifier_expo">Valider</button>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const popupContainer = document.getElementById('popupContainer');
        const popupContent = document.getElementById('popupContent');
        const closePopup = document.getElementById('closePopup');
        const popupForm = document.getElementById('popupForm');

        // Fonction pour afficher la popup avec les détails de l'exposition
        function displayExpoPopup(exposition) {
            popupInfo.innerHTML = `
                <h3>Informations sur l'exposition</h3>
                <p><strong>Nom de l'exposition:</strong> ${exposition.nom_expo}</p>
                <p><strong>Description:</strong> ${exposition.description}</p>
                <p><strong>Date de début:</strong> ${exposition.date_debut}</p>
                <p><strong>Date de fin:</strong> ${exposition.date_fin}</p>
                <p><strong>Horaire de visite:</strong> ${exposition.horaire_visite}</p>
                <p><strong>Report de fréquentation:</strong> ${exposition.report_frequentation}</p>
                <p><strong>Nom du directeur artistique:</strong> ${exposition.nom_directeur_artistique}</p>
                <p><strong>Prénom du directeur artistique:</strong> ${exposition.prenom_directeur_artistique}</p>
                <p><strong>Email du directeur artistique:</strong> ${exposition.email_directeur_artistique}</p>
                <p><strong>Nombre d'œuvres:</strong> ${exposition.nombre_oeuvres}</p>
                <p><strong>Thème:</strong> ${exposition.id_theme || 'Non spécifié'}</p>
                <button id="modifyButton">Modifier</button>
            `;

            // Remplir les champs du formulaire avec les détails de l'exposition
            document.getElementById('expoId').value = exposition.id_expo;
            document.getElementById('nom_expo').value = exposition.nom_expo;
            document.getElementById('description').value = exposition.description;
            document.getElementById('date_debut').value = exposition.date_debut;
            document.getElementById('date_fin').value = exposition.date_fin;
            document.getElementById('horaire_visite').value = exposition.horaire_visite;
            document.getElementById('report_frequentation').value = exposition.report_frequentation;
            document.getElementById('nom_directeur_artistique').value = exposition.nom_directeur_artistique;
            document.getElementById('prenom_directeur_artistique').value = exposition.prenom_directeur_artistique;
            document.getElementById('email_directeur_artistique').value = exposition.email_directeur_artistique;
            document.getElementById('nombre_oeuvres').value = exposition.nombre_oeuvres;
            document.getElementById('id_theme').value = exposition.id_theme || '';

            // Afficher la popup
            popupContainer.style.display = 'block';
        }

        // Ajouter un événement de clic à chaque case du calendrier qui contient une exposition
        const hasOeuvreCells = document.querySelectorAll('.has-oeuvre');
        hasOeuvreCells.forEach(cell => {
            cell.addEventListener('click', function() {
                const expositionsData = JSON.parse(this.dataset.expositions);
                if (expositionsData.length > 0) {
                    // Afficher la première exposition trouvée pour cette date
                    displayExpoPopup(expositionsData[0]);
                }
            });
        });

        // Fermer la popup si l'utilisateur clique en dehors de celle-ci
        window.addEventListener('click', (event) => {
            if (event.target === popupContainer) {
                popupContainer.style.display = 'none';
            }
        });

        // Gérer le clic sur le bouton "Modifier"
        popupContent.addEventListener('click', (event) => {
            if (event.target.id === 'modifyButton') {
                // Cacher les informations et afficher le formulaire de modification
                popupInfo.style.display = 'none';
                popupForm.style.display = 'block';
            }
        });
    });
</script>

</body>
</html>
