<?php
require_once('./template/tempModel.php');

class newsModel extends tempModel {
    protected $DB_host = "localhost";
    protected $DB_user = "ludmila";
    protected $DB_pass = "dalilahlili";
    protected $DB_name = "projet_tdw";

    public function rec(){
        $DB_con = parent::connexion($this->DB_host,$this->DB_name,$this->DB_pass,$this->DB_user);
        $sql = 'SELECT * FROM recette JOIN cadre c ON c.cadreId = recette.recetteId';
        try {
            $query = $DB_con->prepare($sql);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        parent::decon($DB_con);
        $query->execute();
        return $query->fetchAll();
       }

    public function news(){
        $DB_con = parent::connexion($this->DB_host,$this->DB_name,$this->DB_pass,$this->DB_user);
        $sql = 'SELECT * FROM news JOIN cadre c ON c.cadreId = news.newsId';
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