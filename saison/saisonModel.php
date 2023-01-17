<?php
require_once('./template/tempModel.php');

class saisonModel extends tempModel {
    protected $DB_host = "localhost";
    protected $DB_user = "ludmila";
    protected $DB_pass = "dalilahlili";
    protected $DB_name = "projet_tdw";

    public function recSaison(){
        $DB_con = parent::connexion($this->DB_host,$this->DB_name,$this->DB_pass,$this->DB_user);

        if (date("m") =="01" or date("m") == '02' or date("m") == '11' or date("m") == '12'){
            
            $sql = 'SELECT * FROM recette JOIN ingredient c ON c.recette_Id = recette.recetteId JOIN cadre j ON j.cadreId = recette.recetteId WHERE saisonIng LIKE "%hiver%"';

        }
        else{
            if (date("m") =="03" or date("m") == '04' or date("m") == '05'){

                $sql = 'SELECT * FROM recette JOIN ingredient c ON c.recette_Id = recette.recetteId JOIN cadre j ON j.cadreId = recette.recetteId WHERE saisonIng LIKE "%printemps%"';

            }
            else{
                if (date("m") =="09" or date("m") == '10' or date("m") == '11'){

                    $sql = 'SELECT * FROM recette JOIN ingredient c ON c.recette_Id = recette.recetteId JOIN cadre j ON j.cadreId = recette.recetteId WHERE saisonIng LIKE "%automne%"';
                    
                    
                }
                else{
                    $sql = 'SELECT * FROM recette JOIN ingredient c ON c.recette_Id = recette.recetteId JOIN cadre j ON j.cadreId = recette.recetteId WHERE saisonIng LIKE "%été%"';

                }
            }
        }
      
        try {
            $query = $DB_con->prepare($sql);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        parent::decon($DB_con);
        $query->execute();
        return $query->fetchAll();
       } 

}   

?>