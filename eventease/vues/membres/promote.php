<div class="wrapper-narrow">
    <?php
    if(isset($contents['ok'])) {
        echo "<p class=\"error-message\" style=\"color:#287DFF;\">".$contents['ok']."</p>";
    }
    ?>
    <form method="post" action="<?php echo getLink(['membres','promote',$_GET['id']]); ?>">
        <label for="username">Promouvoir</label>
        <select name="niveau">
            <option value="1" <?php echo $contents['value']==1?'selected':'' ?>>Membre</option>
            <option value="2" <?php echo $contents['value']==2?'selected':'' ?>>Modérateur</option>
            <option value="3" <?php echo $contents['value']==3?'selected':'' ?>>Administrateur</option>
        </select>
        <div class="ligneBoutons" style="margin-bottom:2em;">
            <a style="width: 40%; background-color: grey" class="champ button" href="<?php echo getLink(['membres','profil',$_GET['id']]); ?>">Retour</a>
            <input style="width: 40%;" type="submit" value="Valider"/>
        </div>
    </form>
</div>
