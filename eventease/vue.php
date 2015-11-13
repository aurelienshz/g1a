<?php
function view($blocks =[], $styles = [], $title = '') {
    require INCLUDES.'header.php';
    print_r($_SESSION['previousPage']);
    foreach ($blocks as $value) {
        require VUES.$_SESSION['currentPage'][0].'/'.$value.'.php';
    }
    require INCLUDES.'footer.php';
}
