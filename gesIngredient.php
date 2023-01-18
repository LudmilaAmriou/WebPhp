<?php
require_once('./gestionIng/gesIngController.php');
$c = new gesIngController();
$c->afficher_gesIng();
if(isset($_POST["action"])){
    $c->editIng();
}
?>