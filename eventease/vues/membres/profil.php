<?php
/**** VUE : PROFIL ****/
?>
<div class="wrapper">
    <div class="page_container">
        <div class="col_gauche">
            <div class="photo_profil">
                <img alt="Nom du profil" src="<?php echo IMAGES.'pirate-cat.jpg'; ?>" title="Nom du profil" height="275" width="275"/>
            </div>
            <ul class="interaction_profil">
                <li><a href="#">Inviter à un évènement</a></li>
                <li><a href="#">Suivre cette personne</a></li>
                <li><a href="#">Envoyer un message privé</a></li>
            </ul>
        </div>
        <div class="col_droite">
            <h1>Nom du profil</h1>
            <div class="description">
                <h5>Description</h5>
            </div>
            <div class="details_profil">
                <h2>Détails du profil</h2>
            <div class="evenements_futurs">
                <h2> Évènements futurs</h2>
            </div>
            <div class="evenements_passes">
                <h2>Évènements passés</h2>
            </div>
        </div>
    </div>
</div> <!-- /wrapper -->