<?php
require MODELES.'membres/checkAdmin.php';

if(checkAdmin()) {
    require MODELES.'/faq/getPosts.php';

    if(isset($_GET['id']) && $post = getPosts($_GET['id'])) {

        // si on a posté le formulaire :
        require MODELES.'backoffice/deletePost.php';
        if(deletePost($_GET['id'])) {
            $message = 'Suppression réussie !';
        }
        else {
            $message = 'Oups ! Une erreur s\'est produite...';
        }
    }
    else {
        echo 'Invalid parameter';
        exit();
    }

    require(VUES.'backoffice/deletefaq.php');
}
