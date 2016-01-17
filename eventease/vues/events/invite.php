<div class="wrapper-narrow">
	<h2 id="invite_h2">Inviter un ami à l'événement : <br><?php echo $contents['titreEvenement']; ?> </h2>
	<form method="post" action="<?php getLink(['events','display',$_GET['id']]); ?>">
		<label>Rentrez le pseudo de l'utilisateur à inviter:</label>
		<input type="text" name="destinataire">
		        <div class="ligneBoutons" style="margin-bottom:2em;">
				   <input style="width: 40%;" type="submit" name="Send" value="Envoyer"/>	
				   <a style="width: 40%; background-color: #F94339	" class="champ button" href="<?php echo getLink(['events','display',$_GET['id']]); ?>">Annuler</a>
			</div>
	</form>
</div>