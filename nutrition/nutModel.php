<?php
require_once('./template/tempModel.php');

class nutModel extends tempModel {
    protected $DB_host = "localhost";
    protected $DB_user = "ludmila";
    protected $DB_pass = "dalilahlili";
    protected $DB_name = "projet_tdw";
   
  public function ingInfo(){
    $DB_con = parent::connexion($this->DB_host,$this->DB_name,$this->DB_pass,$this->DB_user);
    $sql = 'SELECT nomIng, any_value(info) AS info, any_value(nbCalorie) AS nbCalorie ,any_value(saisonIng) AS saisonIng,any_value(healthy) AS healthy
            FROM nutrition 
            JOIN ingredient ON ing_id = ingId
            GROUP BY nomIng;';
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