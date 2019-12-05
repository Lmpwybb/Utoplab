<?php
session_start();
require('db.php');

// Return of the function $db in db.php. 
$db = getConnection();

// Here once the signup isset button
if (isset($_POST['signup'])) {
	// We are checking if the inputs are not empty
	if (!empty($_POST['email']) && !empty($_POST['password'])) {
		$login = $_POST['email'];
		// Here this variable hash the password
		$passhash = password_hash($_POST['password'], PASSWORD_DEFAULT);
		// Here we are checking if the content of the input is an email type
		if (filter_var($login, FILTER_VALIDATE_EMAIL)) {
			try {
				// Here we are checking if the email exist
				$stmt = $db->prepare('SELECT * FROM users WHERE email=?');
				$stmt->execute(array($login));
				$exist = $stmt->rowCount() == 0;
			} 
			catch (PDOException $error) {
				die($error->getMessage());
			}
			// If it does not exist
			if ($exist === true) {
				try {
				// We insert it in the db with the previous hashed password with an prepare / execute in array
					$stmt = $db->prepare('INSERT INTO users (email, password) VALUES (?, ?)');
					$stmt->execute(array($login, $passhash));
					header('Location: index.php?success=signed');
					die();
				} 
				catch (PDOException $error) {
					die($error->getMessage());
				}
			}
			else {
				// If the email exist, the user will be redirect with an error
				header('Location: index.php?error=loginexist');
				die();
			}
		}
		else {
			header('Location: index.php?error=notanemail');
			die();
		}
    }
    else {
		// If an input is empty, the user will be redirect with an error
		header('Location: index.php?error=notfilled');
	}
}

// Here once the signin isset button
elseif (isset($_POST['signin'])) {
	// We are checking if the inputs are not empty
	if (!empty($_POST['email']) && !empty($_POST['password'])) {
		$login = $_POST['email'];
		$password = $_POST['password'];
		// Here we are setting the $row variable to null to be sure
		$row = null;
		try {
		// Here we are checking if the email match with an entry
			$stmt = $db->prepare('SELECT * FROM users WHERE email=?');        
			$stmt->execute(array($login));      
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
		// Here we are checking if the password match with the hashed password in the db
			$hashverify = password_verify($password, $row['password']);
			$exists = $stmt->rowCount() == 1;
		} 
		catch (PDOException $error) {
			die($error->getMessage());
		}
		// Here if the email exists match to an entry and the password matches with the hashed in the db
		if ($exists === true && array_key_exists('email', $row) && $hashverify === true) {
			$_SESSION['email'] = $row['email'];
		// The $_SESSION will be true 
			$_SESSION['loggedin'] = true;
		// And the user will be redirect on the aimed page
			header('Location: main.php?success=loggedin');
			die();
		}
		else {
		// If there is an error from the password or the email, the user will be redirect with an error
			header('Location: index.php?error=bad');
			die();
		}
	}
	else {
		// If an input is empty, the user will be redirect with an error
		header('Location: index.php?error=notfilled');
		die();
	}
}
	
