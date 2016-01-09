<div class="wrapper prettyform">
  <div class="shadow">
    <div class="titleWrapper1">
      <img class="calendarPin" src="<?php echo IMAGES.'calendar_pin_green.png'; ?>">
      <h2><i class="fa fa-comments"></i>  Forum</h2>
      <img class="calendarPin calendarPin2" src="<?php echo IMAGES.'calendar_pin_green.png'; ?>">
    </div>
    <div class="tableau">
      <div class="header">
        <h1>Aide</h1>
      </div>
      <div class="content">
        <?php
          foreach($contents['topic1'] as $topic1)
          {?>
        <div class="question">
            <a href="<?php echo getLink(['forum','sujet', $topic1['id']])?>">
            <div class="enonce"><?php echo $topic1['titre']; ?></div>
            <div class="reponses">48 messages</div>
            <div class="auteur">par <strong><?php echo $topic1['pseudo']; ?></strong></div>
            </a>
        </div>
        <?php } ?>
      </div>
    </div>
    <div class="tableau">
      <div class="header">
        <h1>Discussions</h1>
      </div>
      <div class="content">
        <?php
          foreach($contents['topic2'] as $topic2)
          {?>
        <div class="question">
          <a href="<?php echo getLink(['forum','sujet', $topic2['id']])?>">
          <div class="enonce"><?php echo $topic2['titre']; ?></div>
          <div class="reponses">32 réponses</div>
          <div class="auteur">par <strong><?php echo $topic2['pseudo']; ?></strong></div>
          </a>
        </div>
        <?php } ?>
      </div>
      <div class="creer">
      <a class="button" href="<?php echo getLink(['forum','creation_topic'])?>">
        Rajouter un topic
      </a>
    </div>
    </div>
  </div>
</div>