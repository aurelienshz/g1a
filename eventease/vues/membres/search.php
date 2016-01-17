
<div class="wrapper">

<?php
	if(isset($_GET['feature']) && $_GET['feature']=='list') {
		echo '<a href="'.getLink(['events','search']).'" class="button" id="openForm">Recherche</a>';
	}
?>

<div class="results">

<?php
if(isset($contents['searchResults']) && $contents['searchResults']) {
	foreach($contents['searchResults'] as $user) {
        // echo '<pre>';
        // var_dump($user);
        // echo '</pre>';
        ?>
        <div class="userPreview">
            <a href = "<?php echo getLink(['membre','profil',$user['id']]) ?>">
                <img src ="<?php echo PHOTO_PROFIL.$user['lien']; ?>" />
                <p><?php echo $user['pseudo']; ?></p>
            </a>
        </div>

<?php
	}
}
else {	// !isset($contents['searchResults'])
	echo '<p>Votre recherche n\'a renvoyé aucun résultat</p>';
}
?>


	</div>
	<div style="clear: both; width: 100%;"></div>
</div>
