<?php
require_once('./news/newsController.php');
$c = new newsController();

if (isset($_POST['action'])){
    $c->insertNews();
}
else{
    $c->afficher_news();
}
?>