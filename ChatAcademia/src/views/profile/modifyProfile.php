<?php
$title = "Modifier mon avatar";

?>
<div class="mt-4 pt-4">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="container text-center">
            <h2 class="text-start">Modification de l'avatar du compte</h2>
            <hr>
            <div class="form-group my-3">
              <label for="avatar">Ajouter un avatar</label>
              <input type="file" class="form-control-file" name="avatar" id="avatar" placeholder="Avatar" aria-describedby="fileHelpId">
            </div>
            <?php if (isset($_SESSION['msg'])): ?>

                <div class="alert alert-danger">
                    <?=$_SESSION['msg']?>
                </div>
                
                <?php unset($_SESSION['msg']) ?>
                
            <?php endif ?>
            <button type="submit" name="add" class="btn btn-success">Valider</button>
        </div>
    </form>
</div>

<?php 
$content=ob_get_clean();
require "src/views/layout.php";
?>