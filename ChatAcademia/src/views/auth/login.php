<?php
$title = "Connexion";

ob_start();
?>
<div class="container col-xl-10 col-sm-10 col-md-10 px-4">
    <div class="row align-items-center g-lg-5 py-5">
        
        <div class="col-md-10 mx-auto col-lg-10">
        
            <form method="post" class="p-4 p-md-5 border rounded-3 bg-body-tertiary">
                <div class="text-center">
                    <h2 class="display-8 fw-bold lh-1 text-body-emphasis mb-3">Connexion à ChatAcademia</h2>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="username" class="form-control" id="floatingInput" placeholder="ces@r">
                    <label for="floatingInput">Nom d'utilisateur</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" name="mdp" class="form-control" id="floatingPassword" placeholder="Mot de passe">
                    <label for="floatingPassword">Mot de passe</label>
                </div>

                <?php if(isset($_SESSION['msg'])): ?>

                <div class="mb-3">
                    <label><?= $_SESSION['msg'] ?></label>
                </div>

                    <?php unset($_SESSION['msg']); ?>
                <?php endif; ?>
                
                <button class="w-100 btn btn-lg btn-outline-success" type="submit" name="login">Se connecter</button>
                <div class="text-center mt-2">
                    <a href="index.php?signup">Pas encore membre ?</a>
                </div>

                
                <hr class="my-4">
                <small class="text-body-secondary">En cliquant sur "Se connecter", vous acceptez les conditions d'utilisations.</small>
            </form>
            
        </div>
    </div>
</div>
<?php 
$content=ob_get_clean();
require "src/views/layout.php";
?>