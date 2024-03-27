<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: connexion.php');
    exit();
}

require_once "../config/pdo.php";

// $typeOeuvre = $db->query("SELECT id_type_oeuvre, libelle_type_oeuvre FROM type_oeuvre");
// $libelle_type_oeuvre = $typeOeuvre->fetchALL(PDO::FETCH_ASSOC);

$sql = "SELECT oeuvres_expo.*, type_oeuvre.libelle_type_oeuvre
FROM oeuvres_expo
LEFT JOIN type_oeuvre ON oeuvres_expo.id_type_oeuvre = type_oeuvre.id_type_oeuvre";

$requete = $db->query($sql);
$oeuvres = $requete->fetchAll(PDO::FETCH_ASSOC);

$titre = "Oeuvres";
$nav = "oeuvre";
include "includes/pages/header.php";
?>


<section id="super_grid_container">
    <div id="grid_container_dash">
        <div class="left">
            <?php include "./includes/components/sidebar_left.php"; ?>
        </div>
        <div class="middle">
            <div>
                <h1>Liste des oeuvres</h1>
            </div>

            <div class="bloc_btn_add_art">
                <button class="btn_add_artiste"><a href="add_oeuvres.php">Ajouter Oeuvre</a></button>
            </div>

            <div class="bloc_list">
                <table id="data" class="list">
                    <thead>

                        <tr>
                            <th>id</th>
                            <th>nom oeuvre</th>
                            <th>date realisation</th>
                            <th>largeur</th>
                            <th>hauteur</th>
                            <th>poids</th>
                            <th>type d'oeuvre</th>
                            <th>date livraison prévu</th>
                            <th>modifier</th>
                            <th>supprimer</th>
                        </tr>

                    </thead>
                    <tbody>
                        <?php foreach ($oeuvres as $oeuvre) : ?>
                            <tr class="oeuvre_wrap" id="<?= $oeuvre["id_oeuvres"] ?>">
                                <td><?= $oeuvre["id_oeuvres"] ?></td>
                                <td><?= $oeuvre["nom_oeuvre"] ?></td>
                                <td><?= $oeuvre["date_realisation"] ?></td>
                                <td><?= $oeuvre["largeur"] ?></td>
                                <td><?= $oeuvre["hauteur"] ?></td>
                                <td><?= $oeuvre["poids"] ?></td>
                                <td><?= $oeuvre["libelle_type_oeuvre"] ?></td>
                                <td><?= $oeuvre["date_livraison_prevu"] ?></td>
                                <td><a href="updating_oeuvre.php?id_oeuvres=<?= $oeuvre["id_oeuvres"] ?>"><i class="fa-solid fa-pen"></i></a></td>
                                <td><a href="#" class="delete_oeuvre_link link" data-id="<?= $oeuvre["id_oeuvres"] ?>" data-nom="<?= $oeuvre["nom_oeuvre"] ?>"><i class="fa-solid fa-trash-can"></i></a></td>
                            </tr>
                            <div class="delete_oeuvre_overlay" id="delete_oeuvre_overlay-<?= $oeuvre['id_oeuvres'] ?>">
                                <p>Voulez-vous vraiment supprimer <?= $oeuvre['nom_oeuvre'] ?>?</p>
                                <div class="button_dlt">
                                    <button id="confirm_delete_button" data-oeuvre-id="<?= $oeuvre['id_oeuvres'] ?>">Oui, supprimer maintenant</button>
                                    <button id="cancel_delete_button">Non, supprimer plus tard</button>
                                </div>
                            </div>
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

        const deleteLinks = document.querySelectorAll('.delete_oeuvre_link');

        deleteLinks.forEach(function(deleteLink) {
            deleteLink.addEventListener('click', function(event) {
                event.preventDefault();
                const oeuvreId = this.getAttribute('data-id');
                const oeuvreNom = this.getAttribute('data-nom');

                const modalId = `delete_oeuvre_overlay-${oeuvreId}`;
                const modal = document.getElementById(modalId);

                if (modal) {
                    const confirmButton = modal.querySelector('#confirm_delete_button');
                    const cancelButton = modal.querySelector('#cancel_delete_button');
                    modal.style.display = "block";
                    confirmButton.setAttribute('data-oeuvre-id', oeuvreId);

                    cancelButton.addEventListener('click', function(event) {
                        event.preventDefault();
                        modal.style.display = "none";
                    });

                    confirmButton.addEventListener('click', function(event) {
                        event.preventDefault();
                        const xhr = new XMLHttpRequest();
                        xhr.open('POST', 'delete_oeuvre.php');
                        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                        xhr.onload = function() {
                            if (xhr.status === 200) {
                                const projectWrapper = deleteLink.closest('.oeuvre_wrap');
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
                        xhr.send('id_oeuvres=' + oeuvreId);
                    });
                }
            });
        });
    });
</script>