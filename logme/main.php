<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true) {
	header('Location: logme.php?error=notloggedin');
	die();
}
require('translate.php');
?> 

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Trou Noir</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="flag">
		<a href='main.php' target='_self'><img src='flagfr.png' alt='French flag'></a>
		<a href='main.php?lang=eng' target='_self'><img src='flagen.png' alt='English flag'></a>
	</div>
	<div id="decob">
		<form action="logout.php" method="get">
			<input type="submit" value="<?php echo $translate['deco'];?>">
		</form>
	</div>
	<h1 id="title"><?php echo $translate['blackhole'];?></h1>
	<div id="hole">
		<p><?php echo $translate['p1'];?><br>
		<?php echo $translate['p2'];?><br>
		<?php echo $translate['p3'];?><br>
		<?php echo $translate['p4'];?><br>
		<?php echo $translate['p5'];?></p>
	</div>
</body>
</html>
