<?php
session_start();
ini_set('display_errors', 'on');

if (!isset($_SESSION['user'])) {
    header('Location: connexion.php');
    exit();
}

require_once "../config/pdo.php";

$titre = "Plan";
$nav = "plan";
include "includes/pages/header.php";

$artists_query = "SELECT id_artiste, CONCAT(nom_artiste, ' ', prenom_artiste) AS nom_complet FROM artiste";
$artists_stmt = $db->query($artists_query);
$artists_result = $artists_stmt->fetchAll(PDO::FETCH_ASSOC);

// Vérification de la sélection des artistes
if (isset($_GET['id_artiste'])) {
    // Conversion de l'ID de l'artiste en entier pour des raisons de sécurité
    $selected_artist = intval($_GET['id_artiste']);
} else {
    $selected_artist = 1;
}

// Récupérer les œuvres associées à l'artiste sélectionné
$artworks_query = "SELECT oeuvres_expo.id_oeuvres, oeuvres_expo.nom_oeuvre 
                   FROM oeuvres_expo 
                   INNER JOIN présenter ON oeuvres_expo.id_oeuvres = présenter.id_oeuvres 
                   WHERE présenter.id_artiste = :selected_artist";
$artworks_stmt = $db->prepare($artworks_query);
$artworks_stmt->bindParam(":selected_artist", $selected_artist, PDO::PARAM_INT);
$artworks_stmt->execute();
$artworks_result = $artworks_stmt->fetchAll(PDO::FETCH_ASSOC);

?>



<section id="super_grid_container">
    <div id="grid_container_dash">
        <div class="left">
            <?php include "./includes/components/sidebar_left.php"; ?>
        </div>
        <div class="middle">
            <!-- Sélecteurs d'artiste, d'œuvre et d'emplacement -->
            <div class="select-box-plan" id="dialog">
                <label for="artiste-plan">Sélectionnez un artiste :</label>
                <select name="artistes" id="artiste-plan">
                    <?php foreach ($artists_result as $artist) : ?>
                        <option value="<?= $artist['id_artiste'] ?>"><?= $artist['nom_complet'] ?></option>
                    <?php endforeach; ?>
                </select>
                <label for="oeuvre-plan">Sélectionnez une œuvre :</label>
                <select name="oeuvres" id="oeuvre-plan">
                    <?php foreach ($artworks_result as $artwork) : ?>
                        <option value="<?= $artwork['id_oeuvres'] ?>"><?= $artwork['nom_oeuvre'] ?></option>
                    <?php endforeach; ?>
                </select>
                <label for="emp-plan">Sélectionnez un emplacement :</label>
                <select name="emp-plan" id="emp-plan">
                    <?php for ($i = 1; $i <= 25; $i++) : ?>
                        <option value="a<?= $i ?>" data-index="a<?= $i ?>">Emplacement <?= $i ?></option>
                    <?php endfor; ?>
                </select>
            </div>

            <!-- Bouton pour ajouter sur le plan -->
            <button id="btn-ajouter-plan">Ajouter sur le plan</button>

            <div class="grid-container-box">
                <div class="grid-container-plan">
                    <!-- Cases de la grille -->
                    <?php for ($i = 1; $i <= 25; $i++) : ?>
                        <div class="grid-item" data-index="<?= $i ?>">Case <?= $i ?></div>
                    <?php endfor; ?>
                    <!-- Bouton pour imprimer le plan -->
                    <button id="btn-imprimer-plan">Imprimer le plan</button>
                </div>
                
            </div>

        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Écouteur d'événement pour le bouton "Ajouter sur le plan"
        document.getElementById('btn-ajouter-plan').addEventListener('click', () => {
            addSelectedToPlan();
        });

        // Écouteur d'événement pour le bouton "Imprimer le plan"
        document.getElementById('btn-imprimer-plan').addEventListener('click', printPlan);

        // Fonction pour ajouter les informations sélectionnées sur le plan
        function addSelectedToPlan() {
            const artisteSelect = document.getElementById('artiste-plan');
            const oeuvreSelect = document.getElementById('oeuvre-plan');
            const empSelect = document.getElementById('emp-plan');

            // Vérifier si une option est sélectionnée dans le sélecteur d'emplacement
            if (empSelect.selectedIndex === -1) {
                alert('Veuillez sélectionner un emplacement.');
                return;
            }

            // Récupérer la valeur de l'emplacement sélectionné et son ID
            const selectedEmpId = empSelect.value;
            const selectedEmpOption = empSelect.options[empSelect.selectedIndex];
            const selectedEmpIndex = selectedEmpOption.getAttribute('data-index').substring(1);

            // Récupérer l'ID de l'artiste et de l'œuvre associés
            const selectedArtistId = artisteSelect.value;
            const selectedArtworkId = oeuvreSelect.value;

            console.log('ID de l\'artiste sélectionné:', selectedArtistId);
            console.log('ID de l\'œuvre sélectionnée:', selectedArtworkId);
            console.log('ID de l\'emplacement sélectionné:', selectedEmpIndex);

            const gridItem = document.querySelector('.grid-item[data-index="' + selectedEmpIndex + '"]');

            if (gridItem) {
                // Insérer les informations dans la case de la grille
                gridItem.textContent = 'ID Artiste : ' + selectedArtistId + ', ID Œuvre : ' + selectedArtworkId;
            } else {
                alert('Emplacement invalide.');
            }
        }

        // Fonction pour imprimer le plan avec les informations actuelles
        function printPlan() {
            // Masquer les éléments non pertinents pour l'impression
            document.getElementById('btn-ajouter-plan').style.display = 'none';
            document.getElementById('btn-imprimer-plan').style.display = 'none';

            // Imprimer la section contenant le plan
            window.print();

            // Rétablir l'affichage des boutons après l'impression
            document.getElementById('btn-ajouter-plan').style.display = 'block';
            document.getElementById('btn-imprimer-plan').style.display = 'block';
        }
    });
</script>

</body>
</html>
