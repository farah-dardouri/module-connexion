<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "livreor";
$wrong = "";
$sql = mysqli_connect($servername, $username, $password, $dbname);
$connecter = "";
$deconnecter = "";
$let_comment = "";
    if (isset($_SESSION['login'])) {
        header("Location: profil.php");
        $connecter = '<a href="profil.php">Mon Profil</a>';
        $let_comment = '<a href="commentaire.php">Laissez un Commentaire</a>';
    } else {
        $deconnecter = '<a href="inscription.php">Inscription</a> <a href="connexion.php">Connexion</a>';
    }
    if (isset($_POST['valider'])) {
        $user = trim($_POST['login']);
        $pass = trim($_POST['password']);
        $query = mysqli_query($sql, "SELECT password FROM utilisateurs WHERE login = '$user'");
        if ((mysqli_num_rows($query) > 0)) {
            $_SESSION['login'] = $user;
            $row = mysqli_fetch_assoc($query);
            header("Location:profil.php");
            ($row);
            if (password_verify($pass, $row['password'])) {
                header("Location:profil.php");
            }
        } else {
            $wrong = "le login ou le mot de passe ou le username n'est pas correct";
        }
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
                        <span id="error"><?php echo $wrong ?></span>
                        <br>
                        <label for="username"></label>
                        <input type="text" name="login" id="login" placeholder="login">
                        <br>
                        <label for="password"></label>
                        <input type="password" name="password" id="password" placeholder="Mot de passe">
                        <br>
                        <input type="submit" name="valider" value="Valider"></a>
                    </form>
                </div>
            </section>
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