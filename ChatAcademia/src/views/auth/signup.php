<?php
$title = "Inscription à ChatAcademia";

ob_start();
?>
<div class="container col-xl-10 col-xxl-8 px-4">
    <div class="row align-items-center g-lg-5 py-5">
        <div class="col-md-10 mx-auto col-lg-10">
        
            <form method="post" class="p-4 p-md-5 border rounded-3 bg-body-tertiary">
                <div class="text-center">
                    <h1 class="display-8 fw-bold lh-1 text-body-emphasis mb-3">Inscription à ChatAcademia</p>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="username" class="form-control" id="floatingInput" placeholder="ces@r">
                    <label for="floatingInput">Nom d'utilisateur</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" name="mdp" class="form-control" id="floatingPassword" placeholder="Mot de passe">
                    <label for="floatingPassword">Mot de passe</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" name="complete_name" value="<?php if(isset($_POST['complete_name'])){echo $_POST['complete_name'];}?>" placeholder="John DOE" class="form-control" id="floatingInput">
                    <label for="floatingInput">Nom complet</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" name="matricule" value="<?php if(isset($_POST['matricule'])){echo $_POST['matricule'];}?>"  placeholder="ex. : 22JS001" class="form-control" id="floatingInput">
                    <label for="floatingInput">Matricule</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="email" name="email" value="<?php if(isset($_POST['email'])){echo $_POST['email'];}?>"  placeholder="ex. : 22JS001" class="form-control" id="floatingInput">
                    <label for="floatingInput">Adresse mail</label>
                </div>
                <div class="mb-3">
                    <label for="promotion">Promotion</label>
                    <select class="form-control" name="promotion" id="">
                        <option>L1</option>
                        <option>L2</option>
                        <option>L3</option>
                        <option>L4</option>
                    </select>
                </div> 

                <?php if(isset($_SESSION['msg'])): ?>

                <div>
                    <label><?= $_SESSION['msg'] ?></label>
                </div>

                <?php 
                    unset($_SESSION['msg']);
                endif; ?>

                <button class="w-100 btn btn-lg btn-primary" type="submit" name="signup">S'inscrire</button>
                
                <div class="text-center mt-2">
                    <a href="index.php?login">Déjà membre ?</a>
                </div>

                <hr class="my-4">
                <small class="text-body-secondary">En cliquant sur "S'inscrire", vous acceptez les conditions d'utilisations.</small>
            </form>

        </div>
    </div>
</div>
<?php 

$content=ob_get_clean();
require "src/views/layout.php";
?>