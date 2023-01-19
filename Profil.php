<?php

require_once('./template/tempController.php');

$c = new tempController();
$c->afficher_entete();
$c->afficher_menu();
if (isset($_SESSION['user_session'])){
    echo '<div style = "position:absolute; top:15%; left:10%"><h3>Bienvenu,'.$_SESSION['user_session']['nom']. ' ' .$_SESSION['user_session']['prenom']. '<h3>
        <label><a href="Logout.php?logout=true"> Se deconnecter</a></label></div>';
}
$c->footer();
?>
