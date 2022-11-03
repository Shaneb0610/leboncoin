<?php
    session_start();
    if(!isset($_SESSION["pseudo"]))
    {
    ?>  
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
            <link rel="stylesheet" href="nav.css">
            <link rel="stylesheet" href="annonce.css">
        </head>
        <body>
        <div class="header">
            <a class="logo" href="index.php" id="logo">Vroum Vroum</a>
            <nav>
                <ul class="nav-link">
                    <li class="li"><a class="a" href="connexion.php">Home</a></li>
                    <li class="li"><a  class="a" href="categorie.php">Catégorie</a></li>
                </ul>
            </nav>
            <a class="cla" href="connexion.php"><button class="btn">Login</button></a>
        </div>
        <img src="image/vroummm.jpg">
        <div class="annonce">
            <a class="po" href="connexion.php">Annonce</a>
        </div>
        </body>
        </html>
    <?php
    }
    else
    {
    ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
            <link rel="stylesheet" href="nav.css">
            <link rel="stylesheet" href="annonce.css">
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
        <img src="image/vroummm.jpg">
        <div class="annonce">
            <a class="po" href="annonce.php">Annonce</a>
        </div>
        </body>
        </html>
    <?php
    }
    ?>
