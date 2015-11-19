<?php
function vue($blocks =[], $styles = [], $title = '', $contents=[]) {
    global $splash;

    if(DEBUG) {
        require INCLUDES.'debug.php';
        $styles[] = 'debug.css';
    }
    require INCLUDES.'header.php';


    if(isset($_SESSION['splash'])) {
        require INCLUDES.'splash.php';
        $_SESSION['splash'] = null;
    }


    foreach ($blocks as $value) {
        require VUES.$_SESSION['currentPage'][0].'/'.$value.'.php';
    }
    require INCLUDES.'footer.php';
}
