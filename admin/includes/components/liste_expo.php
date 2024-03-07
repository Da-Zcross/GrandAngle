<?php
require_once "../config/pdo.php";
$sql = "SELECT *
    FROM exposition";
$requete = $db->query($sql);
$expos = $requete->fetchAll(PDO::FETCH_ASSOC);

?>


<table class="list">
    <thead>

        <tr>
            <th>
                <span class="custom-checkbox">
                    <input type="checkbox" id="checkbox1" name="options[]" value="1">
                    <label for="checkbox1"></label>
                </span>
            </th>
            <th>id</th>
            <th>nom_expo</th>
            <th>date_debut</th>
            <th>date_fin</th>
            <th>prenom_directeur_artistique</th>
            <th>email_directeur_artistique</th>
            <th>nombre_oeuvres</th>
        </tr>

    </thead>
    <tbody>

        <?php foreach ($expos as $expo) : ?>
            <tr>
                <td> <span class="custom-checkbox">
                        <input type="checkbox" id="checkbox1" name="options[]" value="1">
                        <label for="checkbox1"></label>
                    </span></td>
                <td><?= $expo["id_expo"] ?></td>
                <td><?= $expo["nom_expo"] ?></td>
                <td><?= $expo["date_debut"] ?></td>
                <td><?= $expo["date_fin"] ?></td>
                <td><?= $expo["prenom_directeur_artistique"] ?></td>
                <td><?= $expo["email_directeur_artistique"] ?></td>
                <td><?= $expo["nombre_oeuvres"] ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>