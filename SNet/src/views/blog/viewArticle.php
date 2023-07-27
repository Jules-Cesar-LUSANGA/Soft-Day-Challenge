<?php
$title = "";

ob_start();

require "src/views/includes/header.php";
?>

<main class="container">
    <div class="">
            <p>Titre : <?php echo $question['title'];?></p>
            <p>Publié par <?php echo $question['author'];?> -- <?php echo $question['date'];?></p>
    </div>
    <div>
        <?php echo $question['content']; ?>
    </div>
    <br>
    <form action="" method="post">

        <?php  
            echo $like_btn;
            
            if (isset($modify_btn)) {
                echo $modify_btn;
                echo $delete_btn;
            }

        ?>

        <div class="form-group">
            <label for="article">Commentaires</label>
            <textarea class="form-control" name="comment" id="article" rows="3"></textarea>
        </div>
        <button type="submit" name="post_comment" class="btn btn-primary">Poster</button>
    </form>
    <br>
    <div class="comments">
    <?php
        foreach ($comments as $comment) {
        ?>
            <article class="alert alert-success">
                <p>
                    Par <?= $comment['author'] . " --- " . $comment['date']  ?>
                </p>
                <p>
                    <?= $comment['content'] ?>
                </p>
            </article>
        <?php
        }
    ?>
    </div>
</main>
<?php 
$content=ob_get_clean();
require "src/views/layout.php";
?>