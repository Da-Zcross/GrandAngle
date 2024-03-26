<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: connexion.php');
    exit();
}
require_once "../config/pdo.php";
include "includes/pages/header.php";

$url = $nom_oeuvre = $nom_artiste = $prenom_artiste = '';
$errors = array('nom_oeuvre' => '', 'prenom_artiste' => '', 'nom_artiste' => '');

$artists_query = "SELECT id_artiste, CONCAT(nom_artiste, ' ', prenom_artiste) AS nom_complet FROM artiste";
$artists_stmt = $db->query($artists_query);
$artists_result = $artists_stmt->fetchAll(PDO::FETCH_ASSOC);

// Vérifier si un artiste a été sélectionné
if (isset($_GET['id_artiste'])) {
    // Convertir l'ID de l'artiste en entier pour des raisons de sécurité
    $selected_artist = intval($_GET['id_artiste']);
} else {
    // Par défaut, mettre une valeur initiale (peut être modifiée selon vos besoins)
    $selected_artist = 1; // Ou toute autre valeur par défaut que vous souhaitez utiliser
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
            <div class="select-box-plan" id="dialog">
                <form method="POST" action="">
                    <label for="artiste-plan">Sélectionnez un artiste :</label>
                    <select name="id_artiste" id="artiste-plan">
                        <?php foreach ($artists_result as $artist) : ?>
                            <option value="<?= $artist['id_artiste'] ?>"><?= $artist['nom_complet'] ?></option>
                        <?php endforeach; ?>
                    </select>
                    <label for="oeuvre-plan">Sélectionnez une œuvre :</label>
                    <select name="id_oeuvre" id="oeuvre-plan">
                        <?php foreach ($artworks_result as $artwork) : ?>
                            <option value="<?= $artwork['id_oeuvres'] ?>"><?= $artwork['nom_oeuvre'] ?></option>
                        <?php endforeach; ?>
                    </select>
                    <!-- Champ caché pour envoyer l'URL vers la page de génération QR code -->
                    <input type="hidden" name="qr_url" id="qr-url" value="192.168.18.239/GrandAngle/flashcode">
                    <div class="qr-container hide-on-print">
                        <p>Enter your text or URL</p>
                        <input type="text" placeholder="URL" id="qrText" value="<?= $url; ?>">
                    </div>

                    <div id="imgBox">
                        <img src="" id="qrImage">
                    </div>

                    <div class="hide-on-print">
                        <button type="button" id="generateBtn">Generate QR code</button>
                        <button id="btnPrint">Imprimer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>


<script>
    let imgBox = document.getElementById("imgBox");
    let qrImage = document.getElementById("qrImage");
    let qrText = document.getElementById("qrText");
    let generateBtn = document.getElementById("generateBtn");
    let qrUrl = document.getElementById("qr-url").value;

    generateBtn.addEventListener("click", generateQR);

    function generateQR() {
        if (qrText.value.length > 0) {
            let urlWithParams = qrUrl + "?id_artiste=" + document.getElementById("artiste-plan").value +
                "&id_oeuvre=" + document.getElementById("oeuvre-plan").value;
            qrImage.src = "https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=" +
                encodeURIComponent(urlWithParams);
            imgBox.classList.add("show-img");
            saveQRCode(qrImage.src);
        } else {
            qrText.classList.add('error');
            setTimeout(() => {
                qrText.classList.remove('error');
            }, 1000);
        }
    }

    document.getElementById("btnPrint").addEventListener("click", function() {
        window.print();
    });
</script>
