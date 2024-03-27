<?php

require_once "../config/language.php"; ?>
<!DOCTYPE html>
<html lang="fr, en, de, ru, zh">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil Grand Angle</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
</head>

<body>
    <header>

        <nav>
            <div class="nav-top">
                <div class="menu-items">
                    <ul class="nav_menu showMenu">

                        <li><a class="home menuItem" href="index.php?lang=<?php echo $_SESSION['lang']; ?>"><?php echo home ?></a></li>
                        <li><a class="artist menuItem" href="artistes.php?lang=<?php echo $_SESSION['lang']; ?>"><?php echo artist ?></a></li>
                        <li><a class="work menuItem" href="oeuvres.php?lang=<?php echo $_SESSION['lang']; ?>"><?php echo art ?></a></li>
                        <li><a class="expo menuItem" href="expo.php?lang=<?php echo $_SESSION['lang'];?>"><?php echo expo ?></a></li>
                        <li><a class="mention menuItem" href="#"><?php echo mention ?></a></li>
    <div id="nav-langues">
    <h5><?php echo lang ?> :</h5>
    <form method="GET" id="select_lang" action="">
        
        
        <select name="lang" onchange="changeLang(this.value);">
            <option value="FR" <?php if ($_SESSION['lang'] == "FR") { echo "selected"; } ?>>Français</option>
            <option value="EN" <?php if ($_SESSION['lang'] == "EN") { echo "selected"; } ?>>English</option>
            <option value="DE" <?php if ($_SESSION['lang'] == "DE") { echo "selected"; } ?>>Deutsh</option>
            <option value="RU" <?php if ($_SESSION['lang'] == "RU") { echo "selected"; } ?>>Russian</option>
            <option value="ZH" <?php if ($_SESSION['lang'] == "CH") { echo "selected"; } ?>>中国人</option>
        </select>
    </form>
</div>
                    </ul>

                </div>
                <button class="hamburger">
                    <i class="menu menuIcon fa-solid fa-bars "><?php echo menu ?></i>
                    <i class="reduire closeIcon fa-solid fa-xmark "> <?php echo reduire ?></i>
                </button>


        </nav>
        <div class="HeaderBand">
            <a href="index.php"><img src="../assets/images/img_cards/logo.png" alt="logo"></a>
            <h1>Galerie Grand Angle</h1>
        </div>



    </header>