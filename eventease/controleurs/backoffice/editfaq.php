<?php
require MODELES.'membres/checkAdmin.php';

if(checkAdmin()) {
    require MODELES.'/faq/getPosts.php';

    if(isset($_GET['id']) && $post = getPosts($_GET['id'])) {

        // si on a posté le formulaire :
        if(!empty($_POST)) {
            require MODELES.'backoffice/setPost.php';
            if(setPost($_GET['id'],$_POST['question'],$_POST['reponse'])) {
                $message = 'La modification a été effectuée !';
            }
            else {
                $message = 'Oups ! Une erreur s\'est produite...';
            }
        }

        $post = getPosts($_GET['id']);
    }
    else {
        echo 'Invalid parameter';
        exit();
    }

    require(VUES.'backoffice/editfaq.php');
}
