<?php
    session_start();
    if(isset($_POST["deco"]))
    {
        session_destroy();
        header('Location:index.php');
    }
?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>module de connexion</title>
		<link href="inscription.css" rel="stylesheet" />
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
		</header>
	<main>	
		<section class="for">	
			<h1>REMPLISSEZ LE FORMULAIRE</h1>
			<form action="" method="POST">
				
					
					<input type="text" name="login" id="login" required placeholder="login*">
				    <br>
					<input type="text" name="prenom" id="prenom" required placeholder="prenom*">
				
					<br>
					<input type="text" name="nom" id="nom" required placeholder="nom*">
				    <br>
					
					<input type="password" name="password" id="password" required placeholder="mot de passe*">
				    <br>
					
					<input type="password" name="confmdp" id="confmdp" required placeholder="confirmation de mdp*">
				<br>
					<button class="bo" type="submit" name="connexion">s'inscrire </button>
				</p>
            </form>
		</section>
		<?php
            $bdd = mysqli_connect("localhost", "root", "", "moduleconnexion"); // connexion bdd
            
            if (isset($_POST['connexion']))
            {
                $login = $_POST['login'];
                $prenom = $_POST['prenom'];
                $nom = $_POST['nom'];
                $mdp = $_POST['password'];

                $logincheck = "SELECT login FROM utilisateurs WHERE login = '$login'";
                $check = mysqli_query($bdd , $logincheck);
                $verificationlogin = mysqli_fetch_all($check);

                if (empty($verificationlogin))
                {
                    if ($_POST['password'] == $_POST['confmdp'])
                    {
                        $mdpcrypt = password_hash($mdp, PASSWORD_BCRYPT);
                        $requete = 'INSERT INTO utilisateurs VALUES (null, "'.$login.'", "'.$prenom.'", "'.$nom.'", "'.$mdpcrypt.'")';
                        $ajout = mysqli_query($bdd, $requete);
                        header('location:connexion.php');
                    }
                    else
                    {
                        echo 'La confirmation du mot de passe est differente du mot de passe que vous avez rentré.';
                    }
                }
                else
                {
                    echo 'Login pas disponible pour le moment, changez de login';
                }
            }
            mysqli_close($bdd);
        ?>
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