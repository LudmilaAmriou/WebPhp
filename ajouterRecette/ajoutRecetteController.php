<?php
require_once('ajoutRecetteView.php');
require_once('ajoutRecetteModel.php');
require_once('./template/tempController.php');

class ajoutRecetteController{

    public function addRecette(){
        $m = new ajoutRecetteModel();
        $titreCadre =$_POST['titreCadre'];
        $descCadre =$_POST['descCadre'];
        $difficulte =$_POST['difficulte'];
       /* if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $image = $_FILES['image']['tmp_name'];
            $image_name = $_FILES['image']['name'];
            move_uploaded_file($image, '/home/Downloads/'.$image_name);
            $imageId = '/home/Downloads'.$image_name;
        }*/

        $typeRec =$_POST['typeRec'];
        $tempsPrep =$_POST['tempsPrep'];
        $tempsCuiss =$_POST['tempsCuiss'];
        $tempsRep =$_POST['tempsRep'];
        $notation =$_POST['notation'];
        $user_id =$_POST['user_id'];

        return $m->addRecette($titreCadre,$descCadre,$difficulte,$typeRec,$tempsPrep,$tempsCuiss,$tempsRep,$notation,$user_id);  
    }

    public function addIng($lastId){
        $m = new ajoutRecetteModel();
        $nomIng =$_POST['nomIng'];
        $pourcentage=$_POST['pourcentage'];
        return $m->addIng($lastId,$nomIng,$pourcentage);  
    }

    public function addEtape($lastId){
        $m = new ajoutRecetteModel();
        $descEtape=$_POST['descEtape'];
        return $m->addEtape($lastId,$descEtape);  
    }

    public function afficher_addRecette(){
        $v = new ajoutRecetteView();
        return $v->afficher_addRecette();
    }  

    public function afficher_addIng(){
        $v = new ajoutRecetteView();
        return $v->afficher_addIng();
    } 
    
    public function afficher_addEtape(){
        $v = new ajoutRecetteView();
        return $v->afficher_addEtape();
    }




    public function afficher_ajoutRecette(){
        $c = new tempController();
        $c->afficher_entete();
        $c->afficher_menu();
        $this->afficher_addRecette();
        $this->afficher_addIng();
        $this->afficher_addEtape();
        $c->footer();
    }  


    
}
?>

