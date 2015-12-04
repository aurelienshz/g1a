<?php
/* modeles/membres/insertUser.php

*/
function insertEvent($titre, $type, $date, $lieu, $hosts, $visibility, $participation, $price, $assistance, $langue, $description, $attending) {
	$bdd = new PDO(DSN, DBUSER, DBPASS);
    $query = $bdd->prepare('INSERT INTO evenement (titre, type, date, lieu, hosts, visibility, participation, price, assistance, langue, description, attending) 
    	VALUES (:titre, :type, :date, :lieu, :hosts, :visibility, :participation, :price, :assistance, :langue, :description, :attending)');
    $query -> execute([
    	':titre'=>$titre,
    	':type'=>$type, 
    	':date'=>$date,
    	':lieu'=>$lieu,
    	':hosts'=>$hosts,
    	':visibility'=>$visibility, 
    	':participation'=>$participation,
    	':price'=>$price,
    	':assistance'=>$assistance,
    	':langue'=>$langue,
    	':description'=>$description,
    	':attending'=>$attending,
        ]);
}
?>