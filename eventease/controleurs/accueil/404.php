<?php
$style = [];
if(!DEBUG) {
    $style = ['minipage.css'];
}
// header("refresh:10;url=".getLink(['accueil']));
vue(['404'],$style,'Page non trouvée');
