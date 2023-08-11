<?php
require 'src/models/admin/actionsToUsers.php';

if (isset($_GET['avertir'])) {
	avertir($_GET['avertir']);
}

elseif (isset($_GET['exclure'])) {
	exclure($_GET['exclure']);
}

elseif (isset($_GET['inclure'])) {
	inclure($_GET['inclure']);
}


header("Location:index.php?usersList");