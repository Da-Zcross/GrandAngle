<?php
session_start();

$host = 'localhost'; 
$dbname = 'grandangle'; 
$username = 'root';
$password = ''; 

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données: " . $e->getMessage());
}

$titre = "Thèmes d'expositions";
$nav = "thèmes";

$sql = "SELECT DISTINCT theme.id_theme, theme.libelle_theme, theme.description, theme.chemin_image 
        FROM theme 
        INNER JOIN oeuvres_expo ON theme.id_theme = oeuvres_expo.id_theme";
$stmt = $pdo->query($sql);

$themes = [];

if ($stmt) {
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $themes[] = $row;
    }
} else {
    echo "Erreur lors de la récupération des thèmes.";
}
?>


<style>
 .theme-container {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    grid-gap: 30px;
    justify-content: center;
    margin: 20px auto;
    max-width: 1000px; 
}

.theme {
    background-color: #f5f5f5;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease;
}

.theme:hover {
    transform: scale(1.05);
}

.theme img {
    width: 100%;
    height: 200px; 
    object-fit: cover;
    border-radius: 10px 10px 0 0;
}

.theme-content {
    padding: 20px;
}

.theme h2 {
    margin-top: 0;
    font-size: 1.5rem;
    color: #333;
}

.theme p {
    margin-top: 0;
    font-size: 1rem;
    color: #666;
}

.theme-description {
    height: 100px;
    overflow: hidden;
    text-overflow: ellipsis;
}

.theme-description p {
    margin: 0;
}

@media screen and (max-width: 768px) {
    .theme-container {
        grid-template-columns: 1fr;
    }
}


    </style>
    <h1><?php echo $titre; ?></h1>
        <div class="theme-container">

            <?php foreach ($themes as $theme) : ?>
                
                <div class="theme">

                    <h2><?php echo $theme['libelle_theme']; ?></h2>
                    
                    <a href="oeuvres_par_theme.php?id_theme=<?php echo $theme['id_theme']; ?>">
                        <img src="<?php echo $theme['chemin_image']; ?>" alt="<?php echo $theme['libelle_theme']; ?>">
                    </a>

                    <p><?php echo $theme['description']; ?></p>

                </div>

            <?php endforeach; ?>

        </div>
