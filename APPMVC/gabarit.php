<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<link rel="stylesheet" type="text/css" href="Styles/base.css" />
	<link rel="stylesheet" type="text/css" href="Styles/structure.css" />
        <title>
            <?php echo($titre); ?>
        </title>
    </head>
        <div id="global">
            <div id="tete">
                <?php echo($entete); ?>
            </div>

            <hr/>

            <div id="corps">
                <div id="menu">
                    <?php echo($menu); ?>
                </div>
                <div id="contenu">
                    <?php echo($contenu); ?>
                </div>
            </div>

            <hr />

            <div id="pied">
                <?php echo($pied); ?>
            </div>
        </div>
</html>
