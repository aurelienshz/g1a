<?php
echo '<h1>SANDBOX ~ EVENTEASE</h1>';

// -------------------------------------------------- //

require MODELES.'events/getEvents.php';

$res = getEvents(5);

echo '<h2>Résultats retournés :</h2>';
echo '<pre>';
var_dump($res);
echo '</pre>';
