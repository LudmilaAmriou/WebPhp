<?php
require_once('gesNewsView.php');
require_once('gesNewsModel.php');
require_once('./template/tempController.php');

class gesNewsController{

    public function cadreInfo(){
        $m = new gesNewsModel();
        return $m->cadreInfo();  
    }

    public function afficher_newsInfo(){
        $v = new gesNewsView();
        return $v->afficher_newsInfo();
    }


  
    public function afficher_gesNews(){
        $c = new tempController();
        $c->afficher_entete();
        $c->afficher_menu();
        $this->afficher_newsInfo();
        $c->footer();
      
    }
    
}
?>

