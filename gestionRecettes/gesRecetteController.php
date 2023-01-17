<?php
require_once('gesRecetteView.php');
require_once('gesRecetteModel.php');
require_once('./template/tempController.php');

class gesRecetteController{

    public function recherche(){

        $brand = $_POST['brand'];
        $ram = $_POST['ram'];
        $note=$_POST['note'];
        $cuiss=$_POST['cuiss'];
        $prep=$_POST['prep'];
        $total=$_POST['total'];
        $kcal=$_POST['kcal'];
        $m = new gesRecetteModel();
        return $m->recherche($brand, $ram, $note, $cuiss,$prep,$total,$kcal);  
    }

    public function editRecette(){

        $recetteId = $_POST['recetteId'];
        $titreCadre = $_POST['titreCadre'];
        $descCadre = $_POST['descCadre'];
        $typeRec = $_POST['typeRec'];
        $difficulte = $_POST['difficulte'];
        $m = new gesRecetteModel();
        return $m->editRecette($recetteId, $titreCadre, $descCadre, $typeRec,$difficulte);  
    }

    public function delRecette(){
        $cadreId = $_POST['cadreId'];
        $m = new gesRecetteModel();
        return $m->delRecette($cadreId);  
    }
   
    public function afficher_recherche(){
        $v = new gesRecetteView();
        return $v->afficher_recherche();
    }

    public function afficher_cat(){
        $v = new gesRecetteView();
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

