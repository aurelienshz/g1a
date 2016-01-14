<?php
echo '<h1>SANDBOX ~ EVENTEASE</h1>';

// -------------------------------------------------- //

require MODELES.'events/getMemberEvents.php';

$res = getMemberEvents(1);

echo '<h2>Résultats retournés :</h2>';
echo '<pre>';
var_dump($res);
echo '</pre>';
