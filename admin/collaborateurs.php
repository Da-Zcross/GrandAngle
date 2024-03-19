<?php 
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: connexion.php');
    exit();
}
require_once "../config/pdo.php";

$sql = "SELECT collaborateur.*, postes.libelle_poste
FROM collaborateur
LEFT JOIN postes ON collaborateur.id_collab = postes.id_poste";

$requete = $db->query($sql);
$collaborateurs = $requete->fetchAll(PDO::FETCH_ASSOC);
$db = null;
$titre = "Collaborateurs";
$nav= "collaborateurs";
include "includes/pages/header.php";
?>

<section id="super_grid_container">
    <div id="grid_container_dash">
        <div class="left">
            <?php include "./includes/components/sidebar_left.php"; ?>
        </div>
        <div class="middle">
            <div class="bloc_btn_add_art"><button class="btn_add_artiste"><a href="add_collaborateurs.php">Ajouter Collaborateur</a></button></div>
            <div class="bloc_list">
                <table id="data" class="list">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Nom collaborateur</th>
                            <th>Prenom collaborateur</th>
                            <th>Poste</th>
                            <th>modifier</th>
                            <th>supprimer</th>
                        </tr>

                    </thead>
                    <tbody>

                        <?php foreach ($collaborateurs as $collaborateur) : ?>
                            <tr>
                                <td><?= $collaborateur["id_collab"] ?></td>
                                <td><?= $collaborateur["nom_collab"] ?></td>
                                <td><?= $collaborateur["prenom_collab"] ?></td>
                                <td><?= $collaborateur["libelle_poste"] ?></td>
                                <td><a href="updating_collaborateur.php?id_collab=<?= $collaborateur['id_collab'] ?>"><i class="fa-solid fa-pen"></i></a></td>
                                <td><a href="#"><i class="fa-solid fa-trash-can"></i></a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>