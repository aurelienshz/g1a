<?php
/**** VUE : PROFIL ****/
?>
<div class="wrapper">
    <div class="page_container">
        <div class="col_gauche">
            <div class="photo_profil">
                <img alt="Nom du profil" src="<?php echo $contents['photo']; ?>" title="Nom du profil" height="230" width="230"/>
            </div>
            <ul id="interaction_profil">
                <li><a class="button interaction_profil" href="#">Inviter à un évènement</a></li>
                <li><a class="button interaction_profil" href="#">Suivre</a></li>
                <li><a class="button interaction_profil" href="#">Envoyer un<br /> message privé</a></li>
            </ul>
        </div>
        <div class="col_droite">
            <h2><?php echo $contents['pseudo']; ?> <span id="statut"><?php echo $contents['statut']; ?></span></h2>
            <div class="general">
                <h3>Informations générales :</h2>
                <p>
                    <ul>
                        <li><strong>Nom : </strong><?php echo $contents['nom']; ?></li>
                        <li><strong>Prénom : </strong><?php echo $contents['prenom']; ?></li>
                        <li><strong>Date de naissance : </strong><?php echo $contents['ddn']; ?></li>
                        <li><strong>Langue : </strong><?php echo $contents['langue']; ?></li>
                    </ul>
                </p>
            </div>
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
