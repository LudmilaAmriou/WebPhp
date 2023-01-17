<?php
require_once('recetteView.php');
require_once('recetteModel.php');
require_once('./template/tempController.php');
class recetteController{

    public function recette($id){
        $m = new recetteModel();
        return $m->recette($id);
    }

    public function ingredient($id){
        $m = new recetteModel();
        return $m->ingredient($id);
    }

    public function etape($id){
        $m = new recetteModel();
        return $m->etape($id);
    }

    public function afficher_recette(){
        $v = new recetteView();
        return $v->afficher_recette();
    }

    public function afficher_ingredient(){
        $v = new recetteView();
        return $v->afficher_ingredient();
    }

    public function afficher_etape(){
        $v = new recetteView();
        return $v->afficher_etape();
    }

    public function afficher_recettefin(){
        $c = new tempController();
        $c->afficher_entete();
        $c->afficher_menu();
        $this->afficher_recette();
        $this->afficher_ingredient();
        $this->afficher_etape();
        $c->footer();
      
    }
}
?>



