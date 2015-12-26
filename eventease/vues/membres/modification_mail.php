<div class="wrapper-narrow">
	<h2>Changer son adresse mail :</h2>
	<form action=<?php echo getLink(['membres','modification_mail']); ?> method="post">
        <label for="old_mail">Adresse mail actuelle</label>
        <input type="email" name="old_password" id="password" placeholder="Adresse Mail Actuelle"/>

        <label for="mail">Nouvelle adresse mail</label>
        <input type="email" name="mail" id="password" placeholder="Nouvelle Adresse Mail"/>

        <label for="confirm-password">Nouvelle adresse mail (confirmation)</label>
        <input type="email" name="confirm-mail" id="password" placeholder="Confirmer Nouvelle Adresse Mail"/>
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