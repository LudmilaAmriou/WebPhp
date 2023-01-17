<?php
require_once('feteView.php');
require_once('feteModel.php');
require_once('./template/tempController.php');

class feteController{

    public function filtre(){

        $fete = $_POST['fete'];
        $m = new feteModel();
        return $m->filtre($fete);  
    }

    public function fete(){
        $m = new feteModel();
        return $m->fete();  
    }


    public function afficher_filtre(){
        $v = new feteView();
        return $v->afficher_recherche();
    }

    public function afficher_cat(){
        $v = new feteView();
        return $v->afficher_cat();
    }

    public function afficher_fete(){
        $c = new tempController();
        $c->afficher_entete();
        $c->afficher_menu();
        $this->afficher_filtre();
        $c->footer();
      
    }
    
}
?>

