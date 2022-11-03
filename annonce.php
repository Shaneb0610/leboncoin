<?php
    session_start();
    if(!isset($_SESSION["pseudo"]))
    {
        header("location:connexion.php");
    }
    $pseudo=$_SESSION["pseudo"];
    $id = mysqli_connect("127.0.0.1:3307","root","","leboncoin");
    mysqli_query($id,"SET NAMES utf8");
    if(isset($_POST["bouton"]))
    {        
        extract($_POST);
        extract($_FILES);
        var_dump($_POST); 
        var_dump($_FILES);
        $type=$_FILES["photo"]["type"];
        if($_FILES["photo"]["size"]>10000000) 
        {
            echo "Photo trop lourde";
        }
        else if(substr($type, -3) != 'png' && substr($type, -3) != 'jpg' && substr($type, -4) != 'jpeg')
        {
           echo "Ce type de photo n'est pas valide";
        }
        else if($_FILES["photo"]["error"]>0)
        {
            echo "Aucune photo n'a été déplacé";
        }
        else
        {
            $chemin="image/$nom.jpg";
            $resultat= move_uploaded_file($_FILES["photo"]["tmp_name"],$chemin);
            if($resultat)echo "Transfert completé";  
        }
        $nom = $_POST["nom"];
        $chemin="image/$nom.jpg";
        $categorie = $_POST["categorie"];
        $description = $_POST["description"];
        $prix = $_POST["prix"];
        $kilometrage = $_POST["kilometrage"];
        $nom = mysqli_escape_string($id, $nom);
        $chemin = mysqli_escape_string($id, $chemin);
        $categorie = mysqli_escape_string($id, $categorie);
        $description = mysqli_escape_string($id, $description);
        $req="insert into annonce values(null,'$nom','$prix','$description','$categorie','$chemin','$pseudo','$kilometrage')";
        $resultat=mysqli_query($id,$req);
        header("location:index.php");
    }
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
                    <li class="li"><a  class="a" href="categorie.php">Catégorie</a></li>
                    <!-- <li class="li"><a class="a" href="chatbox.php">Contact</a></li> -->
                </ul>
            </nav>
            <a class="cla" href="compte.php"><button class="btn">Account</button></a>
        </div>
<div class="formulaire"> 
            <form action="" method="post" enctype="multipart/form-data">
                Nom
                <br>
                <input type="text" name="nom" placeholder="Nom: " required><br><br>
                Catégorie 
                <br>
                <select name="categorie" required>
                        <option value="Peugeot">Peugeot</option>
                        <option value="Citroen">Citroen</option>
                        <option value="Renault">Renault</option>
                        <option value="Dacia">Dacia</option>
                        <option value="Nissan">Nissan</option>
                        <option value="Toyota">Toyota</option>
                        <option value="Mini">Mini</option>
                        <option value="Fiat">Fiat</option>
                        <option value="Audi">Audi</option>
                        <option value="BMW">BMW</option>
                        <option value="Volkswagen">Volkswagen</option>
                    </select>
                <br><br>
                Photo
                <br>
                <input type="file" name="photo" required> <br><br>
                Description
                <br>
                <input type="text" name="description" placeholder="Description: " required><br><br>
                Prix
                <br>
                <input type="number" name="prix" placeholder="Prix du produit" step="0.01"><br><br>
                Kilometrage
                <br>
                <input type="number" name="kilometrage" placeholder="Kilometrage"><br><br>
                <input type="submit" value="Envoyer" name="bouton">
            </form>
        </div>
</body>
</html>