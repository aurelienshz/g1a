<div class="wrapper">
    <form method="post" action="<?php getLink('connexion'); ?>">
    <div class="row">
        <label class="col-2" for="username">Nom d'utilisateur</label>
        <input class="col-2" type="text" name="username" id="username" placeholder="Nom d'utilisateur"/>
    </div>
    <div class="row">
        <label class="col-2" for="password">Mot de passe</label>
        <input class="col-2" type="password" name="password" id="password" placeholder="Mot de Passe"/>
    </div>
        <input type="submit" />
    </form>
</div>