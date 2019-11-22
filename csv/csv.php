<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">
	<title>CSV</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div id="form">
		<form action="upload.php" method="post" enctype="multipart/form-data">
			<div class="select">
				<label for="file">Sélectionner le fichier .CSV à envoyer:</label>
				<input type="file" id="file" name="file" accept=".csv">
			</div>
			<div class="pos">
				<input type="submit" name="upload" value="Importer le fichier">
			</div>
			<div class="pos error">
				<?php
					if (isset($_GET['error'])) {
						if ($_GET['error'] == 'exist') {
							echo "Le fichier existe déjà.";
						}
						if ($_GET['error'] == 'filerror') {
							echo "Uniquement les fichiers .csv sont autorisés.";
						}
						if ($_GET['error'] == 'upload') {
							echo "Il y a eu une erreur lors de l'importation.";
						}
						if ($_GET['error'] == 'content') {
							echo "Le contenu de ce fichier n'est pas de type csv.";
						}
					}
				?>
			</div>
			<div class="pos success">
				<?php
					if (isset($_GET['success'])) {
						if ($_GET['success'] == 'upload') {
							echo "Le fichier a bien été importé.";
						}
					}
				?>
			</div>
		</form>
	</div>
</body>
</html>
