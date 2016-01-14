<?php
echo '<h1>SANDBOX ~ EVENTEASE</h1>';

// -------------------------------------------------- //

require MODELES.'events/getMemberEvents.php';

$res = getMemberEvents(1);



echo build_calendar(12,2015,[]);
