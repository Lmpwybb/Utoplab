<?php
include 'glossaire.php';

function randtips($glossaire) {
	$rand = rand(0, sizeof($glossaire) -1);
	echo '<b>' . $glossaire[$rand]["title"] . '</b>' . '<br>';
	echo '<p>' . $glossaire[$rand]["description"] . '</p>';
}
