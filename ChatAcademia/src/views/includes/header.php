<!-- Récupérer les nombres de certaines données -->
<?php require_once "src/models/header.php" ?>

<header id="header" class="fixed-top d-flex align-items-center ">
<div class="container d-flex justify-content-between align-items-center">

  <div class="logo">
    <h1 class="text-light">
        <a href="index.php?home"><span>CA</span></a>
    </h1>
  </div>

  <nav id="navbar" class="navbar">
    <ul>
      <li><a class="" href="index.php?home">Accueil</a></li>

      <li class="dropdown"><a href=""><span>Apprentissage</span> <i class="bi bi-chevron-down"></i></a>
        <ul>
          <li><a href="index.php?learning=openedChats">Discussions en cours</a></li>
          <li><a href="index.php?learning=closedChats">Discussions closes</a></li>
          <li><a href="index.php?learning=myTeachers">Mes enseignants</a></li>
        </ul>
      </li>

      <li class="dropdown"><a href=""><span>Blog</span> <i class="bi bi-chevron-down"></i></a>
        <ul>

            <li><a href="index.php?blog=index">Afficher tous les articles</a></li>

            <?php if(isset($_SESSION['username']) AND $_SESSION['username']=="admin"): ?>
            
              <li><a href="index.php?publishArticle">Publier un article</a></li>
              <li><a href="index.php?allArticles">Gérer les articles</a></li>

            <?php endif; ?>
        </ul>
      </li>
      <li class="dropdown"><a href=""><span>Forums</span> <i class="bi bi-chevron-down"></i></a>
        <ul>

            <li><a href="index.php?postQuestion">Poser une question</a></li>
            <li><a href="index.php?myQuestions=index">Voir mes questions</a></li>

            <li><hr></li>

            <li><a href="index.php?forums=index&page=0">Tous les forums</a></li>
            <li><a href="index.php?forums=design&page=0">Design & Multimédias</a></li>
            <li><a href="index.php?forums=code&page=0">Programmation</a></li>
            <li><a href="index.php?forums=network&page=0">Réseaux</a></li>
            <li><a href="index.php?forums=others&page=0">Divers</a></li>
        </ul>
      </li>

    <?php if(isWarned()): ?>

        <li>
            <a href="index.php?warnings">Avertissements</a>
        </li>

    <?php endif; ?>

      <li><a href="index.php?chats=index">Messagerie</a></li>

      <?php if(isset($_SESSION['username'])):?>

        <?php if($_SESSION['username']=="admin"){ ?>

        <li class="dropdown"><a href=""><span>Utilisateurs</span> <i class="bi bi-chevron-down"></i></a>
          <ul>
            <li><a href="index.php?addTeacher">Ajouter un enseignant</a></li>
            <li><a href="index.php?usersList">Gestion d'utilisateurs</a></li>
          </ul>
        </li>

        <?php } else{ ?>

        <li class="dropdown"><a href=""><span>Amis</span> <i class="bi bi-chevron-down"></i></a>
          <ul>
            <li><a href="index.php?myFriends">Mes amis (<?= getMyFriendsNbr() ?>) </a></li>
            <li><a href="index.php?friendRequests">Demandes d'amis (<?= getAllFriendRequestsNbr() ?>)</a></li>
            <li><a href="index.php?meetPeople">Rencontrer des amis</a></li>
          </ul>
        </li>

        <?php } ?>
        
      <?php endif; ?>

      <li><a href="index.php?profile-for=me">Mon profil</a></li>
      <li><a href="index.php?logout">Se déconnecter</a></li>
    </ul>
    <i class="bi bi-list mobile-nav-toggle"></i>
  </nav><!-- .navbar -->

</div>
</header><!-- End Header -->