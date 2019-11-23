<?php
require('translate.php');

if (isset($_GET['error'])) {
	if ($_GET['error'] == 'bad') {
		echo $translate['bad'];
	}
	if ($_GET['error'] == 'loginexist') {
		echo $translate['loginexist'];
	}
	if ($_GET['error'] == 'notfilled') {
		echo $translate['notfilled'];
	}
	if ($_GET['error'] == 'notloggedin') {
		echo $translate['notloggedin'];
	}
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $translate['title'];?></title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="flag">
		<a href='logme.php' target='_self'><img src='flagfr.png' alt='French flag'></a>
		<a href='logme.php?lang=eng' target='_self'><img src='flagen.png' alt='English flag'></a>
	</div>
	<h2 id="idpw"><?php echo $translate['type'];?></h2>
	<div id="form">
		<form action="login.php" method="POST">
			<div>
				<input type="email" placeholder="<?php echo $translate['id'];?>" name="email"></br>
				<input type="password" placeholder="<?php echo $translate['password'];?>" name="password">
			</div>
			<div id="cob">
				<input type="submit" name="signup" value="<?php echo $translate['registbutton'];?>">
				<input type="submit" name="signin" value="<?php echo $translate['logbutton'];?>">
			</div>
		</form>
	</div>
</body>
</html>
