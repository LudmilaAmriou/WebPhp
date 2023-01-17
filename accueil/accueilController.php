<?php
require_once('accueilView.php');
require_once('accueilModel.php');
require_once('./template/tempController.php');
class accueilController{


    public function diapo(){
        $m = new accueilModel();
        return $m->diapo();  
    }
    public function afficher_diapo(){
        $v = new accueilView();
        return $v->afficher_diapo();  
    }

    public function categorie(){
        $m = new accueilModel();
        return $m->categorie();
    }

    public function recette($type){
        $m = new accueilModel();
        return $m->recette($type);
    }

    public function afficher_categorie(){
        $v = new accueilView();
        return $v->afficher_categorie();
    }

    public function afficher_accueil(){
        $c = new tempController();
        $c->afficher_entete();
        $c->afficher_menu();
        $this->afficher_diapo();
        $this->afficher_categorie();
        $c->footer();
      
    }
}
?>



