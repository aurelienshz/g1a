<?php
echo '<h1>SANDBOX ~ EVENTEASE</h1>';

// -------------------------------------------------- //

require MODELES.'functions/replaceTags.php';

$text = "
<h1>Titre</h1>
<h2>Titre</h2>
<strong>Texte</strong> Texte externe

<ul>
<li>item</li>
<li>item</li>
<li>item</li>
<li>item</li>
<li>item</li>
<ul>
";

$res = replaceTags($text);
echo $res   ;
