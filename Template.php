<?php
require_once('./template/tempController.php');

$c = new tempController();
$c->afficher_template();
$c->user_connect();
?>