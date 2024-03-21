<?php
ini_set('display_errors', 'on');

session_start();
if (!isset($_SESSION['user'])) {
    header('Location: connexion.php');
    exit();
}
require_once "../config/pdo.php";

$sql = "SELECT collaborateur.*, postes.libelle_poste
FROM collaborateur
LEFT JOIN postes ON collaborateur.id_poste = postes.id_poste";

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

                        <?php 
                        // Initialisez la variable $collab avec un tableau vide
                        $collab = [];

                        foreach ($collaborateurs as $collaborateur) : 
                            if ($collaborateur["id_collab"] == $_SESSION['user']['id_collab']) {
                                $collab[] = $collaborateur; // Stockez l'utilisateur connecté dans un tableau séparé
                            } else {
                                $autres_collabs[] = $collaborateur; // Stockez les autres collaborateurs dans un tableau séparé
                            }
                        endforeach;

                        // Affichez d'abord l'utilisateur connecté, puis les autres collaborateurs
                        foreach ($collab as $collaborateur) : ?>
                            <tr style="background-color: #f0f0f0;">
                                <td><?= $collaborateur["id_collab"] ?></td>
                                <td><?= $collaborateur["nom_collab"] ?></td>
                                <td><?= $collaborateur["prenom_collab"] ?></td>
                                <td><?= $collaborateur["libelle_poste"] ?></td>
                                <td><a href="updating_collaborateur.php?id_collab=<?= $collaborateur['id_collab'] ?>"><i class="fa-solid fa-pen"></i></a></td>
                                <td><a href="#" class="delete_collab_link link" data-id="<?= $collaborateur["id_collab"] ?>" data-nom="<?= $collaborateur["nom_collab"] ?>"><i class="fa-solid fa-trash-can"></i></a></td>
                            </tr>
                        <?php endforeach;

                        // Affichez les autres collaborateurs
                        foreach ($autres_collabs as $collaborateur) : ?>
                            <tr class="collab_wrap">
                                <td><?= $collaborateur["id_collab"] ?></td>
                                <td><?= $collaborateur["nom_collab"] ?></td>
                                <td><?= $collaborateur["prenom_collab"] ?></td>
                                <td><?= $collaborateur["libelle_poste"] ?></td>
                                <td><a href="updating_collaborateur.php?id_collab=<?= $collaborateur['id_collab'] ?>"><i class="fa-solid fa-pen"></i></a></td>
                                <td><a href="#" class="delete_collab_link link" data-id="<?= $collaborateur["id_collab"] ?>" data-nom="<?= $collaborateur["nom_collab"] ?>"><i class="fa-solid fa-trash-can"></i></a></td>
                            </tr>
                            <div class="delete_collab_overlay" id="delete_collab_overlay-<?= $collaborateur['id_collab'] ?>">
                                <p>Voulez-vous vraiment supprimer <?= $collaborateur['nom_collab'] ?>?</p>
                                <div class="button_dlt">
                                    <button id="confirm_delete_button" data-oeuvre-id="<?= $collaborateur['id_collab'] ?>">Oui, supprimer maintenant</button>
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

    const deleteLinks = document.querySelectorAll('.delete_collab_link');

    deleteLinks.forEach(function(deleteLink) {
      deleteLink.addEventListener('click', function(event) {
        event.preventDefault();
        const collabId = this.getAttribute('data-id');
        const collabNom = this.getAttribute('data-nom');

        const modalId = `delete_collab_overlay-${collabId}`;
        const modal = document.getElementById(modalId);

        if (modal) {
          const confirmButton = modal.querySelector('#confirm_delete_button');
          const cancelButton = modal.querySelector('#cancel_delete_button');
          modal.style.display = "block";
          confirmButton.setAttribute('data-collab-id', collabId);

          cancelButton.addEventListener('click', function(event) {
            event.preventDefault();
            modal.style.display = "none";
          });

          confirmButton.addEventListener('click', function(event) {
            event.preventDefault();
            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'delete_collaborateur.php');
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onload = function() {
              if (xhr.status === 200) {
                const projectWrapper = deleteLink.closest('.collab_wrap');
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
            xhr.send('id_collab=' + collabId);
          });
        }
      });
    });
  });
</script>