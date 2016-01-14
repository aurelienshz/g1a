<?php /* BARRE DE DEBUG : */  ?>

<div id="palette" style="">
    <div id="color1">#303030</div>
    <div id="color2">#FAFAFA</div>
    <div id="color3">#F94339</div>
    <div id="color4">#36B136</div>
    <div id="color5">#287DFF</div>
</div>

<?php



$maquettes = [['events','display',4],['membres','profil',1],['membres','messages'],['events','search'], ['membres','modification_profil'], ['events','modify',2]];



echo '<div id="debug">';
require 'controleurs/shared/bddVersion.php';
echo '<div id="session" style="display:none;"><h3>Session :</h3>';
echo 'user connecté : ';
echo connected() ? "Oui ! :)<br />" : "Non !<br />";
echo '<a href="controleurs/shared/sessionDestroy.php">Détruire session (simuler une arrivée sur le site)</a><br />';
echo 'Page précédente : '.implode(' -> ',$_SESSION['previousPage']).'<br />';
echo 'Page courante : '.implode(' -> ',$_SESSION['currentPage']).'<br />';
echo '</div>';
?>

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
            echo "<strong>Scripts : </strong>";
            print_r($scripts);
        ?>
    </div>
    <div>
        <h3>Messages de debug :</h3>
        <?php echo "<strong>Alertes : </strong>"; print_r(isset($_SESSION['alerts'])?$_SESSION['alerts']:"Pas d'alerte à afficher."); echo '<br />'; ?>
        <?php echo isset($contents['debug'])?$contents['debug']:''; ?>
    </div>
</div>  <!-- /#debug -->
