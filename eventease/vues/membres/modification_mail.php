<div class="wrapper-narrow">
	<h2>Changer son adresse mail :</h2>
	<form action=<?php echo getLink(['membres','modification_mail']); ?> method="post">
        <label for="password">Mot de Passe</label>
        <input type="password" name="password" id="password" placeholder="Mot de Passe"/>

        <label for="mail">Nouvelle adresse mail</label>
        <input type="email" name="mail" id="mail" placeholder="Nouvelle Adresse Mail"/>

        <label for="confirm-mail">Nouvelle adresse mail (confirmation)</label>
        <input type="email" name="confirm-mail" id="mail" placeholder="Confirmer Nouvelle Adresse Mail"/>
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