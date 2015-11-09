<div class="wrapper">
    <form method="post" action="<?php getLink('inscription'); ?>">
        <label for="username">Nom d'utilisateur</label>
        <input type="text" name="username" id="username" placeholder="Nom d'utilisateur"/>

        <label for="email">Adresse e-mail</label>
        <input type="email" name="email" id="email" placeholder="Adresse e-mail"/>

        <label for="password">Mot de passe</label>
        <input type="password" name="password" id="password" placeholder="Mot de Passe"/>

        <label for="password-confirm">Mot de passe (confirmation)</label>
        <input type="password" name="password-confirm" id="password-confirm" placeholder="Mot de Passe - encore !"/>
        
        <input type="submit" value="Valider"/>
    </form>
</div>