<?php
session_start();
print_r($_SESSION);
require_once "../config/pdo.php";
$sql = "SELECT *
    FROM artiste";
$requete = $db->query($sql);
$artistes = $requete->fetchAll(PDO::FETCH_ASSOC);
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
            <div class="bloc_btn_add_art"><button class="btn_add_artiste"><a href="add_artiste.php">Ajouter Artiste</a></button></div>
            <div class="bloc_list">
                <table id="data" class="list">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>nom_artiste</th>
                            <th>prenom_artiste</th>
                            <th>email_artiste</th>
                            <th>date_naissance_artiste</th>
                            <th>date_deces_artiste</th>
                            <th>modifier</th>
                            <th>supprimer</th>
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
                                <td><a href="#"><i class="fa-solid fa-trash-can"></i></a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
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
  
    // Add page buttons
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
  
    createPageButtons(); // Call this function to create the page buttons initially
    showPage(currentPage);
  });
</script>
