<?php

if(!empty($_POST)) {
    if(isset($_POST['catchphrase']) && isset($_POST['subcatchphrase'])) {
        $catchPhrases = [$_POST['catchphrase'], $_POST['subcatchphrase']];
        require MODELES.'/backoffice/setCatchphrases.php';
        if(setCatchphrases($catchPhrases)) {
            $message = "Modification des slogans réussie !";
        }
        else {
            $message = 'Oups ! Une erreur s\'est produite.';
        }
    }
}
require MODELES.'/accueil/getCatchphrases.php';

$catchPhrases = getCatchphrases();

require VUES.'backoffice/index.php';
