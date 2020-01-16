<?php
require 'db.php';

$db = getConnection();

if (isset($_POST['signup'])) {
	if (!empty($_POST['name']) && !empty($_POST['first_name'])) {
		$name = $_POST['name'];
		$first_name = $_POST['first_name'];
		try {
			$stmt = $db->prepare("SELECT * FROM apprenants WHERE name='$name'");
			$stmt->execute(array($name));
			$exist = $stmt->rowCount() == 0;
		} 
		catch (PDOException $error) {
			die("Connexion échouée");
		}
		if ($exist === true) {
				try {
					$stmt = $db->prepare("INSERT INTO apprenants (name, first_name) VALUES (?, ?)");
					$stmt->execute(array($name, $first_name));
					header('location: index.php');
					die();
				} 
				catch (PDOException $error) {
					die("Connexion échouée");
				}
			}
		else {
			header('Location: index.php?error=allreadysign');
			die();
		}
	} 
	else {
		header('Location: index.php?error=notfilled');
		die();
	}
}
