<?php
require_once('./template/tempController.php');
session_start();
$c = new tempController();
$c->afficher_template();

$c->user_connect();
$c->afficher_inscription(); //New

if(isset($_POST["submit"])){
    $c->addUser();
}

?>