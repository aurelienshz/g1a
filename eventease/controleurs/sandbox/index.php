<?php
echo '<h1>SANDBOX ~ EVENTEASE</h1>';

// -------------------------------------------------- //

require MODELES.'events/searchEvents.php';

echo '<pre>';
$res = searchEvents('a');

echo '<h2>Résultats retournés :</h2>';
var_dump($res);
echo '</pre>';
