<?php
require MODELES.'/membres/checkAdmin.php';

if(checkAdmin()) {
    require MODELES.'/backoffice/getBoringText.php';

    $text = [];

    if(isset($_GET['text']) && ($_GET['text'] == 'legal' || $_GET['text'] == 'cgv')) {
        if(!empty($_POST)) {
            require MODELES.'/backoffice/setBoringText.php';
            if(setBoringText($_GET['text'],$_POST['value'])) {
                $message = 'La modification a été effectuée !';
            }
            else {
                $message = 'Oups ! Une erreur s\'est produite...';
            }
        }

        $text['name'] = $_GET['text'];
        $text['fullname'] = $_GET['text']=='cgv'?'conditions générales d\'utilisation':'mentions légales';
        $text['value'] = getBoringText($text['name']);

    }
    else {
        echo 'Invalid parameter';
        exit();
    }

    require(VUES.'backoffice/editBoringTexts.php');
}
