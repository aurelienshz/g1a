<div class="wrapper-narrow">
    <form method="post" action="<?php echo getLink(['membres','connexion']); ?>">
        <label for="username">Nom d'utilisateur</label>
        <input type="text" name="username" id="username" placeholder="Nom d'utilisateur"/>

        <label for="password">Mot de passe</label>
        <input type="password" name="password" id="password" placeholder="Mot de Passe"/>

        <input type="submit" value="Valider"/>
    </form>
</div>
