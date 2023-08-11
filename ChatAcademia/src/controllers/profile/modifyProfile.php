<?php
require "src/models/users.php";

if(isset($_POST['add'])){
    if(isset($_FILES['avatar'])){
        // Vérifier si le fichier est une image
        $file_type = strtolower(pathinfo($_FILES['avatar']['name'],PATHINFO_EXTENSION));
        $valid_types = array('jpg', 'jpeg', 'png', 'bmp');
        
        if (!in_array($file_type, $valid_types)) {
            $_SESSION['msg'] = "Le fichier n'est pas une image souhaitée : (jpg, jpeg, png, bmp).";
        }else{
            // Vérifier la taille du fichier
            $file_size = filesize($_FILES['avatar']['tmp_name']);

            if ($file_size > 2097152) {
                $_SESSION['msg'] = 'Le fichier est trop volumineux.';
            }else {
                // Créer un nouveau nom pour le fichier
                $new_file_name = $_SESSION['username'] . '.' . $file_type;
                // Déplacer le fichier dans le dossier
                move_uploaded_file($_FILES['avatar']['tmp_name'], 'src/assets/uploads/img/' . $new_file_name);
                // Enregistrer le nom du fichier dans la base de données
                updateAvatar($new_file_name);
                $_SESSION['msg'] = "L'avatar a été changé";
                header("Location:index.php?profile-for=me");
            }
        }
    }else{
        $_SESSION['msg'] = "Choisissez un avatar";
    }
}
require "src/views/profile/modifyProfile.php";