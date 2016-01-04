<div class="wrapper-narrow">
    <?php
    if(isset($contents['errorMessage'])) {
        echo "<p class=\"error-message\">".$contents['errorMessage']."</p>";
    }
    ?>
    <form method="post" action="<?php echo getLink(['membres','connexion']); ?>">
        <label for="username">Nom d'utilisateur</label>
        <input type="text" name="username" id="username" placeholder="Nom d'utilisateur"/>

        <label for="password">Mot de passe</label>
        <input type="password" name="password" id="password" placeholder="Mot de Passe"/>

        <div class="ligneBoutons" style="margin-bottom:2em;">
               <input style="width: 40%;" type="submit" value="Valider"/>   
               <a style="width: 40%; background-color: grey" class="champ button" href="<?php echo getLink(['membres','inscription']); ?>">S'inscrire</a>
        </div>
    </form>
</div>
