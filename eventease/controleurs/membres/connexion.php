<?php
/**************************************************/
require MODELES.'membres/getUserAuth.php';
require MODELES.'membres/setUserLastLogin.php';

/* Affichage du formulaire */
$title = 'Connexion';
$style = ['form.css'];
if(!DEBUG) {
    $style[] = 'minipage.css';
}

if(!connected()) {
    $errorMessage = '';
    /* Contrôle des id du formulaire ou affichage du formulaire */
    if(!empty($_POST)) {        // Formulaire envoyé
        if($_POST['username'] && $_POST['password']) { // Tous les champs remplis
            $auth = getUserAuth($_POST['username']);
            // echo '<pre>';
            // var_dump($auth);
            // echo '</pre>';

            if(is_array($auth) && password_verify($_POST['password'], $auth['mdp'])) {

                if(intval($auth['niveau']) == 0) {
                    $errorMessage = "Votre compte n'est pas validé. Merci de cliquer sur le lien contenu dans l'e-mail que vous avez reçu après votre inscription.<br />
                    Si vous n'avez pas reçu ce mail, vérifiez dans votre dossier spams";
                    $contents['errorMessage'] = $errorMessage;
                    vue(['connexion'],$style,$title,$contents);
                    exit();
                }
                else {
                    // Positionnement des variables de session :
                    $_SESSION['connected'] = True;
                    $_SESSION['username'] = $_POST['username'];
                    $_SESSION['niveau'] = $auth['niveau'];
                    $_SESSION['id'] = $auth['id'];
                    // Mise à jour de la date de dernière connexion :
                    setUserLastLogin($auth['id']);
                }

                // Sortie du script et redirection vers la page précédant la connexion :
                if(!$errorMessage && !isset($auth['date_derniere_connexion'])){
                    alert('info', 'C\'est la première fois que vous vous connectez ! Prenez quelques minutes pour compléter votre profil !');
                    header('Location: '.getLink(['membres','modification_profil']));
                    exit();
                }
                else
                {
                    header('Location: '.getLink($_SESSION['previousPage']));
                    exit();
                }
            }
            // Si le message d'erreur est resté vide
            else {
                $errorMessage = "Identifiants invalides. Merci de réessayer !";
            }
        }
        else {
            $errorMessage = 'Merci de renseigner tous les champs.';
        }
    }
}
else
{
    alert('error', 'Action impossible ! Vous êtes déjà connecté');
    header('Location: '.getLink(['accueil']));
    exit();
}

$contents['errorMessage'] = $errorMessage;
vue(['connexion'],$style,$title,$contents);
