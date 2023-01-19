<?php
require_once('./template/tempModel.php');

class gesNewsModel extends tempModel {
    protected $DB_host = "localhost";
    protected $DB_user = "ludmila";
    protected $DB_pass = "dalilahlili";
    protected $DB_name = "projet_tdw";

    public function cadreInfo(){
        $DB_con = parent::connexion($this->DB_host,$this->DB_name,$this->DB_pass,$this->DB_user);
        $sql = 'SELECT cadreId,titreCadre FROM cadre';
        
        try {
            $query = $DB_con->prepare($sql);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        $this->decon($DB_con);
        $query->execute();
        return $query->fetchAll();
      
    }
  
}   

?>