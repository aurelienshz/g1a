<div class="wrapper-jumbotext">
    <h1>Plan du site</h1>
    <ul>
        <li><a href="<?php echo getLink(['accueil']); ?>">Accueil</a></li>
        <li>Évènements</li>
        <ul>
            <li><a href="<?php echo getLink(['events','create']); ?>">Créer</a></li>
            <li><a href="<?php echo getLink(['events','search']); ?>">Chercher</a></li>
        </ul>
        <li>Membres</li>
        <ul>
            <li><a href="<?php echo getLink(['membres','connexion']); ?>">Connexion</a></li>
            <li><a href="<?php echo getLink(['membres','inscription']); ?>">Inscription</a></li>
        </ul>
        <li><a href="<?php echo getLink(['forum']); ?>">Forum</a></li>
        <li><a href="<?php echo getLink(['accueil','about']); ?>">A propos</a></li>
        <li><a href="<?php echo getLink(['accueil','cgu']); ?>">Conditions générales d'utilisation</a></li>
        <li><a href="<?php echo getLink(['accueil','legal']); ?>">Mentions légales</a></li>

    </ul>
</div>
