<?php
function vue($blocks=[], $styles = [], $title = '', $contents=[], $scripts=[]) {

    if(!in_array('alert.js',$scripts)) { $scripts[] = 'alert.js'; }

    if(DEBUG) {
        require INCLUDES.'debug.php';
        $styles[] = 'debug.css';
    }
    require INCLUDES.'header.php';


    if(isset($_SESSION['alerts'])) {
        require INCLUDES.'alert.php';
    }


    foreach ($blocks as $value) {
        require VUES.$_SESSION['currentPage'][0].'/'.$value.'.php';
    }
    require INCLUDES.'footer.php';
}
