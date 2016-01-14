<?php

require MODELES.'faq/getPosts.php';

$title='Questions fréquentes';
$styles=['faq.css'];
$scripts=[''];
$blocks=['faq'];
$contents=getPosts();



vue($blocks,$styles,$title,$contents,$scripts);
?>
