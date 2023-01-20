<?php
require_once('gesUserView.php');
require_once('gesUserModel.php');
require_once('./template/tempController.php');

class gesUserController{

    public function recherche(){
        $valide = $_POST['valide'];
        $m = new gesUserModel();
        return $m->recherche($valide);  
    }

    public function editUser(){

        $userId = $_POST['userId'];
        $valide = $_POST['valide'];
        $m = new gesUserModel();

        return $m->editUser($userId, $valide);  
    }

    public function delUser(){
        $userId = $_POST['userId'];
        $m = new gesUserModel();
        return $m->delUser($userId);  
    }
   
    public function afficher_recherche(){
        $v = new gesUserView();
        return $v->afficher_recherche();
    }

    public function afficher_cat(){
        $v = new gesUserView();
        return $v->afficher_cat();
    }

  
    public function afficher_gesUser(){
        $c = new tempController();
        $c->afficher_entete();
        $c->afficher_menu();
        $this->afficher_recherche();
        $c->footer();
      
    }
    
}
?>

