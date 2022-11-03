<?php
    session_start();
    if(!isset($_SESSION["pseudo"]))
    {
        header("location:index.php");
    }
    $id = mysqli_connect("127.0.0.1:3307","root","","leboncoin");
    mysqli_query($id,"SET NAMES utf8");
    $ida=$_GET["ida"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
    <?php
        $req="select * from annonce where ida='$ida'";
        $res=mysqli_query($id,$req);
        while($ligne=mysqli_fetch_assoc($res))
        {
    ?>
                Saisir le nouveau nom
                <br>
                <input type="text" name="nom" placeholder="<?php echo $ligne["nom"];?>" ><br><br>
                Saisir la nouvelle catégorie d'oeuvre
                <br>
                <input type="text" name="categorie" placeholder="<?php echo $ligne["categorie"];?>" ><br><br>
                Saisir la nouvelle photo
                <br>
                <input type="file" name="photo" required> <br><br>
                Saisir la nouvelle description
                <br>
                <input type="text" name="description" placeholder="<?php echo $ligne["description"];?>" ><br><br>
                <br>
                Saisir le nouveau prix
                <input type="number" name="prix" placeholder="<?php echo $ligne["prix"];?>" step="0.01">
                <input type="submit" value="Envoyer" name="bouton">
    <?php
    }
    ?>
    </form>
</body>
<?php
    echo "<a href='compte.php'><img src='image/sup.png'width='30'></a>";
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
        $chemin="image/$nom.jpg";
        $nom=$_POST["nom"];
        $categorie = $_POST["categorie"];
        $description = $_POST["description"];
        $prix = $_POST["prix"];
        $nom = mysqli_escape_string($id, $nom);
        $chemin = mysqli_escape_string($id, $chemin);
        $categorie = mysqli_escape_string($id, $categorie);
        $description = mysqli_escape_string($id, $description);
        $req2="update annonce set nom=$nom,prix=$prix,description=$description,categorie=$categorie,photo=$chemin, where ida='$ida'";
        $res2=mysqli_query($id,$req2);
        header("location:compte.php");
    }
?>