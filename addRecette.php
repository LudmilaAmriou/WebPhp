<?php

session_start();
require_once('./ajouterRecette/ajoutRecetteController.php');
$c = new ajoutRecetteController();


$c->afficher_ajoutRecette();

if(isset($_POST["submit"])){
        $lastId = $c->addRecette();
        $_SESSION['lastId'] = $lastId;
     
}

if(isset($_POST["submit2"])){
    echo  $_SESSION['lastId'];
    $c->addIng($_SESSION['lastId']);
}

if(isset($_POST["submit3"])){

    $c->addEtape($_SESSION['lastId']);
}


?>