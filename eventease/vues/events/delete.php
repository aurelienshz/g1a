<div class="wrapper-narrow">
	<h2>Voulez-vous vraiment supprimer l'évènement "<?php echo $contents['values']['titre']; ?>" ?</h2>
	<h3 style="text-align:center; color: red; text-transform: uppercase;">Attention cette action est irréversible !</h3>
	<h3 style="text-align:center;" > Veuillez resaisir le nom de l'évènement pour confimer : </h3>
	<form action=<?php echo getLink(['events','delete', $_GET['id']]); ?> method="post">
        <label for="titre">Nom :</label>
        <input type="text" name="titre" id="titre" placeholder="Titre de l'évènement"/>
        <?php
   			if(!empty($contents['errorMessage'])) {
      			echo "<p class=\"error-message\">".$contents['errorMessage']."</p>";
  			}
	    ?>
       	<div class="ligneBoutons" style="margin-bottom:2em;">
			<input style="width: 40%;" type="submit" value="Valider"/>	
			<a style="width: 40%; background-color: #F94339	" class="champ button" href="<?php echo getLink(['events','modify', $_GET['id']]); ?>">Annuler</a>
		</div>
	</form>
</div>