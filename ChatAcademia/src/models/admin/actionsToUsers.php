<?php

function avertir($username){
	require 'src/models/pdo.php';

	$sql = $bdd->prepare("INSERT INTO warnings(username, warning, warning_date) VALUES(?,?,now())");
	
	$warning = "Nous avons rencontré des réactions suspectes venant de votre part au sein de la plateforme. Notez que vous risquez d'être exclu de la plateforme.";
	$sql->execute(array($username, $warning));

}

function exclure($username){
	require 'src/models/pdo.php';

	// Insertion dans les exclusions
	$sql = $bdd->prepare("INSERT INTO exclusions(username) VALUES(?)");
	$sql->execute(array($username));

}

function inclure($username){
	require 'src/models/pdo.php';

	// Insertion dans les exclusions
	$sql = $bdd->prepare("DELETE FROM exclusions WHERE username=?");
	$sql->execute(array($username));

}