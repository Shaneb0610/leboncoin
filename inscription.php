<?php
    session_start();
    if(isset($_POST["bouton"]))
    {     
        $id = mysqli_connect("127.0.0.1:3307","root","","leboncoin");
        mysqli_query($id,"SET NAMES utf8");
        $mail = $_POST["mail"];
        $mdp = $_POST["mdp"];
        if(strlen($mdp)<10)
        {
            $error="Le mot de passe est trop court, il doit faire plus de 10 caractères";
        }
        else
        {
            $mdpcrypt = md5($mdp);
            $validation=0;
            $req = "INSERT INTO utilisateur (mail, mdp)
            VALUES ('$mail','$mdpcrypt')";
            $resultat = mysqli_query($id, $req);
            header("location:connexion.php");
        }

        if($error!="")
        {
            echo $error;
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
            <h2>Inscription</h2><br><br>
            <form action="" method="post">
                <br>
                <div class="inputBox">
                    <input type="text" name="mail" required>
                    <span>Email</span>
                    <i></i>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="password" name="mdp" required>
                    <span>Password</span>
                    <i></i>
                </div>
                <br><br><br>
                <input type="submit" value="Confirmer" name="bouton">





            </form>
        </div>
    </div>
            
</body>
</html>