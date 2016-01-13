<?php require MODELES.'forum/suppression.php';

$id=$_GET['id_what'];
//2
$id_topic=$_GET['id_topic'];
//20

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
?>