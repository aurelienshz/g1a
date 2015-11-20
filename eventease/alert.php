<?php
function alert($type, $message) {
    switch($type) {
        case 'validation':
        case 'ok':
            $classBlock='alertValidation';
            break;
        case 'error':
            $classBlock='alertError';
            break;
        case 'info':
        default:
            $classBlock='alertInfo';
    }
    $_SESSION['alerts'][] = [$classBlock, $message];
    return True;
}
