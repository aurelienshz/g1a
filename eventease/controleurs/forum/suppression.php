<?php require MODELES.'forum/suppression.php';

$id_topic=$_GET['id_topic'];
var_dump($id_topic);
supprimerMessage($id_topic);

header('Location: '.getLink(['forum']));
exit();
?>