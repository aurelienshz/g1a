<?php
require MODELES.'backoffice/getBoringText.php';
require MODELES.'functions/replaceTags.php';

$contents['text'] = replaceTags(htmlspecialchars(getBoringText('legal')));
vue(['legal'], [], 'Mentions légales',$contents);
