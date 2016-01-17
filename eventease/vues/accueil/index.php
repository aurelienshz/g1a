<?php
/**** VUE : ACCUEIL ****/
?>

<section id="bigform">
<p id="catchphrase"><?php echo $contents['catchPhrases'][0]; ?></p>
<p id="subcatchphrase"><?php echo $contents['catchPhrases'][1]; ?></p>
    <form method="post" action="<?php echo getLink(['events','search']); ?>">
        <select name="searchType">
            <option value="keywords">Mots-clés...</option>
            <option value="place">Près de...</option>
            <option value="date">Prochainement...</option>
        </select><!--
     --><input name="searchKeywords" class="champCentral" type="text" placeholder="Mots-clés"/><!--
     --><input name="searchPlace" class="champCentral google-autocomplete-address" type="text" placeholder="Adresse" style="display:none;"/><!--
     --><input name="searchDate" class="champCentral" type="date" placeholder="Date" style="display:none;"/><!--
     --><input type="submit" value="Rechercher"/>
    </form>
    <div id="createButtonContainer">
        <a class="button" id="createButton" href="<?php echo getLink(['events','create']); ?>">
            Créer un évènement
        </a>
    </div>
</section>

<div class="wrapper">
<h4>Suggestions</h4>
    <section id="suggestions" class="simple-slideshow">
    <?php foreach ($contents["suggestions"] as $key => $value) { ?>
        <div class="eventPreview">
			<h4><a href=#><?php echo !empty($contents['sugg'][$key])?$contents['sugg'][$key].' : ':'' ;?><?php echo $value['titre'];?></a></h4>
			<a href="<?php echo getLink(['events','display', $value['id']]); ?>">
				<img src="<?php echo $value['lien_photo'];?>" />
			</a>
			<div class="infosPratiques">
				<p><span class="fa fa-calendar"></span><?php echo date('d/m/Y à H:i',strtotime($value['debut']));?></p>
				<p><span class="fa fa-tag"></span><?php echo $value['type'];?></p>
				<p><span class="fa fa-map-marker"></span><?php echo $value['adresse'];?></p>
				<p><span class="fa fa-eur"></span><?php echo !empty($value['tarif'])?$value['tarif']." €":'Gratuit';?></p>
				<p><span class="fa fa-child"></span>
				<?php 
					if (!empty($value['age_min']) && !empty($value['age_max'])){
						echo "De ".$value['age_min']." à ".$value['age_max'];
					}elseif(empty($value['age_min']) && !empty($value['age_max'])){
						echo "Jusuqu'à ".$value['age_max'];
					}elseif(!empty($value['age_min']) && empty($value['age_max'])){
						echo "A partir de ".$value['age_min'];
					}else{
						echo "Tous âges.";
					}

				?></p>
			</div>
			<p class="description" style="min-height: 130px;">
			<?php echo $value['description'];?>
			</p>
			<a class="button" href="<?php echo getLink(['events','display', $value['id']]); ?>">Voir l'évènement</a>
			<div class="clearfix"></div>
		</div>
	<?php } ?>
    </section>

</div> <!-- /wrapper -->
