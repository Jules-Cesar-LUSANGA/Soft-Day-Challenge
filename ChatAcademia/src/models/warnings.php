<?php

function getWarnings(){
	require "src/models/pdo.php";

	$sql = $bdd->prepare("SELECT * FROM warnings WHERE username=? ORDER BY id DESC");
	$sql->execute(array($_SESSION['username']));

	while($res = $sql->fetch()){
		$warnings[] = [
			'content' => $res['warning'],
			'date' => $res['warning_date']
		];
	}

	return $warnings;
}	