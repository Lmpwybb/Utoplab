<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Bibliothèque</title>
	<link rel="stylesheet" href="style.css">
	<link href="https://fonts.googleapis.com/css?family=Calistoga&display=swap" rel="stylesheet"> 
</head>
<body>
	<div id="titleindex">
		<h1>Ma Bibliothèque</h1>
	</div>
	<div id="picture">
		<img src="livres.jpg" alt="Picture of books">
	</div>
	<div id="connectform">
		<form action="login.php" method="POST">
			<div id="loginputs">
				<input type="email" placeholder="Votre Identifiant" name="email"><br>
				<input type="password" placeholder="Votre Mot de passe" name="password">
			</div>
			<div id="buttons">
				<input type="submit" name="signup" value="S'enregistrer">
				<input type="submit" name="signin" value="Se connecter">
			</div>
		</form>
	</div>
	<div class="success getindex">
		<?php
		// Here we are checking if there is success return in GET and we display the sentence
			if (isset($_GET['success'])) {
				if ($_GET['success'] == 'signed') {
					echo "Vous vous êtes enregistré";
				}
			}
		?>
	</div>
	<div class="error getindex">
		<?php
		// Here we are checking if there is error return in GET and we display the sentence associate to the error
			if (isset($_GET['error'])) {
				if ($_GET['error'] == 'bad') {
					echo "Identifiant et / ou mot de passe incorrect.";
				}
				if ($_GET['error'] == 'loginexist') {
					echo "Cet utilisateur existe déjà !";
				}
				if ($_GET['error'] == 'notfilled') {
					echo "Un des champs n'est pas correctement remplie.";
				}
				if ($_GET['error'] == 'notloggedin') {
					echo "Vous n'êtes pas connecté.";
				}
			}
		?>
	</div>
</body>
</html>
