<?php
/* CONTROLEUR EVENTS */

if(isset($_GET['action'])) {
    switch($_GET['action']) {
        case 'display':
            require 'controleurs/events/display.php';
            break;
        case 'add':
            require 'controleurs/events/add.php';
            break;
    }
}
else {
    //Si pas d'action spécifiée
}

// A la fin on NE DOIT PAS se retrouver en ayant rien fait