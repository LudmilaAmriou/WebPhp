<?php
require_once('./idees/ideesController.php');
$c = new ideesController();


if(isset($_POST["action"])){
$c->afficher_cat(); 
}
else{
    $c->afficher_categ();
}

?>