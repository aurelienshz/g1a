<div class="wrapper prettyform">
  <div class="shadow">
    <div class="titleWrapper1">
      <img class="calendarPin" src="<?php echo IMAGES.'calendar_pin_green.png'; ?>">
      <h2><i class="fa fa-comments"></i> Forum - Catégories </h2>
      <img class="calendarPin calendarPin2" src="<?php echo IMAGES.'calendar_pin_green.png'; ?>">
    </div>
    <div class="header2">
      <div class="repondre">
          <a class="button" href="#">
              Répondre à ce sujet
          </a>
      </div>
      <div class="retour">
          <a class="button" href="<?php echo getLink(['forum'])?>">
              Retourner à l'accueil du forum
          </a>
      </div>
    </div>
    <div class="cadre">
      <div class="tableau">
        <div class="header">
          <h1><?php echo $contents['titre'];?></h1>
        </div>
        <div class="content_sujet">
          <p><small>Posté le <?php echo $contents['jour'] . "/" . $contents['mois'] . "/" . $contents['annee'] . " à " . $contents['heure'] . "h" . $contents['minute'];?>
          </br></br></small>
                <?php echo $contents['message'];?></br>
          </p>
          <div class="membre">
            <img class="photo_profil" src="<?php echo IMAGES.'tiger-face.jpeg'; ?>"></br>
            <strong><?php echo $contents['pseudo'];?></strong></br>
            <p><?php echo $contents['COUNT(*)'];?> message(s)</p>
          </div>
        </div>
      </div>
      <div class="reponse">
        <div class="tableau">
          <div class="header">
            <h2>Shakespeare</h2>
          </div>
          <div class="content_sujet">
            <p><small>Posté le 25/11/15 à 19h34</br></br></small>
                To be, or not to be--that is the question:
                Whether 'tis nobler in the mind to suffer
                The slings and arrows of outrageous fortune
                Or to take arms against a sea of troubles
                And by opposing end them. To die, to sleep--
                No more--and by a sleep to say we end
                The heartache, and the thousand natural shocks
                That flesh is heir to. 'Tis a consummation
                Devoutly to be wished. To die, to sleep--
                To sleep--perchance to dream: ay, there's the rub,
                For in that sleep of death what dreams may come
                When we have shuffled off this mortal coil,
                Must give us pause. There's the respect
                That makes calamity of so long life.
                For who would bear the whips and scorns of time,
                Th' oppressor's wrong, the proud man's contumely
                The pangs of despised love, the law's delay,
                The insolence of office, and the spurns
                That patient merit of th' unworthy takes,
                When he himself might his quietus make
                With a bare bodkin? Who would fardels bear,
                To grunt and sweat under a weary life,
                But that the dread of something after death,
                The undiscovered country, from whose bourn
                No traveller returns, puzzles the will,
                And makes us rather bear those ills we have
                Than fly to others that we know not of?
                Thus conscience does make cowards of us all,
                And thus the native hue of resolution
                Is sicklied o'er with the pale cast of thought,
                And enterprise of great pitch and moment
                With this regard their currents turn awry
                And lose the name of action. -- Soft you now,
                The fair Ophelia! -- Nymph, in thy orisons
                Be all my sins remembered.</p>
              <div class="membre">
              <img class="photo_profil" src="<?php echo IMAGES.'tiger-face.jpeg'; ?>"></br>
              <strong>Shakespeare</strong></br>
              <p>78 messages</p>
          </div>
          </div>
        </div>
        <div class="tableau">
          <div class="header">
            <h2>Otis</h2>
          </div>
          <div class="content_sujet">
            <p><small>Posté le 1/12/15 à 12h34</br></br></small>Mais, vous savez, moi je ne crois pas qu'il y ait de bonne ou de mauvaise
              situation. Moi, si je devais résumer ma vie aujourd'hui avec vous, je dirais
              que c'est d'abord des rencontres, des gens qui m'ont tendu la main, peut-être
              à un moment où je ne pouvais pas, où j'étais seul chez moi. Et c'est assez
              curieux de se dire que les hasards, les rencontres forgent une destinée...
              Parce que quand on a le goût de la chose, quand on a le goût de la chose bien
              faite, le beau geste, parfois on ne trouve pas l'interlocuteur en face, je
              dirais, le miroir qui vous aide à avancer. Alors ce n'est pas mon cas, comme
              je le disais là, puisque moi au contraire, j'ai pu ; et je dis merci à la vie,
              je lui dis merci, je chante la vie, je danse la vie... Je ne suis qu'amour !
              Et finalement, quand beaucoup de gens aujourd'hui me disent "Mais comment
              fais-tu pour avoir cette humanité ?", eh ben je leur réponds très simplement,
              je leur dis que c'est ce goût de l'amour, ce goût donc qui m'a poussé
              aujourd'hui à entreprendre une construction mécanique, mais demain, qui sait,
              peut-être seulement à me mettre au service de la communauté, à faire le don,
              le don de soi...</p>
              <div class="membre">
              <img class="photo_profil" src="<?php echo IMAGES.'tiger-face.jpeg'; ?>"></br>
              <strong>Otis</strong></br>
              <p>78 messages</p>
            </br>
          </div>
        </div>
        </div>
      </div>
    </div>
  </div>
</div>
