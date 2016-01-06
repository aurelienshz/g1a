<pre><?php var_dump($contents['destinataire']);; ?></pre>
<h1> Inviter des amis à l'événement <?php echo $contents['titreEvenement']; ?> </h1>
<label><p>Rentrer le pseudo de l'utilisateur à inviter:</label>
<form method="post" action="<?php getLink(['events','create']); ?>">
<input type="text" name="destinataire"></input>
<input type="submit" name="Envoyer"></input>


</form>