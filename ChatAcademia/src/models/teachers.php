<?php

function addTeacher($username, $mdp, $complete_name, $email){
	require 'src/models/pdo.php';

	$isExistTeacher = $bdd->prepare("SELECT username, complete_name FROM users WHERE username=? AND complete_name=?");
	$isExistTeacher->execute(array($username, $complete_name));

	if ($isExistTeacher->rowCount()==0) {
		$sql = $bdd->prepare("INSERT INTO users(username, mdp, complete_name, matricule, email, promotion, category, img) VALUES(?,?,?,'Enseignant',?,'Enseignant','Enseignant', 'avatar.png')");
		$sql->execute(array($username,$mdp, $complete_name, $email));
	}
}
