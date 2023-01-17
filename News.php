<?php
require_once('./news/newsController.php');
$c = new newsController();
$c->afficher_news();
?>