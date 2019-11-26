<?php
session_start();
require('db.php');

if (isset($_POST['signup'])) {
	if (!empty($_POST['email']) && !empty($_POST['password'])) {
		$login = $_POST['email'];
		$passhash = password_hash($_POST['password'], PASSWORD_DEFAULT);
		if(filter_var($login, FILTER_VALIDATE_EMAIL)) {
			try {
				$stmt = $db->prepare('SELECT * FROM users WHERE email=?');
				$stmt->execute(array($login));
				$exist = $stmt->rowCount() == 0;
			} 
			catch (PDOException $error) {
				die($error->getMessage());
			}
			if ($exist === true) {
				try {
					$stmt = $db->prepare('INSERT INTO users (email, password) VALUES (?, ?)');
					$stmt->execute(array($login, $passhash));
					header('Location: logme.php?success=signed');
					die();
				} 
				catch (PDOException $error) {
					die($error->getMessage());
				}
			}
			else {
				header('Location: logme.php?error=loginexist');
				die();
			}
		}
		else {
			header('Location: logme.php?error=notanemail');
			die();
		}
    }
    else {
		header('Location: logme.php?error=notfilled');
	}
}

elseif (isset($_POST['signin'])) {
	if (!empty($_POST['email']) && !empty($_POST['password'])) {
		$login = $_POST['email'];
		$password = $_POST['password'];
		$row = null;
		try {
			$stmt = $db->prepare('SELECT * FROM users WHERE email=?');        
			$stmt->execute(array($login));      
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			$hashverify = password_verify($password, $row['password']);
			$exists = $stmt->rowCount() == 1;
		} 
		catch (PDOException $error) {
			die($error->getMessage());
		}
		if ($exists === true && array_key_exists('email', $row) && $hashverify === true) {
			$_SESSION['email'] = $row['email'];
			$_SESSION['loggedin'] = true;
			header('Location: main.php');
			die();
		}
		else {
			header('Location: logme.php?error=bad');
			die();
		}
	}
	else {
		header('Location: logme.php?error=notfilled');
		die();
	}
}
