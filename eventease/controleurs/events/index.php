<?php
/* CONTROLEUR EVENTS */

$defaultAction = 'controleurs/events/display.php';

if(isset($_GET['action'])) {
    switch($_GET['action']) {
        case 'display':
            require 'controleurs/events/display.php';
            break;
        case 'create':
            require 'controleurs/events/create.php';
            break;
        default:
            require $defaultAction;
            break;
    }
}
else {
    require $defaultAction;
}

// A la fin on NE DOIT PAS se retrouver en ayant rien fait