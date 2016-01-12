<pre><?php /*var_dump($_POST);var_dump($contents['destinataire']); */?></pre>
<h1> Inviter des amis à l'événement: </br> <?php echo $contents['titreEvenement']; ?> </h1>
<label><p>Rentrer le pseudo de l'utilisateur à inviter:</label>
<form method="post" action="<?php getLink(['events','display',$_GET['id']]); ?>">
<input type="text" name="destinataire"></input>
<input type="submit" name="Send" value="Envoyer"></input>


</form>