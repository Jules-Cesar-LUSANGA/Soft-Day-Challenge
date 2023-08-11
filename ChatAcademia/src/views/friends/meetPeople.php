<?php
$title = "Chercher un ami";

?>

<div class="container">
    <h3 class="mt-4 pt-4"><?=$title?></h3>
    <hr>

    <table class="table table-hover table-inverse table-responsive">
        <thead class="thead-inverse">
            <tr>
                <th>N°</th>
                <th>Nom d'utilisateur</th>
                <th>Nom complet</th>
            </tr>
            </thead>
            <tbody>
                <?php $nb=1 ?>
                <?php foreach ($users as $user):?>

                <tr>
                    <td scope="row"><?php echo $nb; $nb++?></td>
                    <td>
                        <a href="index.php?profile-for=<?=$user['username']?>">
                            <?=$user['username']?>
                        </a>
                    </td>
                    <td><?=$user['complete_name']?></td>
                </tr>
                
                <?php endforeach;?>

            </tbody>
    </table>

</div>

<?php 
$content=ob_get_clean();
require "src/views/layout.php";
?>