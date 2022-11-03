<?php
    session_start();
    if(!isset($_SESSION["pseudo"]))
    {
        header("location:index.php");
    }
    $pseudo=$_SESSION["pseudo"];
    $id = mysqli_connect("127.0.0.1:3307","root","","leboncoin");
    mysqli_query($id,"SET NAMES utf8");
    $req = "select * annonce where mail='$pseudo'";
    $res=mysqli_query($id,$req);
    while($ligne=mysqli_fetch_assoc($res))
    {
        echo "<a href='message_envoyeur.php?annonce=".$ligne["annonce"]."'>".$ligne["annonce"]."</a>";
    }
?>