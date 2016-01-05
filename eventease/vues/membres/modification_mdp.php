<div class="wrapper-narrow">
	<h2>Changer son mot de passe :</h2>
	<form action=<?php echo getLink(['membres','modification_mdp']); ?> method="post">
        <label for="old_password">Mot de passe actuel</label>
        <input type="password" name="old_password" id="password" placeholder="Mot de Passe Actuel"/>

        <label for="password">Nouveau mot de passe</label>
        <input type="password" name="password" id="password" placeholder="Nouveau Mot de Passe"/>

        <label for="confirm-password">Nouveau mot de passe (confirmation)</label>
        <input type="password" name="confirm-password" id="password" placeholder="Confirmer Nouveau Mot de Passe"/>
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