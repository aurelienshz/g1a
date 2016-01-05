<div class="profil_onglets">
  <ul class="onglets">
    <li class="<?php echo $contents['ongletActif']=='profil'?'active ':'' ?>left_tab">
        <a href="<?php echo $contents['ongletActif']=='profil'?'javascript:void(0)':getLink(['membres','profil']);?>">
            Mon compte
        </a>
    </li>
    <li class="<?php echo $contents['ongletActif']=='evenements'?'active ':'' ?>center_tab">
        <a href="<?php echo $contents['ongletActif']=='evenements'?'javascript:void(0)':getLink(['membres','evenements']);?>">
            Mes évènements
        </a>
    </li>
    <li class="<?php echo $contents['ongletActif']=='messages'?'active ':'' ?>right_tab">
        <a href="<?php echo $contents['ongletActif']=='messages'?'javascript:void(0)':getLink(['membres','messages']);?>">
            Mes messages
        </a>
    </li>
  </ul>
</div>
