<?php
$title = "Profil";

ob_start();
?>
<div class="container">
      <h2 class="pt-4 mt-4">Profil</h2>
      <hr>
      <div class="main-body">
        <?php if($_GET['profile-for']=="admin"): ?>
        
          <div class="alert alert-danger">Vous ne pouvez pas voir ce profil</div>
        
        <?php else: ?>
          
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="src/assets/uploads/img/<?=$userInfos['img'];?>" alt="avatar" class="rounded-circle" width="150">
                    <div class="mt-3">
                      <h4><?=$userInfos['username'];?></h4>
                      
                      <?php
                        // Cette partie est un peu difficile à comprendre
                        
                        // Vérifier se le profil demandé est celui de l'utilisateur courant
                        if ($userInfos['username']==$_SESSION['username']) {
                            echo "<a href='index.php?modifyProfile' class='btn btn-outline-primary'>Modifier l'avatar</a>";
                        }
                        // Sinon
                        else{
                            // Vérifier si l'utilisateur courant est ami du propriétaire du profil
                            if (isMyFriend($_GET['profile-for'])==true) {
                                echo "<a href='index.php?chat-to=" . $userInfos['username'] . "' class='btn btn-outline-primary'>Envoyer un message</a>";
                            }
                            else {
                              // Vérifier s'il n'y a pas une demande d'ami entre les deux utilisateurs
                              if (isset($isExistRequest) and $isExistRequest==false) {
                                echo "<a href='index.php?add_friend=" . $userInfos['username'] . "' class='btn btn-primary'>Demande d'ami</a>";
                              }
                              // Si oui
                              else {
                                // Vérifier si l'utilisateur courant est celui qui a fait la demande
                                if (isset($isExistRequest) and $isExistRequest==$_SESSION['username']) {
                                  echo "<a href='index.php?refuseRequest=" . $userInfos['username'] . "' class='btn btn-danger'>Annuler</a>";
                                }else{
                                  echo "<a href='index.php?confirmRequest=" . $userInfos['username'] . "' class='btn btn-success'>Confirmer</a>";
                                }
                              }
                            }
                        }
                        // Fin de la difficulté
                      ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Nom complet</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?=$userInfos['complete_name'];?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?=$userInfos['email'];?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Promotion</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?=$userInfos['promotion'];?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        <?php endif; ?>
      </div>
</div>

<?php 
$content=ob_get_clean();
require "src/views/layout.php";
?>