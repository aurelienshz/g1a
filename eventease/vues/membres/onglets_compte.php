<div class="profil_onglets">
  <ul class="onglets">
    <li <?php echo $contents['ongletActif']=='profil'?'class="active"':'' ?> id="left_tab"><a href="<?php echo getLink(['membres','profil']);?>">Mon compte</a></li>
    <li <?php echo $contents['ongletActif']=='evenements'?'class="active"':'' ?> id="center_tab"><a href="<?php echo getLink(['membres','evenements']);?>">Mes évènements</a></li>
    <li <?php echo $contents['ongletActif']=='messages'?'class="active"':'' ?> id="right_tab"><a href="<?php echo getLink(['membres','messages']);?>">Mes messages</a></li>
  </ul>
</div>
