<?php
require 'src/models/teachers.php';

if (isset($_POST['addTeacher'])) {
	
	if (!empty($_POST['username']) and !empty($_POST['mdp']) and !empty($_POST['complete_name']) and !empty($_POST['email'])) {
		$username = htmlspecialchars($_POST['username']);
		$mdp = password_hash(($_POST['mdp']),PASSWORD_DEFAULT);
		$complete_name = htmlspecialchars($_POST['complete_name']);
		$email = htmlspecialchars($_POST['email']);

		addTeacher($username, $mdp, $complete_name, $email);
	}
}

require 'src/views/admin/addTeacher.php';