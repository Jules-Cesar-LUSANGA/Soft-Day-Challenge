<?php
$title = "Gestion des utilisateurs";

ob_start();
?>

<div class="container">
    <div class="usersList mt-4 pt-4">
        <h3>Gestion des utilisateurs</h3>
        <hr>
        <table class="table table-hover">
            <thead>

                  <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Username</th>
                        <th scope="col">Nom complet</th>
                        <th scope="col" class="text-center">Actions</th>
                  </tr>

            </thead>

            <tbody>

            <?php foreach ($users as $user) {?>
                     
                  <tr>
                        <th scope="row">
                            <?=$user['id']?>
                        </th>
                        <td>
                            <?=$user['username']?>
                        </td>
                        <td>
                            <?=$user['complete_name']?>
                        </td>
                        <td class="text-center">
                            <a href="index.php?avertir=<?=$user['username']?>" class="btn btn-info">Avertir</a>
                            
                            <?php if(isExcluded($user['username'])){ ?>
                                <a href="index.php?inclure=<?=$user['username']?>" class="btn btn-primary">Inclure</a>
                            <?php } else{ ?>
                                <a href="index.php?exclure=<?=$user['username']?>" class="btn btn-danger">Exclure</a>
                            <?php }?>

                        </td>
                  </tr>

            <?php } ?>

            </tbody>
        </table>
    </div>  
</div>

<?php 
$content=ob_get_clean();
require "src/views/layout.php";
?>