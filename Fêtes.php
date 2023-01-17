<?php
require_once('./fete/feteController.php');
$c = new feteController();


if(isset($_POST["action"])){
$c->afficher_cat(); 
}
else{
    $c->afficher_fete();
}

?>