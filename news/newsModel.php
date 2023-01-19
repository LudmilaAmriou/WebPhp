<?php
require_once('./template/tempModel.php');

class newsModel extends tempModel {
    protected $DB_host = "localhost";
    protected $DB_user = "ludmila";
    protected $DB_pass = "dalilahlili";
    protected $DB_name = "projet_tdw";

    public function insertNews($news){
        $DB_con = parent::connexion($this->DB_host,$this->DB_name,$this->DB_pass,$this->DB_user);
        $news_filter = "(" . implode( "),(", $news ) . ")";
        $sql1 = 'TRUNCATE TABLE news';
        $sql2 =  "INSERT INTO news (newsId) VALUES ".$news_filter.""; 
        try {
            $query1 = $DB_con->prepare($sql1);
            $result = $query1->execute();
            if($result){
                $query2 = $DB_con->prepare($sql2);
                $query2->execute();
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        parent::decon($DB_con);
       
       
       }

    public function news(){
        $DB_con = parent::connexion($this->DB_host,$this->DB_name,$this->DB_pass,$this->DB_user);
        $sql = 'SELECT * FROM cadre JOIN news on news.newsId = cadre.cadreId';
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