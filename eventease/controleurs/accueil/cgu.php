<?php
require MODELES.'backoffice/getBoringText.php';
require MODELES.'functions/replaceTags.php';

$contents['text'] = replaceTags(htmlspecialchars(getBoringText('cgv')));
vue(['legal'], [], 'Conditions générales d\'utilisation',$contents);
