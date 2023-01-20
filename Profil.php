<?php

require_once('./template/tempController.php');
require_once('./adminAcc/adminController.php');

$c = new tempController();
$cd = new adminController();
$c->afficher_entete();
$c->afficher_menu();
if (isset($_SESSION['user_session'])){
   $cd->afficher_deconn();
}
$c->footer();
?>
