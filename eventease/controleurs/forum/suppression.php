<?php require MODELES.'forum/suppression.php';

$id=$_GET['id_what'];

$id_topic=$_GET['id_topic'];

$id_user=$_SESSION['id'];

$niveau_user=$_SESSION['niveau'];


//id_what donne la fonction à faire :
//0->Rien du tout
//1->supprimer topic
//2->modifier topic
//3->supprimer un commentaire
//4->modifier un commentaire

if ($id==1){//suppression topic
	supprimerTopic($id_topic);
	header('Location: '.getLink(['forum']));
	exit();
}
if ($id==2) {//modification topic
	if ($_POST['message'] && $_POST['titre']){
		$message=$_POST['message'];
		$titre=$_POST['titre'];
		modifierTopic($id_topic, $message, $titre);
		header('Location: '.getLink(['forum','sujet',$id_topic,0]));
		exit();
	}
	else {
		alert('error', 'Vous n\'avez rien écrit !');
        header('Location: '.getLink(['forum','sujet',$id_topic,2]));
		exit();
	}
}
if ($_GET['id_comment']){
	if ($id==3){//supprimer commentaire
		$id_comment=$_GET['id_comment'];
		supprimerComment($id_comment);
		header('Location: '.getLink(['forum','sujet',$id_topic,0]));
		exit();
	}
	if($id==4){
		$id_comment=$_GET['id_comment'];
		$id_auteur=getAuthorComment($id_comment);
		if ($id_auteur['id_auteur']==$id_user OR $niveau_user==2 OR $niveau_user==3){
			if ($_POST['comment']){
				$message=$_POST['comment'];
				modifierComment($id_comment,$message);
				header('Location: '.getLink(['forum','sujet',$id_topic,0,0]));
				exit();
			}
			else {
				alert('error', 'Vous n\'avez rien écrit !');
	  			header('Location: '.getLink(['forum','sujet',$id_topic,4,0]));
				exit();
			}
		}

		else{
			alert('error', 'Vous n\'êtes pas l\'auteur de ce message !');
	  		header('Location: '.getLink(['forum','sujet',$id_topic,0,0]));
			exit();
			
		}
	}
}
?>
