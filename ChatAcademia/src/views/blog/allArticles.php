<?php
$title = "Gestion des articles";

ob_start();
?>


<div class="container" id="ShowArticles">
    <h3 class="mt-4 pt-4">Gestion des articles</h3>
    <hr>
    <table class="table table-hover">
        <thead>
              <tr>
                    <th scope="col">N°</th>
                    <th scope="col">Titre</th>
                    <th scope="col">Auteur</th>
                    <th scope="col">Date</th>
              </tr>
        </thead>

        <tbody>
        <?php $nb=1 ?>
        <?php foreach ($articles as $article):?>
                 
              <tr>  
                    <td>
                        <?php 
                            echo $nb;
                            $nb++;
                        ?>
                    </td>
                    <td>
                        <a href="index.php?viewArticle=<?=$article['id']?>">
                            <?=$article['title']?>
                        </a>
                    </td>
                    <td>
                        <?=$article['author']?>
                    </td>
                    <td>
                        <?=$article['date']?>
                    </td>
              </tr>

        <?php endforeach;?>

        </tbody>
    </table>

</div>

<?php 
$content=ob_get_clean();
require "src/views/layout.php";
?>