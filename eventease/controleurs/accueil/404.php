<?php
$style = [];
if(!DEBUG) {
    $style = ['minipage.css'];
}
header("refresh:5;url=".getLink(['accueil']));
vue(['404'],$style,'Page non trouvée');
