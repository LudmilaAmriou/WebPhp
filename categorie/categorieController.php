<?php
require_once('categorieView.php');
require_once('categorieModel.php');
require_once('./template/tempController.php');

class categorieController{

    public function recherche(){

        $brand = $_POST['brand'];
        $ram = $_POST['ram'];
        $note=$_POST['note'];
        $cuiss=$_POST['cuiss'];
        $prep=$_POST['prep'];
        $total=$_POST['total'];
        $kcal=$_POST['kcal'];
        $m = new categorieModel();
        return $m->recherche($brand, $ram, $note, $cuiss,$prep,$total,$kcal);  
    }

    public function afficher_recherche(){
        $v = new categorieView();
        return $v->afficher_recherche();
    }

    public function afficher_cat(){
        $v = new categorieView();
        return $v->afficher_cat();
    }

    public function afficher_categ(){
        $c = new tempController();
        $c->afficher_entete();
        $c->afficher_menu();
        $this->afficher_recherche();
        $c->footer();
      
    }
    
}
?>

