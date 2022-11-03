<?php
    session_start();
    if(!isset($_SESSION["pseudo"]))
    {
        header("location:index.php");
    }
    $nom = $_GET["nom"];
    $id = mysqli_connect("127.0.0.1:3307","root","","leboncoin");
    $req="delete from annonce where nom='$nom'";
    $res=mysqli_query($id,$req);
    header("location:compte.php");
?>