<?php
require_once('./template/tempModel.php');

class healthyModel extends tempModel {
    protected $DB_host = "localhost";
    protected $DB_user = "ludmila";
    protected $DB_pass = "dalilahlili";
    protected $DB_name = "projet_tdw";

    public function recette($seuil){
        $DB_con = parent::connexion($this->DB_host,$this->DB_name,$this->DB_pass,$this->DB_user);    
        if(isset($_POST["action"])){   
            $seuil = intval($seuil);
            $sql = "SELECT DISTINCT recette.*, cadre.*, methode_cuisson.methode, methode_cuisson.healthy, any_value(ingredient.saisonIng) AS saisonIng,subquery.total_calories
            FROM recette JOIN cadre ON recette.recetteId=cadre.cadreId 
            JOIN ( SELECT DISTINCT recette_id, SUM(ingredient.nbCalorie) AS total_calories 
            FROM ingredient 
            GROUP BY recette_id ) subquery ON recette.recetteId = subquery.recette_id 
            JOIN ingredient ON ingredient.recette_id = subquery.recette_id
            JOIN methode_cuisson ON methodeId = ingredient.recette_id
            AND total_calories < $seuil";
        }    
        try {
            $sql .= " GROUP BY cadre.titreCadre,recette.recetteId";
            $query = $DB_con->prepare($sql);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        parent::decon($DB_con);
        $query->execute();
        return $query->fetchAll();
    }

  public function ing($recetteid){
    $DB_con = parent::connexion($this->DB_host,$this->DB_name,$this->DB_pass,$this->DB_user);  
            $sql = "SELECT * FROM ingredient WHERE recette_id = $recetteid AND healthy = 1";
                
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