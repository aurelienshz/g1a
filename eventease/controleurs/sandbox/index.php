<?php
echo '<h1>SANDBOX ~ EVENTEASE</h1>';

// -------------------------------------------------- //

require MODELES.'functions/adresse.php';
require_once MODELES.'functions/google.php';

var_dump(googleCorrectAddress('28 notre dame des champs, paris'));
