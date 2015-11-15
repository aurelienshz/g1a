<?php

function splash($type, $message) {
    global $splash, $splashMessage;
    switch($type) {
        case 'ok':
            $classBlock='splashValidation';
            break;
        case 'error':
            $classBlock='splashError';
            break;
        case 'info':
        default:
            $classBlock='splashInfo'
    }
    $splash = [$classBlock, $message];
    return True;
}
