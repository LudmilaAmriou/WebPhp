<?php
require_once('./template/tempModel.php');

class accueilModel extends tempModel {
    protected $DB_host = "localhost";
    protected $DB_user = "ludmila";
    protected $DB_pass = "dalilahlili";
    protected $DB_name = "projet_tdw";

    public function diapo(){
        
        $DB_con = parent::connexion($this->DB_host,$this->DB_name,$this->DB_pass,$this->DB_user);
        $sql = 'SELECT * FROM cadre';
        try {
            $query = $DB_con->prepare($sql);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        parent::decon($DB_con);
        $query->execute();
        return $query->fetchAll();
       } 

   public function categorie(){
    $DB_con = parent::connexion($this->DB_host,$this->DB_name,$this->DB_pass,$this->DB_user);
    $sql = 'SELECT * FROM categorie';
    $menu = array();
    try {
        $query = $DB_con->prepare($sql);
    } catch (Exception $e) {
        echo $e->getMessage();
    }
    parent::decon($DB_con);
    $query->execute();
    while ($row = $query->fetch()) {
        $menu[] = $row;
    }

    return $menu;
   }
   
  public function recette($type){
    $DB_con = parent::connexion($this->DB_host,$this->DB_name,$this->DB_pass,$this->DB_user);
    $sql = 'SELECT * FROM recette JOIN cadre c ON c.cadreId = recette.recetteId WHERE typeRec =:type';
    $menu = array();
    try {
        $query = $DB_con->prepare($sql);
        $query->bindValue(':type',$type,PDO::PARAM_STR);
    } catch (Exception $e) {
        echo $e->getMessage();
    }
    parent::decon($DB_con);
    $query->execute();
    while ($row = $query->fetch()) {
        $menu[] = $row;
    }

    return $menu;
   }
}   

?>