<?php
$title = 'Inscription';
$style = ['form.css'];

if (empty($_POST)) { // Le formulaire n'a pas été rempli
    vue(['inscription'],$style,$title);
}
else {  // Le formulaire a été rempli
    if ($_POST['username'] && $_POST['email'] && $_POST['password'] && $_POST['password-confirm']) {     // Tous les champs sont remplis
        alert('ok', 'Tous les champs remplis');
        vue(['inscription'],$style,$title);
        // Vérifier qu'aucun des éléments bloquants n'a eu lieu :
            // Nom d'utilisateur déjà pris
            // Adresse e-mail invalide
            // Adresse e-mail déjà utilisée
            // Mot de passe invalide (nombre de caractères, caractères spéciaux nécessaires)
    }
    else { // Tous les champs ne sont pas rempls
        alert('error', 'Tous les champs sont requis !');
        vue(['inscription'],$style,$title);
    }
}
