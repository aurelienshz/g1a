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
	print_r($_POST);
	$message=$_POST['message'];
	var_dump($message);
	var_dump($id_topic);
	modifierTopic($id_topic, $message);
	header('Location: '.getLink(['forum','sujet',$id_topic,'0']));
	exit();
}
?>