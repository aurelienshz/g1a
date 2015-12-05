<?php
/**************************************************/
require MODELES.'membres/getUserAuth.php';
require MODELES.'membres/setUserLastLogin.php';

/* Affichage du formulaire */
$title = 'Connexion';
$style = ['form.css'];

$errorMessage = 'Une erreur s\'est produite. Merci de réessayer !';

/* Contrôle des id du formulaire ou affichage du formulaire */
if(!empty($_POST)) {        // Formulaire envoyé
    if($_POST['username'] && $_POST['password']) { // Tous les champs remplis
        $auth = getUserAuth($_POST['username']);

        if(is_array($auth) && password_verify($_POST['password'], $auth['mdp'])) {
            // Positionnement des variables de session :
            $_SESSION['connected'] = True;
            $_SESSION['username'] = $_POST['username'];
            $_SESSION['id'] = $auth['id'];

            // Mise à jour de la date de dernière connexion :
            setUserLastLogin();

            if(!isset($auth['date_derniere_connexion'])) {
                alert('info', 'C\'est la première fois que vous vous connectez ! Prenez quelques minutes pour compléter votre profil !');
                header('Location: '.getLink(['membres','modification_profil']));
                exit();
            }

            // Sortie du script et redirection vers la page précédant la connexion :
            header('Location: '.getLink($_SESSION['previousPage']));
            exit();
        }
        else {
            alert('error', $errorMessage);
        }
    }
    else {
        alert('error', 'Tous les champs sont requis !');
    }
}

vue(['connexion'],$style,$title);
