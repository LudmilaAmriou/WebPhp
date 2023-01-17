<?php
require_once('healthyView.php');
require_once('healthyModel.php');
require_once('./template/tempController.php');
class healthyController{

    public function recette(){
        $seuil = $_POST['recette'];
        $m = new healthyModel();
        return $m->recette($seuil);
    }

    public function ing($id){
        $m = new healthyModel();
        return $m->ing($id);
    }

    public function afficher_seuil(){
        $v = new healthyView();
        return $v->afficher_seuil();
    }

    public function afficher_cat(){
        $v = new healthyView();
        return $v->afficher_cat();
    }

    public function afficher_ingredient(){
        $v = new healthyView();
        //return $v->afficher_ingredient();
    }

    public function afficher_healthy(){
        $c = new tempController();
        $c->afficher_entete();
        $c->afficher_menu();
        $this->afficher_seuil();
      //  $this->afficher_ingredient();
        $c->footer();
      
    }
}
?>



