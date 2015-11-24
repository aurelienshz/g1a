<div class="wrapper-narrow">
    <form method="post" action="<?php getLink(['membres','inscription']); ?>">
        <label for="pseudo">Nom d'utilisateur</label>
        <input type="text" name="pseudo" id="pseudo" placeholder="Nom d'utilisateur"/>
        <?php echo isset($contents['errors']['pseudo'])?$contents['errors']['pseudo']:'' ?>

        <label for="email">Adresse e-mail</label>
        <input type="email" name="email" id="email" placeholder="Adresse e-mail"/>
        <?php echo isset($contents['errors']['email'])?$contents['errors']['email']:'' ?>

        <label for="password">Mot de passe</label>
        <input type="password" name="password" id="password" placeholder="Mot de Passe"/>
        <?php echo isset($contents['errors']['password'])?$contents['errors']['password']:'' ?>

        <label for="password-confirm">Mot de passe (confirmation)</label>
        <input type="password" name="password-confirm" id="password-confirm" placeholder="Mot de Passe - encore !"/>
        <?php echo isset($contents['errors']['password-confirm'])?$contents['errors']['password-confirm']:'' ?>

        <input type="submit" value="Valider"/>
    </form>
</div>
