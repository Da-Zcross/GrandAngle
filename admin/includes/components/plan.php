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

// Vérification de la selection des artistes 
if (isset($_GET['id_artiste'])) {
    // Convertion de l'ID de l'artiste en entier pour des raisons de sécurité
    $selected_artist = intval($_GET['id_artiste']);
} else {
    $selected_artist = 1; 
}

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
    <!-- Votre contenu HTML ici -->
    <div id="grid_container_dash">
        <div class="left">
            <?php include "./includes/components/sidebar_left.php"; ?>
        </div>
        <div class="middle">
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

            <!-- Sélecteur d'œuvres -->
            <div class="select-box-plan">

            </div>

            <!-- Sélecteur d'emplacement -->
            <div class="select-box-plan">

            </div>

            <button id="btn-ajouter-plan">Ajouter sur le plan</button>

            <div class="grid-container-box">
                <div class="grid-container-plan">
                    <!-- Cases de la grille -->
                    <div class="grid-item" data-index="1">Case 1</div>
                    <div class="grid-item" data-index="2">Case 2</div>
                    <div class="grid-item" data-index="3">Case 3</div>
                    <div class="grid-item" data-index="4">Case 4</div>
                    <div class="grid-item" data-index="5">Case 5</div>
                    <div class="grid-item" data-index="6">Case 6</div>
                    <div class="grid-item" data-index="7">Case 7</div>
                    <div class="grid-item" data-index="8">Case 8</div>
                    <div class="grid-item" data-index="9">Case 9</div>
                    <div class="grid-item" data-index="10">Case 10</div>
                    <div class="grid-item" data-index="11">Case 11</div>
                    <div class="grid-item" data-index="12">Case 12</div>
                    <div class="grid-item" data-index="13">Case 13</div>
                    <div class="grid-item" data-index="14">Case 14</div>
                    <div class="grid-item" data-index="15">Case 15</div>
                    <div class="grid-item" data-index="16">Case 16</div>
                    <div class="grid-item" data-index="17">Case 17</div>
                    <div class="grid-item" data-index="18">Case 18</div>
                    <div class="grid-item" data-index="19">Case 19</div>
                    <div class="grid-item" data-index="20">Case 20</div>
                    <div class="grid-item" data-index="21">Case 21</div>
                    <div class="grid-item" data-index="22">Case 22</div>
                    <div class="grid-item" data-index="23">Case 23</div>
                    <div class="grid-item" data-index="24">Case 24</div>
                    <div class="grid-item" data-index="25">Case 25</div>
                </div>
            </div>

        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Écouteur d'événement pour le bouton "Ajouter sur le plan"
    document.getElementById('btn-ajouter-plan').addEventListener('click', function() {
        addSelectedToPlan();
    });

    // Fonction pour ajouter les informations sélectionnées sur le plan
    function addSelectedToPlan() {
        var artisteSelect = document.getElementById('artiste-plan');
        var oeuvreSelect = document.getElementById('oeuvre-plan');
        var empSelect = document.getElementById('emp-plan');

        // Vérifier si une option est sélectionnée dans le sélecteur d'emplacement
        if (empSelect.selectedIndex === -1) {
            alert('Veuillez sélectionner un emplacement.');
            return;
        }

        // Récupérer la valeur de l'emplacement sélectionné et son ID
        var selectedEmpId = empSelect.value;
        var selectedEmpOption = empSelect.options[empSelect.selectedIndex];
        var selectedEmpIndex = selectedEmpOption.getAttribute('data-index').substring(1);

        // Récupérer l'ID de l'artiste et de l'œuvre associés
        var selectedArtistId = artisteSelect.value;
        var selectedArtworkId = oeuvreSelect.value;

        console.log('ID de l\'artiste sélectionné:', selectedArtistId);
        console.log('ID de l\'œuvre sélectionnée:', selectedArtworkId);
        console.log('ID de l\'emplacement sélectionné:', selectedEmpIndex);

        var gridItem = document.querySelector('.grid-item[data-index="' + selectedEmpIndex + '"]');

        if (gridItem) {
            // Insérer les informations dans la case de la grille
            gridItem.textContent = 'ID Artiste : ' + selectedArtistId + ', ID Œuvre : ' + selectedArtworkId;
        } else {
            alert('Emplacement invalide.');
        }
    }
});


    // Fonction pour charger les artistes depuis le serveur
    function loadArtists() {
        var artistesSelect = document.getElementById('artiste-plan');
        artistesSelect.innerHTML = ''; // Effacer les options précédentes

        // Requête AJAX pour charger les artistes depuis le serveur
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (this.readyState === 4 && this.status === 200) {
                var artists = JSON.parse(this.responseText);
                artists.forEach(function(artist) {
                    var option = document.createElement('option');
                    option.value = artist.id_artiste;
                    option.textContent = artist.nom_complet;
                    artistesSelect.appendChild(option);
                });
            }
        };
        xhr.open('GET', 'get_artists.php', true);
        xhr.send();
    }

    // Fonction pour charger les œuvres associées à un artiste sélectionné
    function loadArtworks(artistId) {
        var oeuvresSelect = document.getElementById('oeuvre-plan');
        oeuvresSelect.innerHTML = ''; // Effacer les options précédentes

        // Requête AJAX pour charger les œuvres depuis le serveur
        const xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (this.readyState === 4 && this.status === 200) {
                var artworks = JSON.parse(this.responseText);
                artworks.forEach(function(artwork) {
                    var option = document.createElement('option');
                    option.value = artwork.id_oeuvres;
                    option.textContent = artwork.nom_oeuvre;
                    oeuvresSelect.appendChild(option);
                });
            }
        };
        xhr.open('GET', 'get_atworks.php?artistId=' + artistId, true);
        xhr.send();
    }

    // Écouteur d'événement pour charger les œuvres associées à l'artiste sélectionné
    var artistesSelect = document.getElementById('artiste-plan');
    artistesSelect.addEventListener('change', function() {
        var selectedArtistId = this.value;
        loadArtworks(selectedArtistId);
        // generateEmplacementOptions(); // Appel de la fonction pour générer les emplacements
    });

    // Initialisation : charger les artistes lorsque la page est chargée
    document.addEventListener('DOMContentLoaded', function() {
        loadArtists();
        // generateEmplacementOptions(); // Appel initial pour générer les emplacements
    });
</script>