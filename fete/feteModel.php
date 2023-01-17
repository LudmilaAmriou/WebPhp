<?php
require_once('./template/tempModel.php');

class feteModel extends tempModel {
    protected $DB_host = "localhost";
    protected $DB_user = "ludmila";
    protected $DB_pass = "dalilahlili";
    protected $DB_name = "projet_tdw";

    public function filtre($fete){
        $DB_con = parent::connexion($this->DB_host,$this->DB_name,$this->DB_pass,$this->DB_user);       
        if(isset($_POST["action"])){
            $sql = "SELECT DISTINCT recette.*, cadre.*
            FROM recette JOIN cadre ON recette.recetteId=cadre.cadreId 
            JOIN fete ON fete.recette_id = recette.recetteId";
            
            if(isset($fete))
            {
                $brand_filter = implode("','", $fete);
                $sql .= " AND typeFete IN('".$brand_filter."')";
            }
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

    public function fete(){
        $DB_con = parent::connexion($this->DB_host,$this->DB_name,$this->DB_pass,$this->DB_user);       
        
            $sql = "SELECT DISTINCT typeFete FROM fete GROUP BY typeFete";
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