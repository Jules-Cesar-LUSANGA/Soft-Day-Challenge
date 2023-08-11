<?php
require "src/models/learning.php";

// Récupérer la liste de tous les enseignants
$teachers = getTeachers();

require "src/views/learning/myTeachers.php";