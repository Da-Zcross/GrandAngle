<?php
require_once '../config/pdo.php';

$id_oeuvres = $_GET['id'] ?? null;

if (!$id_oeuvres) {
    echo "ID de l'œuvre non spécifié.";
    exit();
}

try {
    $sql = "SELECT oeuvres_expo.*, theme.libelle_theme
            FROM oeuvres_expo 
            INNER JOIN theme ON oeuvres_expo.id_theme = theme.id_theme
            WHERE oeuvres_expo.id_oeuvres = :id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id', $id_oeuvres);
    $stmt->execute();
    $oeuvre = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$oeuvre) {
        echo "Aucune œuvre trouvée avec cet ID.";
        exit();
    }
} catch (PDOException $e) {
    echo "Erreur de requête : " . $e->getMessage();
    exit();
}
?>

<div class="container">
    <div class="card">
        <h2><?= $oeuvre["nom_oeuvre"] ?></h2>
        <img src="<?= $oeuvre["chemin_image"] ?>" alt="<?= $oeuvre["nom_oeuvre"] ?>">
        <img src="<?= $cheminQRCode ?>" alt="QR Code">
        <p><?= $oeuvre["description_oeuvre"] ?></p>
        <p>Date de réalisation: <?= $oeuvre["date_realisation"] ?></p>
        <p>Dimensions: <?= $oeuvre["largeur"] ?> x <?= $oeuvre["hauteur"] ?> x <?= $oeuvre["profondeur"] ?></p>
        <p>Date de livraison prévue: <?= $oeuvre["date_livraison_prevu"] ?></p>
        <p>Date de livraison réelle: <?= $oeuvre["date_livraison_reel"] ?></p>
        <p>Type d'œuvre: <?= $oeuvre["libelle_theme"] ?></p>
    </div>
</div>

<button id="lectureVocale">
    <img src="../assets/images/microphone.png" alt="Microphone">
</button>

<select id="langue">
    <option value="fr">Français</option>
    <option value="en">Anglais</option>
    <option value="ru">Russe</option>
    <option value="zh">Chinois</option>
</select>

<label for="rythme">Rythme de lecture:</label>
<input type="range" id="rythme" name="rythme" min="0.5" max="2" step="0.1" value="1">

<label for="volume">Volume:</label>
<input type="range" id="volume" name="volume" min="0" max="1" step="0.1" value="1">

<script>
document.addEventListener('DOMContentLoaded', function() {
    const boutonLecture = document.getElementById('lectureVocale');
    const selectLangue = document.getElementById('langue');
    const rythmeLecture = document.getElementById('rythme');
    const volumeAudio = document.getElementById('volume');
    let syntheseVocale = null;

    boutonLecture.addEventListener('click', function() {
        if (syntheseVocale && window.speechSynthesis.speaking) {
            window.speechSynthesis.cancel();
            syntheseVocale = null;
            return;
        }
        
        const contenuOeuvre = document.querySelector('.card').innerText;
        const selectedLang = selectLangue.value;
        const rythme = parseFloat(rythmeLecture.value);
        const volume = parseFloat(volumeAudio.value);
        syntheseVocale = new SpeechSynthesisUtterance(contenuOeuvre);
        syntheseVocale.lang = selectedLang;
        syntheseVocale.rate = rythme;
        syntheseVocale.volume = volume;
        window.speechSynthesis.speak(syntheseVocale);
    });

    // Mettre à jour le rythme de lecture en temps réel
    rythmeLecture.addEventListener('input', function() {
        if (syntheseVocale) {
            syntheseVocale.rate = parseFloat(rythmeLecture.value);
        }
    }); 

    // Mettre à jour le volume en temps réel
    volumeAudio.addEventListener('input', function() {
        if (syntheseVocale) {
            syntheseVocale.volume = parseFloat(volumeAudio.value);
        }
    });
});
</script>
