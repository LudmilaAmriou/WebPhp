<?php
require_once('./template/tempModel.php');

class gesRecetteModel extends tempModel {
    protected $DB_host = "localhost";
    protected $DB_user = "ludmila";
    protected $DB_pass = "dalilahlili";
    protected $DB_name = "projet_tdw";

    public function recherche($brand,$ram,$note,$cuiss,$prep,$total,$kcal){
        $DB_con = parent::connexion($this->DB_host,$this->DB_name,$this->DB_pass,$this->DB_user);       
        if(isset($_POST["action"])){
            $sql = "SELECT DISTINCT recette.*, cadre.*, any_value(ingredient.saisonIng) AS saisonIng,subquery.total_calories
            FROM recette JOIN cadre ON recette.recetteId=cadre.cadreId 
            JOIN ( SELECT DISTINCT recette_id, SUM(ingredient.nbCalorie) AS total_calories 
            FROM ingredient 
            GROUP BY recette_id ) subquery ON recette.recetteId = subquery.recette_id 
            JOIN ingredient ON ingredient.recette_id = subquery.recette_id";
            if(isset($brand))
            {
                $brand_filter = implode("','", $brand);
                $sql .= " AND typeRec IN('".$brand_filter."')";
            }
            if(isset($ram))
            {
                $ram_filter = implode("','", $ram);
                $sql .= " AND saisonIng IN ('".$ram_filter."')";
            }
            
            if(isset($note) && ($note[0]!= ""))
            {
                $sql .= " AND notation = '$note[0]'";
            }

            if(isset($cuiss) && $cuiss[0]!= "NaN")
            {
                $c=intval($cuiss[0]);
                $sql .= " AND tempsCuiss BETWEEN 0 AND $c";
            }
            if(isset($prep) && $prep[0]!="NaN")
            {
                $c=intval($cuiss[0]);
                $sql .= " AND tempsPrep BETWEEN 0 AND $c";
            }

            if(isset($total) && $total[0]!="NaN")
            {
                $c=intval($total[0]);
                $sql .= " AND (tempsCuiss+tempsPrep+tempsRep) BETWEEN 0 AND $c";
            }

            if(isset($kcal) && $kcal[0]!="NaN")
            {
                $c=intval($kcal[0]);
                $sql .= " AND total_calories BETWEEN 0 AND $c";
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

    public function editRecette($recetteId,$titreCadre,$descCadre,$typeRec,$difficulte){
        $DB_con = parent::connexion($this->DB_host,$this->DB_name,$this->DB_pass,$this->DB_user);
        if(isset($_POST["action2"])){
        $sql = 'UPDATE recette JOIN cadre on recette.recetteId = cadre.cadreId 
        SET difficulte= :difficulte, typeRec=:typeRec, cadre.titreCadre=:titreCadre,cadre.descCadre =:descCadre 
        WHERE recette.recetteId=:recetteId';
        }
        try {
            $query = $DB_con->prepare($sql);
            $query->bindValue(':recetteId', $recetteId, PDO::PARAM_INT);
            $query->bindValue(':difficulte', $difficulte, PDO::PARAM_STR);
            $query->bindValue(':typeRec', $typeRec, PDO::PARAM_STR);
            $query->bindValue(':titreCadre', $titreCadre, PDO::PARAM_STR);
            $query->bindValue(':descCadre', $descCadre, PDO::PARAM_STR);
    
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        $this->decon($DB_con);
        return  $query->execute();
    }

    public function delRecette($cadreId){
        $DB_con = parent::connexion($this->DB_host,$this->DB_name,$this->DB_pass,$this->DB_user);
        if(isset($_POST["action3"])){
        $sql = 'DELETE FROM cadre WHERE cadreId=:cadreId';
        }
        try {
            $query = $DB_con->prepare($sql);
            $query->bindValue(':cadreId', $cadreId, PDO::PARAM_INT);
    
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        $this->decon($DB_con);
        return  $query->execute();
    }

  
}   

?>