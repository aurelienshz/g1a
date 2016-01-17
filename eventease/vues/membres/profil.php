<?php
/**** VUE : PROFIL ****/
?>
<div class="wrapper">
    <div class="page_container">
        <div id="col_gauche">
            <div id="photo_profil">
                <img alt="<?php echo $contents['pseudo']; ?>" src="<?php echo $contents['photo']; ?>" title="<?php echo $contents['pseudo']; ?>"/>
            </div>
        <div id="statut"><?php echo $contents['statut']; ?></div>
<?php if(!$contents['monProfil']) { ?>
            <ul id="interaction_profil">
                <li><a class="button" href="<?php echo getLink(['membres','invitation'])?>">Inviter à un évènement</a></li>
                <li><a class="button" href="#">Suivre</a></li>
                <li><a class="button" href="<?php echo getLink(['membres','messages',''.$contents['pseudo'].''])?>#text-area">Envoyer un<br /> message privé</a></li>
            </ul>
<?php }
    else {  // c'est mon profil
?>
            <ul id="interaction_profil">
                <li><a class="button" id='modif_button' href="<?php echo getLink(['membres','modification_profil'])?>">Modifier mon profil</a></li>
            </ul>
<?php } // connected() ?>
        </div>
        <div id="col_droite">
            <div id='pseudo_profil'><?php echo $contents['pseudo']; ?></div>
            <div id="description">
                <h3>À propos de moi :</h3>
                <p> <?php echo nl2br($contents['description']); ?></p>
            </div>
            <div id="general">
                <h3>Informations complémentaires :</h3>
                <div id="col1">
                    <ul>
                        <li><div class='info_profil'><strong>Nom : </strong></div><?php echo $contents['civilite'].' '.$contents['prenom'].' '.$contents['nom']; ?></li>
                        <li><div class='info_profil'><strong>Téléphone : </strong></div><?php echo $contents['tel']; ?></li>
                        <li><div class='info_profil'><strong>Email : </strong></div><?php echo $contents['mail']; ?></li>
                    </ul>
                </div>
                <div id='col2'>
                    <ul>
                        <li><div class='info_profil'><strong>Date de naissance : </strong></div><?php echo $contents['ddn'];?></li>
                        <li><div class='info_profil'><strong>Adresse : </strong></div><?php echo $contents['adresse_condensee']; ?></li>
                        <li><div class='info_profil'><strong>Langue préférée : </strong></div><?php echo $contents['langue']; ?></li>
                </ul>
                </div>
            </div>
        </div>
    </div>
            <div id="clearfix"></div> <?php /**empêche le débordement des float sur le footer**/ ?>
</div>
