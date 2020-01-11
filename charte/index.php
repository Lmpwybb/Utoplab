<?php
include 'db.php';

if (isset($_GET['error'])) {
	if ($_GET['error'] == 'allreadysign') {
		echo "Cette personne a déjà signé la charte";
	}
	if ($_GET['error'] == 'notfilled') {
		echo "Les champs n'ont pas été correctement remplis";
	}
}

// Return of the function $db in db.php. 
$db = getConnection();

?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>charte apprenant·e</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div>
		<h1 id="title">Charte de l'apprenant·e</h1>
	</div>
	<div>
		<h2>Fonctionnement global de la promo:<br><span>Boon of the tiger</span></h2>
			<ul>
				<li>Le confort de tou·te·s en compte tu prendras</li>
				<li>Des locaux propres tu préserveras</li>
				<li>Collectivement le vendredi tu rangeras</li>
				<li>Ta météo brièvement tu feras</li>
				<li>La veille tu respecteras</li>
				<li>La feuille de présence tu signeras</li>
				<li>Dans le travail concentré tu seras</li>
			</ul>
	</div>
	<div>
		<h2>Etat d'esprit / vision:<br><span>Hidden war</span></h2>
			<ul>
				<li>A la réussite collective tu oeuvreras</li>
				<li>Plus haut que ton cul ne pèteras</li>
				<li>Quand la parole tu prendras l'attention tu auras</li>
				<li>Au bien être de tous tu veilleras</li>
				<li>Dans le partage tu travailleras</li>
				<li>Avec patience et persévérance tu apprendras</li>
				<li>Ton utopote tu respecteras</li>
				<li>Ton esprit ouvert tu garderas</li>
				<li>En autonomie tu feras mais l'esprit de groupe tu protègeras</li>
			</ul>
	</div>
	<div>
		<h2>Engagements de l'apprenant·e:<br><span>Ligthning Crushers</span></h2>
			<ul>
				<li>Assidu tu seras</li>
				<li>Le temps de parole tu respecteras</li>
				<li>Tes formateurs tu respecteras</li>
				<li>L'entraide tu pratiqueras</li>
				<li>Ta curiosité tu aiguiseras</li>
				<li>Ta connaissance constamment tu élargiras</li>
				<li>Dans tes recherches, méthodique tu seras</li>
				<li>Ces règles tu appliqueras</li>
				<li>Le matériel tu respecteras</li>
			</ul>
	</div>
	<div id="list">
		<h2>Liste des signataires:</h2>
		<ul>
		<?php
			try {
				$result = $db->query('SELECT * FROM apprenants ORDER BY ID');
			}
			catch (PDOException $error) {
				die("Connexion échouée");
			}
			foreach ($result as $display) {
				echo '<li>' . $display['name'] . ' ';
				echo $display['first_name'] .'</li>';
			}
		?>
		</ul>
	</div>
	<div>
		<h2>Pour signer cette charte:</h2>
		<form action="signup.php" method="POST">
			<div>
				<input type="text" placeholder="Votre nom" name="name">
				<input type="text" placeholder="Votre Prénom" name="first_name">
			</div>
			<div id="button">
				<input type="submit" name="signup" value="Signer">
			</div>
		</form>
	</div>
</body>
</html>
