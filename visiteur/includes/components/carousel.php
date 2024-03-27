<?php
require_once "../config/pdo.php";

try {
    $images = array();

    for ($i = 1; $i <= 6; $i++) {
        $sql = "SELECT nom_oeuvre, chemin_image FROM oeuvres_expo ORDER BY RAND() LIMIT 1";
        $stmt = $db->query($sql);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        $images[$i]['chemin_image'] = $result ? $result['chemin_image'] : "../assets/images/img_cards/placeimage.jpg";
    }
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}
?>
<div class="interTitle2 ">
      <?php echo intertitle2 ?>
</div>
<div class="carousel auto-play">
  <ul class="slides">
    <?php for ($i = 1; $i <= 6; $i++): ?>
    <li id="slide-<?php echo $i; ?>" class="slide">
     <a href="oeuvres.php"> <img  src="<?php echo $images[$i]['chemin_image']; ?>" alt="oeuvre" /></a>
     
    </li>
    <?php endfor; ?>
  </ul>
  <ul class="nav-dots">
    <li class="dot"><a href="#slide-1"></a></li>
    <li class="dot"><a href="#slide-2"></a></li>
    <li class="dot"><a href="#slide-3"></a></li>
    <li class="dot"><a href="#slide-4"></a></li>
    <li class="dot"><a href="#slide-5"></a></li>
    <li class="dot"><a href="#slide-6"></a></li>
  </ul>
  
</div>

