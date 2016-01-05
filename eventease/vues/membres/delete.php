<div class="wrapper-narrow">
	<h2>Voulez-vous vraiment supprimer votre compte ?</h2>
	<h3 style="text-align:center; color: red; text-transform: uppercase;">Attention cette action est irréversible !</h3>
	<h3 style="text-align:center;" > Veuillez resaisir votre mot de passe : </h3>
	<form action=<?php echo getLink(['membres','delete']); ?> method="post">
        <label for="password">Mot de passe</label>
        <input type="password" name="password" id="password" placeholder="Mot de Passe"/>
        <?php
   			if(!empty($contents['errorMessage'])) {
      			echo "<p class=\"error-message\">".$contents['errorMessage']."</p>";
  			}
	    ?>
       	<div class="ligneBoutons" style="margin-bottom:2em;">
			<input style="width: 40%;" type="submit" value="Valider"/>	
			<a style="width: 40%; background-color: #F94339	" class="champ button" href="<?php echo getLink(['membres','modification_profil']); ?>">Annuler</a>
		</div>
	</form>
</div>