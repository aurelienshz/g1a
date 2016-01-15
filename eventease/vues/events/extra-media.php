<div class="wrapper">
	<h2>Gèrer les images supplémentaires de l'évènement :</h2>
	<p>Vous pouvez avoir 4 images supplémentaires au maximum, pour en ajouter d'autres quand vous en avez 4, il faut en supprimer.</p>
	<form action=<?php echo getLink(['events','extra-media',$_GET['id']]); ?> method="post" enctype="multipart/form-data">
        	
    	<h3>Images déjà uploadées :</h3>
		<div class='flex-line'>
			<?php
				foreach ($contents['images'] as $key => $value) {
					echo "<div class='imageBlock'>";
					echo '<img style="max-height:300px;" alt="Photo Event '.$key.'" src ="'.PHOTO_EVENT.$value[1].'" title="Photo Event '.$key.'" width="100%"  class="uploaded"> <br />';
					echo '<p><input type="checkbox" name="'.$key.'" value="1">Supprimer cette image ?</p>';
					echo '</div>';
				}

			?>
		</div>
		<?php
		if ($contents['img_number'] < 4){
			echo '<label for="photos">Ajouter des photos : </label>(4 photos maximum)
    			  <input type="file" id="photos" name="photos[]" multiple="multiple" accept=".png,.jpg,.jpeg" />';
		}
   			if(!empty($contents['errorMessage'])) {
      			echo "<p class=\"error-message\">".$contents['errorMessage']."</p>";
  			}
	    ?>

      <div class="ligneBoutons" style="margin-bottom:2em;">
			   <input style="width: 40%;" type="submit" value="Valider"/>	
			   <a style="width: 40%; background-color: #F94339	" class="champ button" href="<?php echo getLink(['events','modify',$_GET['id']]); ?>">Retour</a>
		  </div>
	</form>
</div>