<?php
require_once('./categorie/categorieController.php');
$c = new categorieController();


if(isset($_POST["action"])){
$c->afficher_cat(); 
}
else{
    $c->afficher_categ();
}

?>