<?php
session_start();

// Here we are checking if the $_SESSION isset and true
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true) {
// Here we redirect the user if the $ _SESSION condition is not filled
	header('Location: index.php?error=notloggedin');
	die();
}

require('bcontent.php');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Livre 1</title>
	<link rel="stylesheet" href="style.css">
	<link href="https://fonts.googleapis.com/css?family=Calistoga&display=swap" rel="stylesheet"> 
</head>
<body>
	<div id="title">
		<h1>Livre 1</h1>
	</div>
	<div id="loggedform">
		<form action="logout.php" method="POST">
			<div id="buttons">
				<input type="submit" value="Se déconnecter">
			</div>
		</form>
	</div>
	<div id="controlbuttons">
		<form action="main.php">
			<input type="submit" value="Retour">
		</form>
		<!--Here we are sending the classname with a positive or negative value to the function resizeText()-->
		<button onclick="resizeText(1)">+</button>
		<button onclick="resizeText(-1)">-</button>
	</div>
	<div id="read">
		<div class="page1 location">
		<!--Here we are returning the content of the file who content the $book1-->
			<p><?php echo $book1['page1']['p1'];?></p>
			<p><?php echo $book1['page1']['p2'];?></p>
			<p><?php echo $book1['page1']['p3'];?></p>
			<p><?php echo $book1['page1']['p4'];?></p>
			<p><?php echo $book1['page1']['p5'];?></p>
			<h2><?php echo $book1['page1']['number'];?></h2>
		<!--Here we are sending the classname to the function turn()-->
			<img class="next" src="next.png" alt="Next page" onclick="turn('.page2', '.page1')"/>
		</div>
		<div class="page2 location active">
			<p><?php echo $book1['page2']['p1'];?></p>
			<p><?php echo $book1['page2']['p2'];?></p>
			<p><?php echo $book1['page2']['p3'];?></p>
			<p><?php echo $book1['page2']['p4'];?></p>
			<p><?php echo $book1['page2']['p5'];?></p>
			<h2><?php echo $book1['page2']['number'];?></h2>
			<img class="back" src="back.png" alt="Back page" onclick="turn('.page1', '.page2')"/>
			<img class="next" src="next.png" alt="Next page" onclick="turn('.page3', '.page2')"/>
		</div>
		<div class="page3 location active">
			<p><?php echo $book1['page3']['p1'];?></p>
			<p><?php echo $book1['page3']['p2'];?></p>
			<p><?php echo $book1['page3']['p3'];?></p>
			<p><?php echo $book1['page3']['p4'];?></p>
			<p><?php echo $book1['page3']['p5'];?></p>
			<h2><?php echo $book1['page3']['number'];?></h2>
			<img class="back" src="back.png" alt="Back page" onclick="turn('.page2', '.page3')"/>
			<img class="next" src="next.png" alt="Next page" onclick="turn('.page4', '.page3')"/>
		</div>
		<div class="page4 location active">
			<p><?php echo $book1['page4']['p1'];?></p>
			<p><?php echo $book1['page4']['p2'];?></p>
			<p><?php echo $book1['page4']['p3'];?></p>
			<p><?php echo $book1['page4']['p4'];?></p>
			<p><?php echo $book1['page4']['p5'];?></p>
			<h2><?php echo $book1['page4']['number'];?></h2>
			<img class="back" src="back.png" alt="Back page" onclick="turn('.page3', '.page4')"/>
			<img class="next" src="next.png" alt="Next page" onclick="turn('.page5', '.page4')"/>
		</div>
		<div class="page5 location active">
			<p><?php echo $book1['page5']['p1'];?></p>
			<p><?php echo $book1['page5']['p2'];?></p>
			<p><?php echo $book1['page5']['p3'];?></p>
			<p><?php echo $book1['page5']['p4'];?></p>
			<p><?php echo $book1['page5']['p5'];?></p>
			<h2><?php echo $book1['page5']['number'];?></h2>
			<img class="back" src="back.png" alt="Back page" onclick="turn('.page4', '.page5')"/>
		</div>
	</div>
	<script src="turn.js"></script>
	<script src="resize.js"></script>
</body>
</html>
