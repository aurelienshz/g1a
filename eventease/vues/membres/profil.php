<?php
/**** VUE : PROFIL ****/
?>
<div class="wrapper">
    <div class="page_container">
        <div class="col_gauche">
            <div class="photo_profil">
                <img alt="Nom du profil" src="<?php echo IMAGES.'tiger-face.jpeg'; ?>" title="Nom du profil" height="230" width="230"/>
            </div>
            <p id="mess_perso">Mon message perso</p>
            <div class="interaction_box">
                <p class='ligne_lien_profil'><a class="interaction_profil" href="#">Inviter à un évènement</a></p>
                <p class='ligne_lien_profil'><a class="interaction_profil" href="#">Suivre cette personne</a></p>
                <p class='ligne_lien_profil'><a class="interaction_profil" href="#">Envoyer un message privé</a></p>
            </div>
        </div>
        <div class="col_droite">
            <h1>Nom du profil</h1>
            <div class="description">
                <h5>Description</h5>
                <p>Je suis un tigre.</p>
            </div>
            <div class="details_profil">
                <h2>Détails du profil</h2>
                <p>Civilité: Tigre</p>
                <div class="evenements_futurs">
                    <h2> Évènements futurs</h2>
                    <p>Test test test</p>
                    <p>Test test test</p>
                    <p>Test test test</p>
                </div>
                <div class="evenements_passes">
                    <h2>Évènements passés</h2>
                    <p>Test test test</p>
                    <p>Test test test</p>
                    <p>Test test test</p>
                </div>
            </div>
        </div>
        <div id="profil-buffer"></div>
    </div>
</div>