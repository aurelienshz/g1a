<div class="wrapper-narrow">
	<h2>Supprimer un modérateur de l'évènement :</h2>
		<h3>Modérateurs Actuels : </h3>
	<?php
		foreach ($contents["modos"] as $key => $value) {
			echo "$value[0]".' | ';
		}
	?>
	<form action=<?php echo getLink(['events','deleteModo',$_GET['id']]); ?> method="post">
        <label for="pseudo">Nom d'utilisateur :</label>
        <input type="text" name="pseudo" id="pseudo"/>
        <?php
   			if(!empty($contents['errorMessage'])) {
      			echo "<p class=\"error-message\">".$contents['errorMessage']."</p>";
  			}
	    ?>
      <div class="ligneBoutons" style="margin-bottom:2em;">
			   <input style="width: 40%;" type="submit" value="Valider"/>	
			   <a style="width: 40%; background-color: #F94339	" class="champ button" href="<?php echo getLink(['events','modify',$_GET['id']]); ?>">Retour</a>
		  </div>
	</form>
</div>