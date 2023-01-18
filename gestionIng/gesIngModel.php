<?php
require_once('./template/tempModel.php');


class gesIngModel extends tempModel {
    protected $DB_host = "localhost";
    protected $DB_user = "ludmila";
    protected $DB_pass = "dalilahlili";
    protected $DB_name = "projet_tdw";

    public function editIng($nomIng,$nbCalorie,$info,$saison,$healthy){
        $DB_con = parent::connexion($this->DB_host,$this->DB_name,$this->DB_pass,$this->DB_user);
        if(isset($_POST["action"])){
        $sql = 'UPDATE ingredient JOIN nutrition on ingredient.ingId = nutrition.ing_id 
        SET ingredient.nbCalorie= :nbCalorie, nutrition.info=:info, ingredient.saisonIng=:saisonIng,ingredient.healthy =:healthy
        WHERE ingredient.nomIng = :nomIng';
        }
        try {
            $query = $DB_con->prepare($sql);
            $query->bindValue(':nbCalorie', $nbCalorie, PDO::PARAM_INT);
            $query->bindValue(':info', $info, PDO::PARAM_STR);
            $query->bindValue(':saisonIng', $saison, PDO::PARAM_STR);
            $query->bindValue(':healthy', $healthy, PDO::PARAM_BOOL);
            $query->bindValue(':nomIng', $nomIng, PDO::PARAM_STR);
    
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        $this->decon($DB_con);
        return  $query->execute();
    }
  
}   

?>