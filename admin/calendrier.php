<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: connexion.php');
    exit();
}
require_once "../config/pdo.php";
$sql = "SELECT id_expo, nom_expo, date_debut, date_fin FROM exposition";
$requete = $db->query($sql);
$evenements = $requete->fetchAll(PDO::FETCH_ASSOC);

// Formatter les événements pour FullCalendar
$evenements_format = [];
foreach ($evenements as $evenement) {
    $couleur = ''; // Couleur par défaut
    // Ajoutez des conditions pour définir la couleur en fonction de l'événement
    if ($evenement['id_expo'] == 1) {
        $couleur = '#337ab7'; // Rouge
    } elseif ($evenement['id_expo'] == 2) {
        $couleur = '#b96bff'; // Vert
    } else {
        $couleur = '#0000FF'; // Bleu par défaut
    }
    $evenement_format = [
        'id' => $evenement['id_expo'],
        'title' => $evenement['nom_expo'],
        'start' => $evenement['date_debut'],
        'end' => $evenement['date_fin'],
        'backgroundColor' => $couleur, // Ajoutez la couleur ici

    ];
    $evenements_format[] = $evenement_format;
}

// Convertir les événements formatés en JSON
$evenements_json = json_encode($evenements_format);



$titre = "Calendrier";
$nav = "calendrier";
include "includes/pages/header.php";


?>


<section id="super_grid_container">
    <div id="grid_container_dash">
        <div class="left">
            <?php include "./includes/components/sidebar_left.php"; ?>
        </div>
        <div class="middle">
            <div id="calendar_container">            <div id="calendar_box">
                <div id="calendar"></div>
            </div></div>

        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            events: <?php echo $evenements_json; ?>,
            eventDisplay: 'block',

            eventContent: function(arg) {
            return {
                html: '<div style="background-color: ' + arg.event.backgroundColor + ';">' + arg.timeText + ' - ' + arg.event.title + '</div>',
            };
        },

        });
        calendar.render();
    });
</script>