<?php
/**** VUE : PROFIL ****/
?>
<div class="wrapper">
    <div class="page_container">
        <div id="col_gauche">
            <div id="photo_profil">
                <img alt="<?php echo $contents['pseudo']; ?>" src="<?php echo $contents['photo']; ?>" title="<?php echo $contents['pseudo']; ?>" height="230" width="230"/>
            </div>
            <div id="general">
                <ul>
                    <li><strong>Nom : </strong><?php echo $contents['nom']; ?></li>
                    <li><strong>Prénom : </strong><?php echo $contents['prenom']; ?></li>
                    <li><strong>Date de naissance : </strong><?php echo $contents['ddn'];?></li>
                    <li><strong>Langue : </strong><?php echo $contents['langue']; ?></li>
                </ul>
            </div>
<?php if(!$contents['monProfil']) { ?>
            <ul id="interaction_profil">
                <li><a class="button" href="#">Inviter à un évènement</a></li>
                <li><a class="button" href="#">Suivre</a></li>
                <li><a class="button" href="#">Envoyer un<br /> message privé</a></li>
            </ul>
<?php }
    else {  // c'est mon profil
?>
            <ul id="interaction_profil">
                <li><a class="button" href="<?php echo getLink(['membres','modification_profil'])?>">Modifier mon profil</a></li>
            </ul>
<?php } // connected() ?>
        </div>
        <div id="col_droite">
            <div id='pseudo_profil'><?php echo $contents['pseudo']; ?> <span id="statut"><?php echo $contents['statut']; ?></span></div>
            <div id="description">
                <h3>À propos de moi :</h3>
                <p> <?php echo $contents['description']; ?></p>
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
            <div id="clearfix"></div>
    </div>
</div>
