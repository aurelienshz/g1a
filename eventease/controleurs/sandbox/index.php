<?php
echo '<h1>SANDBOX ~ EVENTEASE</h1>';

// -------------------------------------------------- //

require MODELES.'accueil/getCatchphrases.php';
require MODELES.'backoffice/setCatchphrases.php';
require MODELES.'faq/getPosts.php';

$ress = getPosts();

echo '<h2>Résultats retournés :</h2>';
echo '<pre>';
var_dump($ress);
echo '</pre>';
