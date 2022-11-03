<?php
    session_start();
    if(!isset($_SESSION["pseudo"]))
    {
        header("location:index.php");
    }
    $pseudo=$_SESSION["pseudo"];
    $id = mysqli_connect("127.0.0.1:3307","root","","leboncoin");
    mysqli_query($id,"SET NAMES utf8");
?>
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
                    <li class="li"><a  class="a" href="liste.php">Catégorie</a></li>
                    <li class="li"><a class="a" href="chatbox.php">Contact</a></li>
                </ul>
            </nav>
            <a class="cla" href="compte.php"><button class="btn">Account</button></a>
        </div>
        <a href="categorie.php?categorie=categorie1"><img src='image/Categorie1.png' width='200'>
        <a href="categorie.php?categorie=categorie1">Categorie1</a>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="categorie.php?categorie=categorie2"><img src='image/Categorie2.png' width='200'>
        <a href="categorie.php?categorie=categorie2">Categorie2</a>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="categorie.php?categorie=categorie3"><img src='image/Categorie3.png' width='200'>
        <a href="categorie.php?categorie=categorie3">Categorie3</a>
        <form action="" method="post">
            Filtres:<select name="filtre">
                        <option value="categorie">Catégorie</option>
                        <option value="prix">Prix</option>
                    </select>
            <input type="submit" value="Envoyer" name="bouton">
        </form>
    </body>
    </html>
<?php
    if(isset($_POST["bouton"]))
    {
        $filtre=$_POST["filtre"];
        if($filtre=="prix")
        {
        ?>
            <form action="filtreprix.php" method="post">
                <input type="text" name="prix" placeholder="Saisir le prix:" required>
                <input type="submit" value="Envoyer" name="but">
            </form>
        <?php
            if(isset($_POST["but"]))
            {
                $prix=$_POST["prix"];
                $req="select * from annonce where prix='$prix'";
                $res=mysqli_query($id,$req);
                while($ligne=mysqli_fetch_assoc($res))
                {
                    echo "<a href='detail.php?nom=".$ligne["nom"]."'><img src='".$ligne["photo"]."'width='200'></a>";
                    echo "&nbsp; &nbsp; &nbsp; &nbsp; ".$ligne["nom"]."";
                    echo "&nbsp; &nbsp; &nbsp; &nbsp; ".$ligne["prix"]."";
                    echo "&nbsp; &nbsp; &nbsp; &nbsp; ".$ligne["description"]."";
                    echo "<br>";
                }
            }
        }
        else if($filtre=="categorie")
        {
        ?>
            <form action="filtrecategorie.php" method="post">
                <input type="text" name="categorie" placeholder="Saisir la catégorie:" required>
                <input type="submit" value="Envoyer" name="but">
            </form>
        <?php
        }

    }
?>