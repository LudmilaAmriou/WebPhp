<?php
require_once('./template/tempModel.php');

class gesUserModel extends tempModel {
    protected $DB_host = "localhost";
    protected $DB_user = "ludmila";
    protected $DB_pass = "dalilahlili";
    protected $DB_name = "projet_tdw";

    public function recherche($valide){
        $DB_con = parent::connexion($this->DB_host,$this->DB_name,$this->DB_pass,$this->DB_user);       
        if(isset($_POST["action"])){
            $sql = "SELECT * FROM utilisateur WHERE mail != 'admin'";
            if(isset($valide))
            {
                $valide_filter = implode("','", $valide);
                $sql .= " AND valide IN('".$valide_filter."')";
            }
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

    public function editUser($userId,$valide){
        $DB_con = parent::connexion($this->DB_host,$this->DB_name,$this->DB_pass,$this->DB_user);
        if(isset($_POST["action2"])){
        $sql = 'UPDATE utilisateur
        SET valide= :valide
        WHERE userId=:userId';
        }
        try {
            $query = $DB_con->prepare($sql);
            $query->bindValue(':userId', $userId, PDO::PARAM_INT);
            $query->bindValue(':valide', $valide, PDO::PARAM_BOOL);

        } catch (Exception $e) {
            echo $e->getMessage();
        }
        $this->decon($DB_con);
        return  $query->execute();
    }

    public function delUser($userId){
        $DB_con = parent::connexion($this->DB_host,$this->DB_name,$this->DB_pass,$this->DB_user);
        if(isset($_POST["action3"])){
        $sql = 'DELETE FROM ustilisateur WHERE userId=:userId';
        }
        try {
            $query = $DB_con->prepare($sql);
            $query->bindValue(':userId', $userId, PDO::PARAM_INT);
    
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        $this->decon($DB_con);
        return  $query->execute();
    }
  
}   

?>