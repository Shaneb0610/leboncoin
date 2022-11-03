<?php
    session_start();
    if(!isset($_SESSION["pseudo"]))
    {
        header("location:index.php");
    }
    $pseudo=$_SESSION["pseudo"];
    $id = mysqli_connect("127.0.0.1:3307","root","","leboncoin");
    mysqli_query($id,"SET NAMES utf8");
    $req = "select * from utilisateur where mail='$pseudo'";
?>
    <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Vroum Vroum</title>
            <link rel="stylesheet" href="compte.css">


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
        <div class="info">
            <div class="container">
            <h1>Mes informations</h1>
            <br>
            <?php
                $res = mysqli_query($id,$req);
                while($ligne = mysqli_fetch_assoc($res))
                {
            ?>
                    
                    <?php $mail=$ligne["mail"];?><br>
                    <?php $mdp=$ligne["mdp"];?><br>
                    <?php echo "<span class=\"mail\"> Mail: '$mail'";?><br><br>
                    <?php echo "Mot de passe: '$mdp'";?><br><br>    
            <?php
                }
            ?>
            <br><br>
            
            <a class="message" href="chatbox.php">Mes messages</a>
            <br><br>
            <h2>Mes annonces</h2>
            <br><br>
            <?php
            $req2="select * from annonce where mail='$pseudo'";
            $res2 = mysqli_query($id,$req2);
            while($ligne = mysqli_fetch_assoc($res2))
            {
                echo "<img src='".$ligne["photo"]."'width='100'></a>";
                echo "&nbsp; &nbsp; &nbsp; &nbsp; "
                .$ligne["nom"]."";
                echo "&nbsp; &nbsp; &nbsp; &nbsp; ".$ligne["prix"]."";
                echo "&nbsp; &nbsp; &nbsp; &nbsp; ".$ligne["description"]."";
                echo "<a href='modif.php?ida=".$ligne["ida"]."'><img src='image/modif.png'width='30'></a>";
                echo "<a href='suppr.php?nom=".$ligne["nom"]."'><img src='image/sup.png'width='30'></a>";
                echo "<br>";
            }
            ?>
            <h3>Favoris</h3>


            <?php
            $req="select * from favori where mail='$pseudo'";
            $res=mysqli_query($id,$req);
            while($ligne=mysqli_fetch_assoc($res))
            {
                $annonce=$ligne["annonce"];
                $req2="select * from annonce where nom='$annonce'";
                $res2=mysqli_query($id,$req2);
                while($ligne2=mysqli_fetch_assoc($res2))
                {
                    echo "<img src='".$ligne2["photo"]."'width='100'></a>";
                    echo "&nbsp; &nbsp; &nbsp; &nbsp; ".$ligne2["nom"]."";
                    echo "&nbsp; &nbsp; &nbsp; &nbsp; ".$ligne2["prix"]."";
                    echo "&nbsp; &nbsp; &nbsp; &nbsp; ".$ligne2["description"]."";
                    echo "<br>";
                }
            }
            ?>
            <br><br><br><br>
            <a class="btn" href="deconnexion.php">Deconnexion</a>
        </div>
        </div>
        </body>
        </html>








        