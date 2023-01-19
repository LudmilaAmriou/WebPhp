<?php
session_start();
unset($_SESSION["user_session"]);
header("Location:Accueil.php");
?>