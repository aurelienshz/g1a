<?php
switch($_GET['text']) {
    case 'CGV':
        $text = 'CGV';
    break;
    case 'legal':
        $text = 'mentions légales';
    break;
    default:
        header('Location: '.getLink(['backoffice']));
        exit();
    break;
}

require(VUES.'backoffice/editBoringTexts.php');
