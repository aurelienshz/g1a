<?php
require MODELES. 'faq/getUserInfo.php';

/**** Préparation de la vue ****/
if (connected()){
	$contents=getUserInfo($_SESSION['id']);
}



$title = 'Nous contacter';
$styles = ['forum.css','search.css','form.css'];
$blocks=['formulaire_contact'];

/**** Affichage de la page ****/
//Appel de la vue :

if ($_POST){
	$contents['nom']=$_POST['nom'];
	$contents['message']=$_POST['message'];
	$contents['email']=$_POST['email'];
	$passage_ligne="\r\n";

	$messageTotal= "de :" . $contents['nom'] . $passage_ligne . "email :" . $contents['email'] . $passage_ligne . "Message :" . $contents['message'];
	var_dump($messageTotal);
	if (mail('avc1.rousselpub@gmail.com', 'Demande d\'aide', $messageTotal)){
		echo "bou";
	}
	vue($blocks,$styles, $title, $contents);
	// header('Location: '.getLink(['accueil']));
	// exit();
}

else {
	if (connected()){
		vue($blocks,$styles, $title, $contents);
	}
	else {
		vue($blocks, $styles, $title);
	}
}
?>
