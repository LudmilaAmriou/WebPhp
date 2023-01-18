<?php
require_once('gesIngView.php');
require_once('gesIngModel.php');
require_once('./template/tempController.php');
class gesIngController{

    public function editIng(){

        $nomIng = $_POST['nomIng'];
        $nbCalorie = $_POST['nbCalorie'];
        $info = $_POST['info'];
        $saison = $_POST['saison'];
        $healthy = $_POST['healthy'];
        
        $m = new gesIngModel();
        return $m->editIng($nomIng,$nbCalorie,$info,$saison,$healthy);
    }

    public function afficher_infoIng(){
        $v = new gesIngView();
        return $v->afficher_infoIng();
    }



  
    public function afficher_gesIng(){
        $c = new tempController();
        $c->afficher_entete();
        $c->afficher_menu();
        $this->afficher_infoIng();
        $c->footer();
      
    }
    
}
?>

