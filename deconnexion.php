<?php
session_start();
echo "Vous êtes déconnecté, redirection.....";
session_destroy();
header("refresh:3;url=index.php");
?>