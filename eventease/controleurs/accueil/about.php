<?php
require MODELES.'backoffice/getBoringText.php';
require MODELES.'functions/replaceTags.php';

$contents['text'] = replaceTags(htmlspecialchars(getBoringText('about')));
vue(['legal'], [], 'À propos',$contents);
