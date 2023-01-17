<?php
require_once('templateView.php');
require_once('tempModel.php');
class tempController{

    public function menu(){
        $m = new tempModel();
        return  $m->menu();
    }

    public function afficher_entete(){
      
        $v = new templateView();
        return $v->afficher_entete();  
    }
    public function afficher_menu(){
        $v = new templateView();
        return $v->afficher_menu();  
    }
    public function footer(){
        $v = new templateView();
       
        return $v->footer();  
    }
    public function afficher_template(){
        $this->afficher_entete();
        $this->afficher_menu();
        $this->footer();
      
    }
}
?>



