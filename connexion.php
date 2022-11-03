<?php
 session_start();
 if(isset($_POST["bouton"]))
 {
    $mail = $_POST["mail"];
    $mdp = $_POST["mdp"];
    $mdpcrypt = md5($mdp);
    $id = mysqli_connect("127.0.0.1:3307","root","","leboncoin");
    mysqli_query($id,"SET NAMES utf8");
    $req = "select * from utilisateur where mail='$mail' and mdp='$mdpcrypt'";
    $resultat = mysqli_query($id, $req);
    if(mysqli_num_rows($resultat)>0)
    {
        $_SESSION["pseudo"] = $mail;
        header("location:index.php");
    }
    else
    {
        header("location:erreur.php");
    }
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
 <link rel="stylesheet" href="connexion.css">
</head>
<body>
    <div class="box">
        <div class="form">
            <h2>Connexion</h2>
            <br><br>
            <form action="" method="post">
            <div class="inputBox">
                <input type="text" name="mail"  required>
                <span>Email</span>
                <i></i>
            </div>
            <div class="inputBox">
                <input type="password" name="mdp" required>
                <span>Password</span>
                <i></i>
            </div>
            <div class="links">
                <a href="inscription.php">Inscription</a>
            </div>
            <input type="submit" value="Valider" name="bouton">
            </form>
        </div>
    </div>
</body>
</html>