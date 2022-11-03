<?php
    session_start();
    if(!isset($_SESSION["pseudo"]))
    {
        header("location:index.php");
    }
    $id = mysqli_connect("127.0.0.1:3307","root","","leboncoin");
    $pseudo=$_SESSION["pseudo"];
    $annonce=$_GET["annonce"];
    $req="select annonceur from conversation where annonce='$annonce'";
    $res=mysqli_query($id,$req);
    mysqli_query($id,"SET NAMES utf8");
    while($ligne=mysqli_fetch_assoc($res))
    {
        $annonceur=$ligne["annonceur"];
    }
    echo $annonce;
    if($pseudo==$annonceur)
    {
        mysqli_query($id,"SET NAMES utf8");
        $req = "select * from conversation where annonce='$annonce'";
        $res=mysqli_query($id,$req);
        while($ligne=mysqli_fetch_assoc($res))
        {
            echo "<a href='chatbox.php?pseudo=".$ligne["envoyeur"]."'>".$ligne["envoyeur"]."</a>";
        }
    }
    else
    {
        $req = "select * from conversation where annonce='$annonce' and envoyeur='$pseudo'";
        $res=mysqli_query($id,$req);
        while($ligne=mysqli_fetch_assoc($res))
        {
            echo "<a href='chatbox.php?pseudo=".$ligne["annonceur"]."'>".$ligne["annonceur"]."</a>";
        }
    }
?>