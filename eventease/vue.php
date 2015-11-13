<?php
function vue($blocks =[], $styles = [], $title = '') {
    if(DEBUG) {
        require INCLUDES.'debug.php';
    }
    require INCLUDES.'header.php';
    foreach ($blocks as $value) {
        require VUES.$_SESSION['currentPage'][0].'/'.$value.'.php';
    }
    require INCLUDES.'footer.php';
}
