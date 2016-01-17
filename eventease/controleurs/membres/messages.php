<?php
/*** CONTROLEUR MESSAGES ***/

/**** Préparation des contenus ****/

require MODELES.'membres/getPrivateMessages.php';
require MODELES.'membres/getUserName.php';
require MODELES.'membres/sendPrivateMessage.php';

if(!connected()) {
    alert('error', 'Vous devez vous connecter pour voir cette page');
    header("Location: ".getLink(['membres','connexion']));
    exit();
}
else {
    $contents['messages'] = getPrivateMessages($_SESSION['id']);
}

if(isset($_GET['pseudo_destinataire'])) {
    $contents['pseudo_destinataire']=$_GET['pseudo_destinataire'];
}

$contents['ongletActif'] = 'messages';

$title = 'Messages privés';
$styles = ['onglets_compte.css','membres.css'];
$blocks = ['onglets_compte', 'messages'];

//Envoi d'un message privé si nécessaire :
if (!empty($_POST)) {
    if ($_POST['message_prive']){
			if (connected() AND isset(getUserId($_POST['destinataire'])[0]["id"])){
                                    if (sendPrivateMessage($_POST['message_prive'],getUserId($_POST['destinataire'])[0]["id"],$_SESSION['id'])) {
                                        alert('info','Votre message a bien été envoyé !');
                                    }
                                    else {
                                        alert('error', "Une erreur est survenue lors de l'envoi de votre message");
                                    }
                        }
                        else {
                            alert('error', "Pseudo du destinataire invalide");
                        }
    }
    else {
        alert('error', 'Vous ne pouvez pas envoyer un message vide !');
    }
}

// Appel des vues
vue($blocks,$styles,$title, $contents);