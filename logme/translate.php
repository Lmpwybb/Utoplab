<?php
$lang = 'fr';
if(isset($_GET['lang'])){
	$lang = 'eng';
}
include($lang .'.php');
