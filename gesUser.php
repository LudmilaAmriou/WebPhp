<?php
require_once('./gestionUsers/gesUserController.php');
$c = new gesUserController();
echo $_POST['action2'];
if (isset($_POST['action'] ) || (isset($_POST['action2'])) || (isset($_POST['action3']))){
    $c->afficher_cat(); 
    if  (isset($_POST['action2'])){
        $c->editUser();
    }
    if  (isset($_POST['action3'])){
        $c->delUser();
    }
}
else{
    $c->afficher_gesUser();
}
?>