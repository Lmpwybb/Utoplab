<?php
session_start();

// Here we are checking if the $_SESSION isset and true
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true) {
// Here we redirect the user if the $ _SESSION condition is not filled
	header('Location: index.php?error=notloggedin');
	die();
}

require('lcontent.php');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Bibliothèque</title>
	<link rel="stylesheet" href="style.css">
	<link href="https://fonts.googleapis.com/css?family=Calistoga&display=swap" rel="stylesheet"> 
</head>
<body onload="NotationSystem();">
	<div id="title">
		<h1>Ma Bibliothèque</h1>
	</div>
	<div id="loggedform">
		<form action="logout.php" method="POST">
			<div id="buttons">
				<input type="submit" value="Se déconnecter">
			</div>
		</form>
	</div>
	<div class="success" id="getmain">
		<?php
		// Here we are checking if the $_SESSION is validate and if there is success return in GET and we display the sentence
			if (isset($_GET['success']) && $_SESSION['loggedin'] ==true) {
				if ($_GET['success'] == 'loggedin') {
					echo "Vous vous êtes connecté";
				}
			}
		?>
	</div>
	<div id="titlelist">
		<h2>Liste des livres</h2>
	</div>
	<table>
		<div id="stars">
			<ul>
				<li><img id="Star1" src="StarOut.gif"/></li>
				<li><img id="Star2" src="StarOut.gif"/></li>
				<li><img id="Star3" src="StarOut.gif"/></li>
				<li><img id="Star4" src="StarOut.gif"/></li>
				<li><img id="Star5" src="StarOut.gif"/></li>
			</ul>
		</div>
		<thead>
			<tr>
				<th>Couverture</th>
				<th>Titre</th>
				<th>Synopsis</th>
			</tr>
		</thead>
		<tbody>
			<tr onclick="document.location = 'book1.php';">
				<td><img alt="Astronomy picture" src="astro.jpg" width="100"></td>
			<!--Here we are returning the content of the file who content the $library-->
				<td><h3><?php echo $library['book1']['title'];?></h3></td>
				<td><?php echo $library['book1']['synopsis'];?></td>
			</tr>
		</tbody>
	</table>
	<script src="rating.js"></script>
</body>
</html>
