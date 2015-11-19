<?php
function alert($type, $message) {
    switch($type) {
        case 'validation':
            $classBlock='splashValidation';
            break;
        case 'error':
            $classBlock='splashError';
            break;
        case 'info':
        default:
            $classBlock='splashInfo';
    }
    $_SESSION['splash'] = [$classBlock, $message];
    return True;
}
