<?php
require MODELES.'/membres/checkAdmin.php';

if(checkAdmin()) {
    require MODELES.'/faq/getPosts.php';
    require MODELES.'/faq/setPost.php';


    if(isset($_GET['id'])) {
        $post = getPosts($_GET['id']);

        // si on a posté le formulaire :
        if(!empty($_POST)) {
            require MODELES.'/backoffice/setBoringText.php';
            if(setPost($_GET['text'],$_POST['value'])) {
                $message = 'La modification a été effectuée !';
            }
            else {
                $message = 'Oups ! Une erreur s\'est produite...';
            }
        }
    }
    else {
        echo 'Invalid parameter';
        exit();
    }

    require(VUES.'backoffice/editfaq.php');
}
