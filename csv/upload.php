<?php
require('db.php');

// Return of the function $db in db.php. 
$db = getConnection();

if (isset($_POST['upload'])) {
	$target_dir = "csv-uploads/";
	mkdir($target_dir, 0700);
	$target_file = $target_dir . basename($_FILES["file"]["name"]);
	$fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	$type = mime_content_type($_FILES["file"]['tmp_name']);
	if ($fileType != "csv") {
		header('Location: csv.php?error=filerror');
		die();
	}
	if (file_exists($target_file)) {
		header('Location: csv.php?error=exist');
		die();
	}
	if (!(($type == "text/csv") || ($type == "text/plain"))) {
		header('Location: csv.php?error=content');
		die();
    }
	else {
		if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
			$handle = fopen("{$target_file}", "r");
			$data = fgetcsv($handle, 1000, ",");
			$sql= 'CREATE TABLE users (';
			for($i=0;$i<count($data); $i++) {
			$sql .= $data[$i].' VARCHAR(50), ';
			}
			$sql = substr($sql,0,strlen($sql)-2);
			$sql .= ');';
			$row[]=$data;
			try {
 				$stmt = $db->prepare($sql);
 				$stmt->execute(array($sql));
 				$stmt2 = $db->prepare('INSERT INTO users (id, name, first_name, email) VALUES (?, ?, ?, ?)');
 				foreach($row as $insert)
					{
						$stmt2->execute($insert);
					}
 				header('Location: csv.php?success=import');
 				die();
 			} 
 			catch (PDOException $error) {
 				die($error->getMessage());
 			}
 			fclose($handle);
			}
		else {
			header('Location: csv.php?error=import');
			die();
		}
	}
}
