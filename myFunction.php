<?php

function mySqli() {
	try {
  	$bdd = new PDO('mysql:host=localhost;dbname=BDD_BLOG;charset=utf8','purple','Alchimie12');
  	return $bdd;
	}
	catch(Exception $e) {

  	die('Erreur : '.$e->getMessage());
	}
}


?>
