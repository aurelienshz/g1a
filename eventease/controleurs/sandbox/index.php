<?php
echo '<h1>SANDBOX ~ EVENTEASE</h1>';

// -------------------------------------------------- //

require MODELES.'events/getTypes.php';

echo '<pre>';
$res = getTypes('concert');

echo '<h2>Résultats retournés :</h2>';
var_dump($res);
echo '</pre>';
