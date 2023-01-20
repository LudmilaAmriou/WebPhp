<?php
require_once('./adminAcc/adminController.php');
session_start();
$c = new adminController();
if (isset($_SESSION['user_session'])){
    $c->afficher_deconn();
}
$c->afficher_accAd();
?>