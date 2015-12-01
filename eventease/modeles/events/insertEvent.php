<?php
/* modeles/membres/insertUser.php

*/
function insertEvent($titre) {
	$bdd = new PDO('mysql:host=localhost;dbname=eventease;charset=utf8', 'root', '');
    $query = $bdd->prepare('INSERT INTO evenement (titre) VALUES (:titre)');
    $query -> execute([
    	':titre'=>$titre 
        ]);
}
?>