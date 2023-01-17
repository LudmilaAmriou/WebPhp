<?php
require_once('./gestionRecettes/gesRecetteController.php');
$c = new gesRecetteController();
echo $_POST['action2'];
if (isset($_POST['action'] ) || (isset($_POST['action2'])) || (isset($_POST['action3']))){
    $c->afficher_cat(); 
    if  (isset($_POST['action2'])){
        $c->editRecette();
    }
    if  (isset($_POST['action3'])){
        $c->delRecette();
    }
}
else{
    $c->afficher_categ();
}
?>