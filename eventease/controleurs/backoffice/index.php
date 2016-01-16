<?php
require MODELES.'/membres/checkAdmin.php';

if(checkAdmin()) {
    if(!empty($_POST) || !empty($_FILES)) {
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
        elseif(isset($_FILES['background'])) {
            if($_FILES['background']['error'] == 0) {
                if($_FILES['background']['size']<=6291456) {
                    $fileInfo = pathinfo($_FILES['background']['name']);
                    $allowedExtensions = array('jpg');        //, 'jpeg', 'gif', 'png');
                    if(in_array($fileInfo['extension'], $allowedExtensions)) {
                        if(move_uploaded_file($_FILES['background']['tmp_name'], IMAGES . 'background.'.$fileInfo['extension'])) {
                            $message = 'Image modifiée avec succès !';
                        }
                        else {
                            $message = 'Oups ! Une erreur s\'est produite lors du traitement du fichier...';
                        }
                    }
                    else {
                        $message = 'Type de fichier invalide. Type autorisé : jpg.';
                    }
                }
                else {
                    $message = 'Fichier trop volumineux ! Taille maximale : 6 Mo.';
                }
            }
            else {
                $message = 'Oups ! Une erreur s\'est produite lors de l\'envoi du fichier...';
            }
        }
    }

    require MODELES.'/accueil/getCatchphrases.php';
    require MODELES.'/faq/getPosts.php';

    $catchPhrases = getCatchphrases();
    $faqPosts = getPosts();

    require VUES.'backoffice/index.php';
}
