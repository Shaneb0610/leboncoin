<?php
    session_start();
    if(!isset($_SESSION["pseudo"]))
    {
        header("location:index.php");
    }
    $pseudo=$_SESSION["pseudo"];
    $id = mysqli_connect("127.0.0.1:3307","root","","leboncoin");
    if(isset($_POST["bout"]))
    {
        if(!isset($_POST["message"]) or empty($_POST["message"]))
        {
            $erreur2 = "Vous avez oublié de saisir votre Message!!!";
        }
        else
        {
            $message = $_POST["message"];
            $req = "insert into chatbox values (null,'$message','$pseudo',now())";
            $resultat = mysqli_query($id, $req);
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
    <link rel="stylesheet" href="styleDiv.css">
    <link rel="stylesheet" href="nav.css">
</head>
<body>
<div class="header">
            <a class="logo" href="index.php" id="logo">Vroum Vroum</a>
            <nav>
                <ul class="nav-link">
                    <li class="li"><a class="a" href="index.php">Home</a></li>
                    <li class="li"><a  class="a" href="categorie.php">Catégorie</a></li>
                    <li class="li"><a class="a" href="chatbox.php">Contact</a></li>
                </ul>
            </nav>
            <a class="cla" href="compte.php"><button class="btn">Account</button></a>
        </div>
<div class="container">
    <h1>Messagerie</h1>
    <div class="messages">
               <ul>
               <?php
                
                $req = "select * from chatbox order by date desc";
                $resultat = mysqli_query($id, $req);
                while($ligne = mysqli_fetch_assoc($resultat)){ ?>
                    <li class="message"><span class="date"><?=$ligne["date"]?></span> - 
                                        <span class="pseudo"><?=$ligne["pseudo"]?></span>: 
                                        <span class="mess"><?=$ligne["message"]?></span></li>
                 <?php } ?>  
               </ul>
        </div>
        <div class="formulaire">
            <form action="" method="post">
                <input type="text" name="message" placeholder="Message :">
                <?php 
                if(isset($erreur2)) {echo "<div class='erreur'>$erreur2</div>";}
                ?>
                <input type="submit" value="Envoyer" name="bout"> <br>
            </form>
    </div>
</div>
</body>
</html>