<?php
require_once('adminView.php');
//require_once('accueilModel.php');
require_once('./template/tempController.php');
class adminController{


    public function afficher_cadres(){
        $v = new adminView();
        return $v->afficher_cadres();  
    }


    public function afficher_accAd(){
        $c = new tempController();
        $c->afficher_entete();
        $c->afficher_menu();
        $this->afficher_cadres();
        $c->footer();
      
    }
}

?>