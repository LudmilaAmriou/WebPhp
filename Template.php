<?php
require_once('./template/tempController.php');
session_start();
$c = new tempController();
$c->afficher_template();
$user = $c->user_connect();

?>