<?php

function checkAccess($role_id) {
    if ($role_id == 1) { // Exemple : Administrateur
        // L'administrateur peut accéder à toutes les fonctionnalités
        return true;
    } elseif ($role_id == 2) { // Exemple : Contributeur
        // Le contributeur ne peut pas ajouter de collaborateur, modifier un autre utilisateur, ni supprimer un collaborateur
        // Vérifiez si l'utilisateur tente d'accéder à ces fonctionnalités et redirigez ou affichez un message d'erreur
        // Par exemple :
        header("Location: connexion.php"); // Redirection vers une page d'erreur
        exit();
    } elseif ($role_id == 3) { // Exemple : Utilisateur standard
        // L'utilisateur standard ne peut pas accéder à certaines fonctionnalités spécifiques
        // Vérifiez et contrôlez l'accès en fonction de ses permissions
    } else {
        // Autres cas
    }
}

?>