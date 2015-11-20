<?php
/* BARRE DE DEBUG : */

    $maquettes = [['events','display',666],['membres','profil',666],['membres','messages']];

    echo '<div id="debug"><div id="session"><h3>Session :</h3>';
    echo 'user connecté : ';
    echo connected() ? "Oui <br />" : "Non <br />";
    echo '<a href="sessionDestroy.php">Détruire session (simuler une arrivée sur le site)</a><br />';
    echo 'Page précédente : '.implode(' -> ',$_SESSION['previousPage']).'<br />';
    echo 'Page courante : '.implode(' -> ',$_SESSION['currentPage']).'<br />';

?>  </div>
    <div id="palette">
        <div id="color1">#303030</div>
        <div id="color2">#FAFAFA</div>
        <div id="color3">#F94339</div>
        <div id="color4">#36B136</div>
        <div id="color5">#287DFF</div>
    </div>
    <div id="maquettes">
        <h3>Accès rapide vers les maquettes :</h3>
        <?php
        foreach($maquettes as $maquette) {
            echo '<li><a href="'.getlink($maquette).'">'.implode(' -> ',$maquette).'</a></li>';
        }
        ?>
    </div>
    <div>   <!-- Assets chargés  -->
        <h3>Assets chargés :</h3>
        <?php
            print_r($scripts);
        ?>
    </div>
    <div>
        <h3>Etat du formulaire :</h3>
        <?php
        echo 'Formulaire envoyé : '.(isset($_POST['form-sent'])?'Oui !<br />':'Non :(<br />');
        print_r($_POST);
        ?>
    </div>
</div>  <!-- /#debug -->
