<?php

session_start();
$id = $_SESSION["id"];
$bdd= mysqli_connect("localhost","root","","moduleconnexion");
$req= mysqli_query($bdd,"SELECT * FROM utilisateurs WHERE id = $id");
$res= mysqli_fetch_all($req);
$login = $res[0]['login'];
$prenom = $res[0]['prenom'];
$nom = $res[0]['nom'];
$password = $res[0]['password']; 


if (isset($_POST['profil']))
{
    $nom10 = $_POST['nom'];
    $prenom10 = $_POST['prenom'];
    $password10 = $_POST['password'];
    $login10 = $_POST['login'];
    $req2= mysqli_query($bdd,"UPDATE utilisateurs SET login='$login10', prenom='$prenom10', nom='$nom10', password='$password10' WHERE  id = $id ");
    header("Location: profil.php");
} 

?>


<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="profil.css" rel="stylesheet" />
        
        <title>  changement profil</title>
        <meta name=" description " content=" ">

    </head>

    <body>

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
        </header>
        <main>
        <h1>Bienvenue sur Notre Site</h1>
        <p> changer vos informations</p>
        <form name="formu" action="#" method="POST">
            <div class ="formli">
            <label for="username"></label> 
            <input id="login" name="login" type="text" placeholder="username"/>
            <label for="username"></label> 
            <input name="prenom"  type="text" placeholder="prenom"/>
            <label for="username"></label> 
            <input name="nom"  type="text" placeholder="nom"/>
            <label for="username"></label> 
            <input name="password"  type="password" placeholder="ton mdp"/>
            <input type=submit value="Mettre à jour le profil" name="env">
            </div>
            </form> 
        </main>
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