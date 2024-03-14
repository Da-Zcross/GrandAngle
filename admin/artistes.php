<?php
session_start();
require_once "../config/pdo.php";
$sql = "SELECT *
    FROM artiste";
$requete = $db->query($sql);
$artistes = $requete->fetchAll(PDO::FETCH_ASSOC);
$db = null;
$titre = "Artistes";
$nav = "artistes";
include "includes/pages/header.php";
?>


<section id="super_grid_container">
  <div id="grid_container_dash">
    <div class="left">
      <?php include "./includes/components/sidebar_left.php"; ?>
    </div>
    <div class="middle">
      <div class="bloc_btn_add_art">
        <button class="btn_add_artiste"><a href="add_artiste.php">Ajouter Artiste</a></button>
      </div>
      <div class="bloc_list">
        <table id="data" class="list">
          <thead>
            <tr>
              <th>id</th>
              <th>Nom</th>
              <th>Prénom</th>
              <th>E-mail</th>
              <th>Date de naissance</th>
              <th>Date de décès</th>
              <th>Modifier</th>
              <th>Supprimer</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($artistes as $artiste) : ?>
              <tr>
                <td><?= $artiste["id_artiste"] ?></td>
                <td><?= $artiste["nom_artiste"] ?></td>
                <td><?= $artiste["prenom_artiste"] ?></td>
                <td><?= $artiste["email_artiste"] ?></td>
                <td><?= $artiste["date_naissance_artiste"] ?></td>
                <td><?= $artiste["date_deces_artiste"] ?></td>
                <td><a href="updating_artiste.php?id_artiste=<?= $artiste['id_artiste'] ?>"><i class="fa-solid fa-pen"></i></a></td>
                <td><a href="#" class="delete_artiste_link link" data-id="<?= $artiste["id_artiste"] ?>"><i class="fa-solid fa-trash-can"></i></a></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
        <?php foreach ($artistes as $artiste) : ?>
          <div class="project-box-wrapper" id="<?= $artiste["id_artiste"] ?>">
            <div class="delete_artiste_overlay" id="delete_artiste_overlay-<?= $artiste['id_artiste'] ?>">
              <div class="container_dlt">
                <div class="infos_dlt">
                  <p>Voulez-vous vraiment supprimer <span><?= $artiste['nom_artiste'] ?></span> <span><?= $artiste['prenom_artiste'] ?></span> (ID: <?= $artiste['id_artiste'] ?>)?</p>
                  <div class="button_dlt">
                    <button id="confirm_delete_button" data-artiste-id="<?= $artiste['id_artiste'] ?>">Oui, supprimer maintenant</button>
                    <button id="cancel_delete_button">Non, supprimer plus tard</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
</section>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    const content = document.getElementById('data');
    const itemsPerPage = 5;
    let currentPage = 0;
    const items = Array.from(content.getElementsByTagName('tr')).slice(1);

    function showPage(page) {
      const startIndex = page * itemsPerPage;
      const endIndex = startIndex + itemsPerPage;
      items.forEach((item, index) => {
        item.classList.toggle('hidden', index < startIndex || index >= endIndex);
      });
      updateActiveButtonStates();
    }

    function createPageButtons() {
      const totalPages = Math.ceil(items.length / itemsPerPage);
      const paginationContainer = document.createElement('div');
      const paginationDiv = document.body.appendChild(paginationContainer);
      paginationContainer.classList.add('pagination');

      for (let i = 0; i < totalPages; i++) {
        const pageButton = document.createElement('button');
        pageButton.textContent = i + 1;
        pageButton.addEventListener('click', () => {
          currentPage = i;
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
  });

  const deleteLinks = document.querySelectorAll('.delete_artiste_link');

  deleteLinks.forEach(function(deleteLink) {
    const projectWrapper = deleteLink.closest('.project-box-wrapper')
    const modal = deleteLink.closest('.bloc_list').querySelector('.delete_artiste_overlay');
    const confirmButton = modal.querySelector('#confirm_delete_button');
    const cancelButton = modal.querySelector('#cancel_delete_button');

    deleteLink.addEventListener('click', function(event) {
      event.preventDefault();
      const artisteId = this.getAttribute('data-id');
      console.log('Lien cliqué, ID:', artisteId);
      console.log('ID de l\'artiste à supprimer:', artisteId);
      modal.style.display = "block";
      confirmButton.setAttribute('data-artiste-id', artisteId); // Mettre à jour l'attribut data-artiste-id
    });


    cancelButton.addEventListener('click', function(event) {
      event.preventDefault();
      modal.style.display = "none";
    });

    confirmButton.addEventListener('click', function(event) {
      event.preventDefault();
      const artisteId = this.getAttribute('data-artiste-id');

      const xhr = new XMLHttpRequest();
      xhr.open('POST', 'delete_artiste.php');
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
      xhr.onload = function() {
        if (xhr.status === 200) {
          const projectWrapper = deleteLink.closest('.project-box-wrapper');
          projectWrapper.parentNode.removeChild(projectWrapper);
        } else {
          console.error('Erreur lors de la suppression du projet');
        }
      };
      xhr.send('id_artiste=' + artisteId);
    });
  });
</script>