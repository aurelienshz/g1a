<?php
/******************************************************************************/
require MODELES.'membres/getUserAuth.php';

/* Affichage du formulaire */
function formConnexion() {
    $title = 'Connexion';
    $style = ['form.css'];
    vue(['connexion'],$style,$title);
}

/*
// La redirection ne fonctionne pas ! :(
if(!isset($_SESSION['redirection'])) {
    if($_SESSION['previousPage']!=['membres','connexion']) {
        $_SESSION['redirection'] = $_SESSION['previousPage'];
    }
}
elseif($_SESSION['redirection']!=$_SESSION['previousPage']) {
    $_SESSION['redirection'] = $_SESSION['previousPage'];
}
*/

/* Contrôle des id du formulaire ou affichage du formulaire */
if(isset($_POST['username']) AND isset($_POST['password'])) {
    //Formulaire rempli
    $auth = getUserAuth($_POST['username']);
    if(is_array($auth)) {
        // User trouvé en BDD
        echo 'entré dans if auth';
        if (password_verify($_POST['password'], $auth['hash'])) {
            // MdP OK
            echo 'pass vérifié';
            $_SESSION['connected'] = True;
            $_SESSION['username'] = $_POST['username'];
            header('Location: '.getLink(['accueil']));
        }
        else {      // User trouvé mais mdp faux
            formConnexion();
        }
    }
    else {          // user non trouvé
        echo "User non trouvé";
    }
}
else {              // Formulaire non rempli
    formConnexion();
}
