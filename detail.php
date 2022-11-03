<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="nav.css">
    <link rel="stylesheet" href="detail.css">
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




<div class="b">
<?php
    session_start();
    if(!isset($_SESSION["pseudo"]))
    {
        header("location:index.php");
    }
    $pseudo=$_SESSION["pseudo"];
    $nom=$_GET["nom"];
    $id = mysqli_connect("127.0.0.1:3307","root","","leboncoin");
    mysqli_query($id,"SET NAMES utf8");
    $req="select * from annonce where nom='$nom'";
    $res = mysqli_query($id,$req);
    while($ligne = mysqli_fetch_assoc($res))

    {
    ?>
        <div class="c">
        <?php echo "<img class='pict' src='".$ligne["photo"]."'width='300''></a><br>";?>
        <?php echo " &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; ".$ligne["nom"]."<br><br>";?>
        <?php echo "&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; ".$ligne["prix"]."<br><br>";?>
        <?php echo " ".$ligne["description"]."<br><br>";?>
        <?php echo " &nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; ".$ligne["categorie"]."<br><br>";?>
        <?php echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; ".$ligne["kilometrage"]."km <br><br>";?>
        <?php echo "&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;<a href='favori.php?annonce=".$ligne["nom"]."'><img src='image/coeur vide.png' width='50'></a>";
        if($ligne["mail"]!=$pseudo)
        {
            echo "<a href='conversation.php?annonce=".$ligne["nom"]."'><img src='image/stylo.png' width='30'></a>";
        }
        echo "<br>";?>
        </div>
        <?php
    }
?>
</div>