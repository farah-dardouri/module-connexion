<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
   <head>
       <meta charset="UTF-8">
       <meta http-equiv="X-UA-Compatible" content="IE=edge">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title>module de connexion</title>
       <link href="index.css" rel="stylesheet" />
   </head>
   <body class="body1">
   <header>
      <nav class=principale>
        <a class="active" href="index.php">Accueil</a>
        <?php if (isset($_SESSION['id'] )) {?> 
        <a href="profil.php?id=" <?php $_SESSION['id'] ?> >Profil</a>
        <?php }  else { ?>
        <a href='inscription.php'>Inscription</a>
        <?php } ?>
        <?php { ?>
          <a href="connexion.php">Connexion</a>
        <?php }  ?>
      </nav>
      <div class="titre"><h1>Accueil</h1>  </div>
    </header>
        <footer>
        <nav class="a">
        <a href="index.php">Accueil</a>
        <?php if (isset($_SESSION['id'] )) {?> 
        <a href="profil.php?id=" <?php $_SESSION['id'] ?> >Profil</a>
        <?php }  else { ?>
        <a href='inscription.php'>Inscription</a>
        <?php } ?>
        <?php { ?>
          <a href="connexion.php">Connexion</a>
        <?php }  ?>
      </nav>
        </footer>                
    </body>
</html>