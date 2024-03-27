<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maison d'exposition</title>
    <style>
        .container {
            display: flex;
            justify-content: space-between;
        }

        .exhibition-areas {
            display: flex;
            gap: 20px;
        }

        .exhibition-area {
            width: 200px;
            height: 200px;
            background-color: #f0f0f0;
            border: 1px solid #ccc;
            display: grid;
            grid-template-columns: repeat(3, 1fr); /* 3 colonnes pour le damier */
            grid-template-rows: repeat(3, 1fr); /* 3 lignes pour le damier */
        }

        .cell {
            border: 1px solid #ccc;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .has-artwork {
            background-color: lightgreen; /* Couleur de fond pour les cellules avec une œuvre */
        }

        .artwork-mark {
            font-size: 24px;
        }

        .sidebar {
            width: 200px;
            background-color: #f0f0f0;
            border: 1px solid #ccc;
            padding: 10px;
        }

        .artworks-list {
            list-style-type: none;
            padding: 0;
        }

        .artworks-list li {
            margin-bottom: 10px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="exhibition-areas">
            <?php
            // Connexion à la base de données
            define("DBHOST", "127.0.0.1");
            define("DBUSER", "root");
            define("DBPASS", "");
            define("DBNAME", "grand");

            try {
                $db = new PDO("mysql:host=" . DBHOST . ";dbname=" . DBNAME, DBUSER, DBPASS);
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                // Requête SQL pour récupérer les espaces d'exposition
                $sql = "SELECT * FROM espace";

                // Préparation de la requête
                $stmt = $db->prepare($sql);

                // Exécution de la requête
                $stmt->execute();

                // Vérifier s'il y a des résultats
                if ($stmt->rowCount() > 0) {
                    // Boucle à travers les résultats
                    while ($row = $stmt->fetch()) {
                        $id_espace = $row['id_plan'];
                        $libelle_espace = $row['libelle_espace'];

                        // Afficher chaque espace d'exposition sous forme de damier
                        echo "<div class='exhibition-area'>";
                        echo "<h2>Espace $libelle_espace</h2>";

                        // Requête pour récupérer les œuvres dans cet espace
                        $sql_artworks = "SELECT * FROM oeuvres_expo WHERE id_plan = :id_espace";
                        $stmt_artworks = $db->prepare($sql_artworks);
                        $stmt_artworks->bindParam(':id_espace', $id_espace);
                        $stmt_artworks->execute();
                        $artworks = $stmt_artworks->fetchAll(PDO::FETCH_ASSOC);

                        // Boucle pour créer les cellules du damier
                        for ($i = 1; $i <= 9; $i++) { // 9 cellules pour un damier 3x3
                            $cell_has_artwork = false;
                            $artwork_name = '';
                            foreach ($artworks as $artwork) {
                                if ($artwork['id_expo'] == $i) {
                                    $cell_has_artwork = true;
                                    $artwork_name = $artwork['nom_oeuvre'];
                                    break;
                                }
                            }

                            echo "<div class='cell";
                            if ($cell_has_artwork) {
                                echo " has-artwork";
                            }
                            echo "'>";
                            if ($cell_has_artwork) {
                                echo "<span class='artwork-mark'>$artwork_name</span>";
                            } else {
                                echo "<span class='artwork-mark'>X</span>";
                            }
                            echo "</div>";
                        }

                        echo "</div>";
                    }
                } else {
                    echo "Aucun espace d'exposition trouvé.";
                }
            } catch (PDOException $e) {
                echo "Erreur de connexion à la base de données : " . $e->getMessage();
            }
            ?>
        </div>
        <div class="sidebar">
            <h2>Liste des œuvres</h2>
            <ul class="artworks-list">
                <?php
                // Connexion à la base de données
                try {
                    $db = new PDO("mysql:host=" . DBHOST . ";dbname=" . DBNAME, DBUSER, DBPASS);
                    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    // Requête SQL pour récupérer la liste des œuvres
                    $sql = "SELECT id_oeuvres, nom_oeuvre FROM oeuvres_expo";

                    // Préparation de la requête
                    $stmt = $db->prepare($sql);

                    // Exécution de la requête
                    $stmt->execute();

                    // Vérifier s'il y a des résultats
                    if ($stmt->rowCount() > 0) {
                        // Boucle à travers les résultats
                        while ($row = $stmt->fetch()) {
                            $id_oeuvre = $row['id_oeuvres'];
                            $nom_oeuvre = $row['nom_oeuvre'];

                            // Afficher chaque œuvre dans une liste avec un lien pour ajouter à un espace
                            echo "<li class='artwork' data-id='$id_oeuvre'>$nom_oeuvre</li>";
                        }
                    } else {
                        echo "Aucune œuvre trouvée.";
                    }
                } catch (PDOException $e) {
                    echo "Erreur de connexion à la base de données : " . $e->getMessage();
                }
                ?>
            </ul>
        </div>
    </div>
<!-- Script JavaScript pour gérer l'ajout d'œuvres à des espaces -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
    // Récupération de tous les éléments de la classe "artwork"
    const artworks = document.querySelectorAll('.artwork');

    // Ajout d'un écouteur d'événements "click" à chaque œuvre de la liste
    artworks.forEach(artwork => {
        artwork.addEventListener('click', () => {
            // Récupération de l'identifiant de l'œuvre
            const artworkId = artwork.dataset.id;

            // Afficher une boîte de dialogue pour choisir l'espace
            const selectedSpace = prompt("Dans quel espace souhaitez-vous ajouter cette œuvre ? (Entrez le numéro de l'espace)");

            // Si l'utilisateur a annulé la saisie ou a cliqué sur "Annuler"
            if (selectedSpace === null) {
                return;
            }

            // Vérification que l'utilisateur a entré un numéro d'espace valide
            const spaceId = parseInt(selectedSpace);
            if (!isNaN(spaceId) && spaceId >= 1 && spaceId <= 9) {
                // Mettre à jour l'interface utilisateur pour représenter l'ajout de l'œuvre à l'espace sélectionné
                const selectedCell = document.querySelector(`.exhibition-area:nth-child(${spaceId}) .cell:not(.has-artwork) .artwork-mark`);
                if (selectedCell) {
                    selectedCell.textContent = artwork.textContent;
                    selectedCell.parentNode.classList.add('has-artwork');
                    // Retirer l'œuvre de la liste des œuvres
                    artwork.remove();
                } else {
                    alert("Cet espace est déjà plein.");
                }
            } else {
                alert("Numéro d'espace invalide. Veuillez entrer un numéro entre 1 et 9.");
            }
        });
    });
});
</script>