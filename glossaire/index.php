<?php
    require 'function.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application OPQUAST</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div id="tipslength">
    <?php
        echo sizeof($glossaire) . " astuces disponibles: <br>";
    ?>
</div>
<div id="tipsbutton">
    <a href="index.php"><input type="button" name="newtip" value="Nouveau tip"/></a>
</div>
<div id="tipsdisplay">
    <?php
        randtips($glossaire);
    ?>
</div>
</body>
</html>
