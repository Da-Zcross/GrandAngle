<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: connexion.php');
    exit();
}
require_once "../config/pdo.php";


$sql = "SELECT exposition.*, theme.libelle_theme
FROM exposition
LEFT JOIN theme ON exposition.id_theme = theme.id_theme";

$requete = $db->query($sql);
$expos = $requete->fetchAll(PDO::FETCH_ASSOC);
$titre = "Exposition";
$nav = "exposition";
include "includes/pages/header.php";
?>


<section id="super_grid_container">
    <div id="grid_container_dash">
        <div class="left">
            <?php include "./includes/components/sidebar_left.php"; ?>
        </div>
        <div class="middle">
            <div>
                <h1>Liste des expositions</h1>
            </div>

            <div class="bloc_btn_add_art">
                <button class="btn_add_artiste"><a href="add_exposition.php">Ajouter Exposition</a></button>
            </div>

            <div class="bloc_list">
                <table id="data" class="list">
                    <thead>

                        <tr>
                            <th>id</th>
                            <th>nom_expo</th>
                            <th>Theme</th>
                            <th>date_debut</th>
                            <th>date_fin</th>
                            <th>prenom_directeur_artistique</th>
                            <th>email_directeur_artistique</th>
                            <th>nombre_oeuvres</th>
                            <th>modifier</th>
                            <th>supprimer</th>
                        </tr>

                    </thead>
                    <tbody>

                        <?php foreach ($expos as $expo) : ?>
                            <tr class="expo_wrap" id="<?= $expo["id_expo"] ?>">
                                <td><?= $expo["id_expo"] ?></td>
                                <td><?= $expo["nom_expo"] ?></td>
                                <td><?= $expo["libelle_theme"] ?></td>
                                <td><?= $expo["date_debut"] ?></td>
                                <td><?= $expo["date_fin"] ?></td>
                                <td><?= $expo["prenom_directeur_artistique"] ?></td>
                                <td><?= $expo["email_directeur_artistique"] ?></td>
                                <td><?= $expo["nombre_oeuvres"] ?></td>
                                <td><a href="updating_expo.php?id_expo=<?= $expo["id_expo"] ?>"><i class="fa-solid fa-pen"></i></a></td>
                                <td><a href="#" class="delete_expo_link link" data-id="<?= $expo["id_expo"] ?>" data-nom="<?= $expo["nom_expo"] ?>"><i class="fa-solid fa-trash-can"></i></a></td>
                                <div class="delete_expo_overlay" id="delete_expo_overlay-<?= $expo['id_expo'] ?>">
                                    <p>Voulez-vous vraiment supprimer <?= $expo['nom_expo'] ?> ?</p>
                                    <div class="button_dlt">
                                        <button id="confirm_delete_button" data-expo-id="<?= $expo['id_expo'] ?>">Oui, supprimer maintenant</button>
                                        <button id="cancel_delete_button">Non, supprimer plus tard</button>
                                    </div>
                                </div>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const content = document.getElementById('data');
        const itemsPerPage = 15;
        let currentPage = localStorage.getItem('currentPage') || 0;

        function showPage(page) {
            const items = Array.from(content.getElementsByTagName('tr')).slice(1);
            const startIndex = page * itemsPerPage;
            const endIndex = startIndex + itemsPerPage;
            items.forEach((item, index) => {
                item.classList.toggle('hidden', index < startIndex || index >= endIndex);
            });
            updateActiveButtonStates();
        }

        function createPageButtons() {
            const items = Array.from(content.getElementsByTagName('tr')).slice(1);
            const totalPages = Math.ceil(items.length / itemsPerPage);
            const paginationContainer = document.createElement('div');
            const paginationDiv = document.body.appendChild(paginationContainer);
            paginationContainer.classList.add('pagination');

            for (let i = 0; i < totalPages; i++) {
                const pageButton = document.createElement('button');
                pageButton.textContent = i + 1;
                pageButton.addEventListener('click', () => {
                    currentPage = i;
                    localStorage.setItem('currentPage', currentPage);
                    showPage(currentPage);
                    updateActiveButtonStates();
                });

                content.appendChild(paginationContainer);
                paginationDiv.appendChild(pageButton);
            }
        }

        function updateActiveButtonStates() {
            const pageButtons = document.querySelectorAll('.pagination button');
            pageButtons.forEach((button, index) => {
                if (index === currentPage) {
                    button.classList.add('active');
                } else {
                    button.classList.remove('active');
                }
            });
        }

        createPageButtons();
        showPage(currentPage);

        const deleteLinks = document.querySelectorAll('.delete_expo_link');

        deleteLinks.forEach(function(deleteLink) {
            deleteLink.addEventListener('click', function(event) {
                event.preventDefault();
                const expoId = this.getAttribute('data-id');
                const expoNom = this.getAttribute('data-nom');

                const modalId = `delete_expo_overlay-${expoId}`;
                const modal = document.getElementById(modalId);

                if (modal) {
                    const confirmButton = modal.querySelector('#confirm_delete_button');
                    const cancelButton = modal.querySelector('#cancel_delete_button');
                    modal.style.display = "block";
                    confirmButton.setAttribute('data-expo-id', expoId);

                    cancelButton.addEventListener('click', function(event) {
                        event.preventDefault();
                        modal.style.display = "none";
                    });

                    confirmButton.addEventListener('click', function(event) {
                        event.preventDefault();
                        const xhr = new XMLHttpRequest();
                        xhr.open('POST', 'delete_expo.php');
                        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                        xhr.onload = function() {
                            if (xhr.status === 200) {
                                const projectWrapper = deleteLink.closest('.expo_wrap');
                                projectWrapper.parentNode.removeChild(projectWrapper);
                                modal.style.display = 'none';
                                if (currentPage > 0 && content.getElementsByTagName('tr').length <= (currentPage + 1) * itemsPerPage) {
                                    currentPage--;
                                    localStorage.setItem('currentPage', currentPage);
                                }
                                const paginationContainer = document.querySelector('.pagination');
                                paginationContainer.parentNode.removeChild(paginationContainer);
                                createPageButtons();
                                showPage(currentPage);
                                updateActiveButtonStates();
                            } else {
                                console.error('Erreur lors de la suppression de l\'artiste');
                            }
                        };
                        xhr.send('id_expo=' + expoId);
                    });
                }
            });
        });
    });
</script>