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

    public function afficher_login(){
        $v = new templateView();
        return $v->afficher_login(); 
    }

    public function user_connect(){
        $m = new tempModel();
        $m->user_connect();
    }

    public function afficher_inscription(){
        $v = new templateView();
       
        return $v->afficher_inscription();  
    }
    
    public function footer(){
        $v = new templateView();
       
        return $v->footer();  
    }
    public function afficher_template(){
        $this->afficher_entete();
        $this->afficher_menu();
        $this->afficher_login();
        $this->footer();
      
    }
}
?>



