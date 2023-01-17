<?php
require_once('saisonView.php');
require_once('saisonModel.php');
require_once('./template/tempController.php');

class saisonController{

    public function recSaison(){
        $m = new saisonModel();
        return $m->recSaison();  
    }

    public function afficher_recSaison(){
        $v = new saisonView();
        return $v->afficher_recSaison();
    }

    public function afficher_saison(){
        $c = new tempController();
        $c->afficher_entete();
        $c->afficher_menu();
        $this->afficher_recSaison();
        $c->footer();
      
    }
}
?>



