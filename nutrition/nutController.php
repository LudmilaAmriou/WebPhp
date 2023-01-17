<?php
require_once('nutView.php');
require_once('nutModel.php');
require_once('./template/tempController.php');
class nutController{

    public function ingInfo(){
        $m = new nutModel();
        return $m-> ingInfo();
    }

    public function afficher_ingInfo(){
        $v = new nutView();
        return $v->afficher_ingInfo();
    }

    public function afficher_nutrition(){
        $c = new tempController();
        $c->afficher_entete();
        $c->afficher_menu();
        $this->afficher_ingInfo();
        $c->footer();
      
    }
}
?>



