<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    
</body>
</html>
<?php
    session_start();
    if(isset($_SESSION["pseudo"]))
    {
        $pseudo=$_SESSION["pseudo"];
    }
    $id = mysqli_connect("127.0.0.1:3307","root","","leboncoin");
    mysqli_query($id,"SET NAMES utf8");
    $prix=$_POST["prix"];
    $req2="select * from annonce where prix='$prix'";
    $res2=mysqli_query($id,$req2);
    while($ligne=mysqli_fetch_assoc($res2))
    {    
        echo "<a href='detail.php?nom=".$ligne["nom"]."'><img src='".$ligne["photo"]."'width='200'></a>";
        echo "&nbsp; &nbsp; &nbsp; &nbsp; ".$ligne["nom"]."";
        echo "&nbsp; &nbsp; &nbsp; &nbsp; ".$ligne["prix"]."";
        echo "&nbsp; &nbsp; &nbsp; &nbsp; ".$ligne["description"]."";
        echo "<br>";
    }
?>