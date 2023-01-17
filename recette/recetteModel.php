<?php
require_once('./template/tempModel.php');

class recetteModel extends tempModel {
    protected $DB_host = "localhost";
    protected $DB_user = "ludmila";
    protected $DB_pass = "dalilahlili";
    protected $DB_name = "projet_tdw";
   
  public function recette($id){
    $DB_con = parent::connexion($this->DB_host,$this->DB_name,$this->DB_pass,$this->DB_user);
    $sql = 'SELECT * FROM recette JOIN cadre c ON c.cadreId = recette.recetteId WHERE recetteId =:id';
    $menu = array();
    try {
        $query = $DB_con->prepare($sql);
        $query->bindValue(':id',$id,PDO::PARAM_INT);
    } catch (Exception $e) {
        echo $e->getMessage();
    }
    parent::decon($DB_con);
    $query->execute();
    return $query->fetch();
   }
   
   public function ingredient($id){
    $DB_con = parent::connexion($this->DB_host,$this->DB_name,$this->DB_pass,$this->DB_user);
    $sql = 'SELECT * FROM ingredient JOIN recette c ON c.recetteId = ingredient.recette_id WHERE recetteId =:id';
    $menu = array();
    try {
        $query = $DB_con->prepare($sql);
        $query->bindValue(':id',$id,PDO::PARAM_INT);
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

   public function etape($id){
    $DB_con = parent::connexion($this->DB_host,$this->DB_name,$this->DB_pass,$this->DB_user);
    $sql = 'SELECT * FROM etape JOIN recette c ON c.recetteId = etape.recette_id WHERE recetteId =:id';
    $menu = array();
    try {
        $query = $DB_con->prepare($sql);
        $query->bindValue(':id',$id,PDO::PARAM_INT);
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