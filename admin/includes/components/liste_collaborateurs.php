<?php
session_start();

define("DBHOST", "127.0.0.1");
define("DBUSER", "root");
define("DBPASS", "");
define("DBNAME", "grand");

try {
    $db = new PDO("mysql:host=" . DBHOST . ";dbname=" . DBNAME, DBUSER, DBPASS);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}

try {
    $sql = "SELECT collaborateur.*, postes.libelle_poste 
            FROM collaborateur 
            INNER JOIN postes ON collaborateur.id_poste = postes.id_poste";
    $stmt = $db->query($sql);
    $collaborateurs = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Erreur de requête : " . $e->getMessage();
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["editId"], $_POST["editNom"], $_POST["editPrenom"], $_POST["editEmail"], $_POST["editAdresse"], $_POST["editCP"], $_POST["editVille"], $_POST["editPoste"], $_POST["editRoles"])) {
        $editId = $_POST["editId"];
        $editNom = $_POST["editNom"];
        $editPrenom = $_POST["editPrenom"];
        $editEmail = $_POST["editEmail"];
        $editAdresse = $_POST["editAdresse"];
        $editCP = $_POST["editCP"];
        $editVille = $_POST["editVille"];
        $editPoste = $_POST["editPoste"];
        $editRoles = $_POST["editRoles"];

        try {
            $stmt = $db->prepare("SELECT id_poste FROM postes WHERE libelle_poste = ?");
            $stmt->execute([$editPoste]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($row) {
                $editPosteId = $row['id_poste'];
            } else {
                echo "Erreur : Poste invalide.";
                exit();
            }

            $sql = "UPDATE collaborateur 
                    SET nom_collab = :nom_collab, prenom_collab = :prenom_collab, email_collab = :email_collab, 
                        adresse_collab = :adresse_collab, cp_collab = :cp_collab, ville_collab = :ville_collab, 
                        id_poste = :id_poste, roles = :roles 
                    WHERE id_collab = :id_collab";
            $stmt = $db->prepare($sql);
            $stmt->bindValue(":nom_collab", $editNom, PDO::PARAM_STR);
            $stmt->bindValue(":prenom_collab", $editPrenom, PDO::PARAM_STR);
            $stmt->bindValue(":email_collab", $editEmail, PDO::PARAM_STR);
            $stmt->bindValue(":adresse_collab", $editAdresse, PDO::PARAM_STR);
            $stmt->bindValue(":cp_collab", $editCP, PDO::PARAM_INT);
            $stmt->bindValue(":ville_collab", $editVille, PDO::PARAM_STR);
            $stmt->bindValue(":id_poste", $editPosteId, PDO::PARAM_INT);
            $stmt->bindValue(":roles", $editRoles, PDO::PARAM_STR);
            $stmt->bindValue(":id_collab", $editId, PDO::PARAM_INT);
            $stmt->execute();

            header("Location: liste_collaborateurs.php");
            exit();
        } catch (PDOException $e) {
            echo "Erreur de modification : " . $e->getMessage();
        }
    } elseif (isset($_POST["cancelId"])) {
        $cancelId = $_POST["cancelId"];
        $oldValues = $_SESSION["oldValues"][$cancelId];

        try {
            $sql = "UPDATE collaborateur 
                    SET nom_collab = :nom_collab, prenom_collab = :prenom_collab, email_collab = :email_collab, 
                        adresse_collab = :adresse_collab, cp_collab = :cp_collab, ville_collab = :ville_collab, 
                        id_poste = :id_poste, roles = :roles 
                    WHERE id_collab = :id_collab";
            $stmt = $db->prepare($sql);
            $stmt->bindValue(":nom_collab", $oldValues['nom_collab'], PDO::PARAM_STR);
            $stmt->bindValue(":prenom_collab", $oldValues['prenom_collab'], PDO::PARAM_STR);
            $stmt->bindValue(":email_collab", $oldValues['email_collab'], PDO::PARAM_STR);
            $stmt->bindValue(":adresse_collab", $oldValues['adresse_collab'], PDO::PARAM_STR);
            $stmt->bindValue(":cp_collab", $oldValues['cp_collab'], PDO::PARAM_INT);
            $stmt->bindValue(":ville_collab", $oldValues['ville_collab'], PDO::PARAM_STR);
            $stmt->bindValue(":id_poste", $oldValues['id_poste'], PDO::PARAM_INT);
            $stmt->bindValue(":roles", $oldValues['roles'], PDO::PARAM_STR);
            $stmt->bindValue(":id_collab", $cancelId, PDO::PARAM_INT);
            $stmt->execute();

            header("Location: liste_collaborateurs.php");
            exit();
        } catch (PDOException $e) {
            echo "Erreur d'annulation : " . $e->getMessage();
        }
    }
}
?>

<table>
    <thead>
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>E-mail</th>
            <th>Adresse</th>
            <th>Code Postal</th>
            <th>Ville</th>
            <th>Poste</th>
            <th>Rôles</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($collaborateurs as $collaborateur) : ?>
            <tr>
                <td><?php echo htmlspecialchars($collaborateur['nom_collab']); ?></td>
                <td><?php echo htmlspecialchars($collaborateur['prenom_collab']); ?></td>
                <td><?php echo htmlspecialchars($collaborateur['email_collab']); ?></td>
                <td><?php echo htmlspecialchars($collaborateur['adresse_collab']); ?></td>
                <td><?php echo htmlspecialchars($collaborateur['cp_collab']); ?></td>
                <td><?php echo htmlspecialchars($collaborateur['ville_collab']); ?></td>
                <td><?php echo htmlspecialchars($collaborateur['libelle_poste']); ?></td>
                <td><?php echo htmlspecialchars($collaborateur['roles']); ?></td>
                <td>
                    <button class="edit-btn" data-id="<?php echo htmlspecialchars($collaborateur['id_collab']); ?>">
                        <img src="#" alt="Modifier" /> Modifier
                    </button>
                    <form method="post" style="display: inline-block;">
                        <input type="hidden" name="deleteId" value="<?php echo htmlspecialchars($collaborateur['id_collab']); ?>">
                        <button type="submit">
                            <img src="#" alt="Supprimer" /> Supprimer
                        </button>
                    </form>
                </td>
            </tr>
            <tr class="edit-row" style="display: none;">
                <td colspan="8">
                    <form method="post" class="edit-form">
                        <input type="hidden" name="editId" value="<?php echo htmlspecialchars($collaborateur['id_collab']); ?>">
                        <input type="text" name="editNom" value="<?php echo htmlspecialchars($collaborateur['nom_collab']); ?>">
                        <input type="text" name="editPrenom" value="<?php echo htmlspecialchars($collaborateur['prenom_collab']); ?>">
                        <input type="email" name="editEmail" value="<?php echo htmlspecialchars($collaborateur['email_collab']); ?>">
                        <input type="text" name="editAdresse" value="<?php echo htmlspecialchars($collaborateur['adresse_collab']); ?>">
                        <input type="text" name="editCP" value="<?php echo htmlspecialchars($collaborateur['cp_collab']); ?>">
                        <input type="text" name="editVille" value="<?php echo htmlspecialchars($collaborateur['ville_collab']); ?>">
                        <input type="text" name="editPoste" value="<?php echo htmlspecialchars($collaborateur['libelle_poste']); ?>">
                        <input type="text" name="editRoles" value="<?php echo htmlspecialchars($collaborateur['roles']); ?>">
                        <button type="submit" class="submit-btn">
                            <img src="#" alt="Valider" /> Valider
                        </button>
                        <button type="button" class="cancel-btn">
                            <img src="#" alt="Annuler" /> Annuler
                        </button>
                        <input type="hidden" name="cancelId" value="<?php echo htmlspecialchars($collaborateur['id_collab']); ?>">
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const editButtons = document.querySelectorAll(".edit-btn");

        editButtons.forEach(function(button) {
            button.addEventListener("click", function() {
                const editRow = button.parentElement.parentElement.nextElementSibling;
                const submitButton = editRow.querySelector(".submit-btn");
                const cancelButton = editRow.querySelector(".cancel-btn");
                const actionButtons = editRow.previousElementSibling.lastElementChild;

                actionButtons.style.display = 'none';

                submitButton.style.display = "inline-block";
                cancelButton.style.display = "inline-block";

                editRow.style.display = 'table-row';
            });
        });

        const cancelButton = document.querySelectorAll(".cancel-btn");

        cancelButton.forEach(function(button) {
            button.addEventListener("click", function() {
                const editRow = button.parentElement.parentElement.parentElement;
                const actionButtons = editRow.previousElementSibling.lastElementChild;

                // Affichage des boutons d'action de la ligne après annulation
                actionButtons.style.display = 'inline-block';

                // Cacher les boutons "Annuler" et "Valider"
                editRow.querySelector(".submit-btn").style.display = 'none';
                editRow.querySelector(".cancel-btn").style.display = 'none';

                // Afficher la ligne d'édition
                editRow.style.display = 'none';
            });
        });
    });
</script>
