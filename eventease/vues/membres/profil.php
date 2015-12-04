<?php
/**** VUE : PROFIL ****/
?>
<div class="wrapper">
    <div class="page_container">
        <div class="col_gauche">
            <div class="photo_profil">
                <img alt="Nom du profil" src="<?php echo $contents['photo']; ?>" title="Nom du profil" height="230" width="230"/>
            </div>
            <p id="mess_perso">Mon message perso</p>
            <div class="interaction_box">
                <p class='ligne_lien_profil'><a class="interaction_profil" href="#">Inviter à un évènement</a></p>
                <p class='ligne_lien_profil'><a class="interaction_profil" href="#">Suivre cette personne</a></p>
                <p class='ligne_lien_profil'><a class="interaction_profil" href="#">Envoyer un message privé</a></p>
            </div>
        </div>
        <div class="col_droite">
            <h2><?php echo $contents['pseudo']; ?></h2>
            <p><?php echo $contents['statut'] ?></p>
            <div class="details_profil">
                <h3>Informations générales :</h2>
                <p>
                    <ul>
                        <li><strong>Nom : </strong><?php echo $contents['nom']; ?></li>
                        <li><strong>Prénom : </strong><?php echo $contents['prenom']; ?></li>
                        <li><strong>Date de naissance : </strong><?php echo $contents['ddn']; ?></li>
                        <li><strong>Langue : </strong><?php echo $contents['langue']; ?></li>
                    </ul>
                </p>
            <div class="description">
                <h3>Description</h3>
                <p><?php echo $contents['description']; ?></p>
            </div>



                <!-- <div class="evenements_futurs">
                    <h2> Évènements futurs</h2>
                    <p>Test test test</p>
                    <p>Test test test</p>
                </div>
                <div class="evenements_passes">
                    <h2>Évènements passés</h2>
                    <p>Test test test</p>
                    <p>Test test test</p>
                    <p>Test test test</p>
                </div> -->
            </div>
        </div>
        <div id="profil-buffer"></div>
    </div>
</div>
