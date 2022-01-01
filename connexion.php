<?php
    session_start();
    if(isset($_POST["deco"]))
    {
        session_destroy();
        header('Location:index.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="connexion.css">
        <title> module de conexion</title>
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
            <section class="for">
                <div>
                    <form action="" method="post">
                        <h1>Connexion</h1>
                            <input type="text" name="login" id="login" required placeholder="login">
                        <br>
                            <input type="password" name="password" id="password" required placeholder="mot de passe">
                         <br>
                            <button type="submit" name="connexion" id="connexion">Connexion</button>
                    </form>
                </div>
            </section>
            <?php
            if (isset($_POST['connexion']))
            {
                $login = $_POST['login'];
                $mdp = $_POST['password'];

                $bddco = mysqli_connect("localhost", "root", "", "moduleconnexion"); //connexion a la bdd via connexion
                $mdpdulog = "SELECT * FROM utilisateurs WHERE login = '$login'";
                $recupmdp = mysqli_query($bddco , $mdpdulog);
                $resultat_mdp = mysqli_fetch_all($recupmdp, MYSQLI_ASSOC);

                $var = $resultat_mdp[0]['password'];
                
                if (!empty($resultat_mdp))
                {
                    if (password_verify($mdp, $var))
                    {
                        session_start();
                        $_SESSION['login'] = $resultat_mdp[0]['login'];
                        $_SESSION['password'] = $resultat_mdp[0]['password'];
                        $_SESSION['id'] = $resultat_mdp[0]['id'];
                        header('location:profil.php');
                    }
                    else
                    {
        ?>
                        <span>Le mot de passe ne corespond pas au login rentré</span>
        <?php
                    }
                }
                else
                {
        ?>
                    <span>Login innexistant</span>
        <?php
                }
                mysqli_close($bddco);
            }
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