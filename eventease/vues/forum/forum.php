<?php// var_dump($contents); ?>
<div class="wrapper prettyform">
  <div class="shadow">
    <div class="titleWrapper1">
      <img class="calendarPin" src="<?php echo IMAGES.'calendar_pin_green.png'; ?>">
      <h2><i class="fa fa-comments"></i>  Forum</h2>
      <img class="calendarPin calendarPin2" src="<?php echo IMAGES.'calendar_pin_green.png'; ?>">
    </div>
    <!--<div class="categorie_forum">
      <!--<?php foreach ($contents as $section) { 
        echo $section . '<br/>'; } ?>-->
    <div class="tableau">
      <div class="header">
        <h1>Aide</h1>
      </div>
      <div class="content">
        <div class="question">
          <a href="<?php echo getLink(['forum','sujet'])?>">
          <div class="enonce">Je n'arrive pas à me connecter</div>
          <div class="reponses">48 réponses</div>
          <div class="auteur">par <strong>Audodo</strong></div>
          </a>
        </div>
        <div class="question">
          <a href="<?php echo getLink(['forum','sujet'])?>">
          <div class="enonce">Comment changer sa photo de profil?</div>
          <div class="reponses">2 réponses</div>
          <div class="auteur">par <strong>audypods</strong></div>
          </a>
        </div>
        <div class="question">
          <a href="<?php echo getLink(['forum','sujet'])?>">
          <div class="enonce">Peut-on modifier son profil?</div>
          <div class="reponses">61 réponses</div>
          <div class="auteur">par <strong>ellie-smiley</strong></div>
          </a>
        </div>
      </div>
    </div>
    <div class="tableau">
      <div class="header">
        <h1>Discussions</h1>
      </div>
      <div class="content">
        <div class="question">
          <a href="<?php echo getLink(['forum','sujet'])?>">
          <div class="enonce">Des idées de sortie pour les enfants?</div>
          <div class="reponses">32 réponses</div>
          <div class="auteur">par <strong>KevinDu38</strong></div>
          </a>
        </div>
        <div class="question">
          <a href="<?php echo getLink(['forum','sujet'])?>">
          <div class="enonce">Meilleur endroit pour un pique-nique à Paris?</div>
          <div class="reponses">6 réponses</div>
          <div class="auteur">par <strong>Apolito</strong></div>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>

<!--une section aide
une section pour interargir 

<h2>Aide</h2>
      <h3>Pour régler les problèmes que vous rencontrez avec le site</h3>
      <h2>Suggestions</h2>
      <h3>Si vous avez des suggestions pour améliorer le site</h3>
      <h2>Idées d'évènements</h2>
      <h3>Si vous ne savez pas quel évènement organiser</h3>
      <h2>Liens utiles</h2>
      <h3>Les sites pour vous aider dans la création d'évènement</h3>
      <h2>Bugs</h2>
      <h3>Pour nous signaler les bugs du site</h3>
    </div>