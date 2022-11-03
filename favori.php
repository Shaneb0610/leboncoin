<?php
    session_start();
    if(!isset($_SESSION["pseudo"]))
    {
        header("location:index.php");
    }
    $pseudo=$_SESSION["pseudo"];
    $annonce=$_GET["annonce"];
    $id = mysqli_connect("127.0.0.1:3307","root","","leboncoin");
    mysqli_query($id,"SET NAMES utf8");
    $req="select * from favori";
    $res=mysqli_query($id,$req);
    while($ligne=mysqli_fetch_assoc($res))
    {
        if($annonce!=$ligne["annonce"])
        {
            $in=FALSE;
        }
        else
        {
            $in=TRUE;
            $req="delete from favori where annonce='$annonce'";
            $res=mysqli_query($id,$req);
            header("location:index.php");
        }
    }
    if($in==FALSE)
    {
        $req2="insert into favori values(null,'$annonce','$pseudo')";
        $res2=mysqli_query($id,$req2);
        header("location:index.php");
    }
?>