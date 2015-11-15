<?php
function vue($blocks =[], $styles = [], $title = '') {
    if(DEBUG) {
        require INCLUDES.'debug.php';
        $styles[] = 'debug.css';
    }
    require INCLUDES.'header.php';

    if(isset($splash)) {
        require INCLUDES.'splash.php';
        $splash = null;      
    }
    foreach ($blocks as $value) {
        require VUES.$_SESSION['currentPage'][0].'/'.$value.'.php';
    }
    require INCLUDES.'footer.php';
}
