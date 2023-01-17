<?php
require_once('ideesView.php');
require_once('ideesModel.php');
require_once('./template/tempController.php');

class ideesController{

    public function recherche(){

        $brand = $_POST['brand'];
        $ram = $_POST['ram'];
        $note=$_POST['note'];
        $cuiss=$_POST['cuiss'];
        $prep=$_POST['prep'];
        $total=$_POST['total'];
        $kcal=$_POST['kcal'];
        $m = new ideesModel();
        return $m->recherche($brand, $ram, $note, $cuiss,$prep,$total,$kcal);  
    }
    public function ingred(){
        $m = new ideesModel();
        return $m->ingred();  
    }


  
    public function ingredfin($array){
        $m = new ideesModel();
        $i = 0;
        $p = 0;
        $cr = 0;
        $g = 0;
        $ing=[];
        
       
       if ($array>0){
            $ar = count($array);
            if (isset($_POST['ing'])){
            $ing = $_POST['ing'];
            $len = count($ing);
            }
            $final = [];
            while ($g<$ar){
                $result=$m->ing($array[$g]); 
                if (is_array($result) && $result>0){
                $j = 0;
                $l = 0;
                if ($len>0){
                while ($j<$len){
                    if (in_array($ing[$j],array_column($result, 'nomIng'))){
                       
                        $l=$l+1;
                    }
                   
                    $j++;
                } 
                if ($l/count($result)>0.7){

                    array_push($final, array_column($result, 'recette_id')[0]); 
             

                } 
                
            }  
                $g++;
            }
        } 

    }

        return $final;
}
    public function afficher_recherche(){
        $v = new ideesView();
        return $v->afficher_recherche();
    }

    public function afficher_cat(){
        $v = new ideesView();
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

