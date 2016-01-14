<div class="wrapper-narrow">
	<h2>Inviter un amis à l'événement : <?php echo $contents['titreEvenement']; ?> </h2>
	<form method="post" action="<?php getLink(['events','display',$_GET['id']]); ?>">
		<label><p>Rentrer le pseudo de l'utilisateur à inviter:</label>
		<input type="text" name="destinataire"></input>
		      <div class="ligneBoutons" style="margin-bottom:2em;">
				   <input style="width: 40%;" type="submit" name="Send" value="Envoyer"/>	
				   <a style="width: 40%; background-color: #F94339	" class="champ button" href="<?php echo getLink(['events','display',$_GET['id']]); ?>">Annuler</a>
			  </div>
	</form>
</div>