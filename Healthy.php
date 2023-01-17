<?php
require_once('./healthy/healthyController.php');
$c = new healthyController();
if(isset($_POST["action"])){
$c->afficher_cat(); 
}
else{
    $c->afficher_healthy();
}

?>