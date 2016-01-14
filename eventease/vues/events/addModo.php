<div class="wrapper-narrow">
	<h2>Ajouter un modérateur à l'évènement :</h2>
	<form action=<?php echo getLink(['events','addModo',$_GET['id']]); ?> method="post">
        <label for="pseudo">Nom d'utilisateur :</label>
        <input type="text" name="pseudo" id="pseudo"/>
        <?php
   			if(!empty($contents['errorMessage'])) {
      			echo "<p class=\"error-message\">".$contents['errorMessage']."</p>";
  			}
	    ?>
      <div class="ligneBoutons" style="margin-bottom:2em;">
			   <input style="width: 40%;" type="submit" value="Valider"/>	
			   <a style="width: 40%; background-color: #F94339	" class="champ button" href="<?php echo getLink(['events','modify',$_GET['id']]); ?>">Annuler</a>
		  </div>
	</form>
</div>