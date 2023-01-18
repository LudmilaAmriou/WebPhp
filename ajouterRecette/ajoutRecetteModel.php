<?php
require_once('./template/tempModel.php');

class ajoutRecetteModel extends tempModel {
    protected $DB_host = "localhost";
    protected $DB_user = "ludmila";
    protected $DB_pass = "dalilahlili";
    protected $DB_name = "projet_tdw";

  public function addRecette($titreCadre,$descCadre,$difficulte,$typeRec,$tempsPrep,$tempsCuiss,$tempsRep,$notation,$user_id){
    $DB_con = $this-> connexion($this->DB_host,$this->DB_name,$this->DB_pass,$this->DB_user);
    if(isset($_POST["submit"])){
    $DB_con->beginTransaction();
    $sql1 =  'INSERT INTO cadre (titreCadre,descCadre) VALUES (:titreCadre, :descCadre)';
    $sql2 = 'INSERT INTO recette (recetteId, difficulte,typeRec,tempsPrep,tempsCuiss,tempsRep,notation,user_id) VALUES ( :recetteId,:difficulte,:typeRec,:tempsPrep,:tempsCuiss,:tempsRep,:notation,:user_id);';
   
   try {
    $query1 = $DB_con->prepare($sql1);
    $query1->bindValue(':titreCadre', $titreCadre, PDO::PARAM_STR);
    $query1->bindValue(':descCadre', $descCadre, PDO::PARAM_STR);
   /* $file_name = $imageId['name'];
    $file_tmp = $imageId['tmp_name'];
    $query1->bindValue(':imageId', $imageId, PDO::PARAM_LOB); */
    $query1->execute();
    $lastId = $DB_con->lastInsertId();
    $query2 = $DB_con->prepare($sql2);
    $query2->bindValue(':recetteId', $lastId, PDO::PARAM_INT);
    $query2->bindValue(':difficulte', $difficulte, PDO::PARAM_STR);
    $query2->bindValue(':tempsPrep', $tempsPrep, PDO::PARAM_INT);
    $query2->bindValue(':tempsRep', $tempsRep, PDO::PARAM_INT);
    $query2->bindValue(':tempsCuiss', $tempsCuiss, PDO::PARAM_INT);
    $query2->bindValue(':typeRec', $typeRec, PDO::PARAM_STR);
    $query2->bindValue(':notation', $notation, PDO::PARAM_INT);
    $query2->bindValue(':user_id', $user_id, PDO::PARAM_INT);
    $query2->execute();
    $DB_con->commit();
    
} catch (Exception $e) {
    $DB_con->rollBack();
    echo $e->getMessage();
}
    $this->decon($DB_con);
    return $lastId;
 }

 
}

public function addIng($lastId,$nomIng,$pourcentage){
    $DB_con = $this-> connexion($this->DB_host,$this->DB_name,$this->DB_pass,$this->DB_user);
    if(isset($_POST["submit2"])){
    $DB_con->beginTransaction();
    $sql = 'INSERT INTO ingredient (nomIng,pourcentage,recette_id) VALUES ( :nomIng,:pourcentage,:recette_id);';
   
   try {
    echo $lastId;
    $query = $DB_con->prepare($sql);
    $query->bindValue(':recette_id', intval($lastId), PDO::PARAM_INT);
    $query->bindValue(':nomIng', $nomIng, PDO::PARAM_STR);
    $query->bindValue(':pourcentage', $pourcentage, PDO::PARAM_STR);
    $query->execute();
    $DB_con->commit();
    
} catch (Exception $e) {
    $DB_con->rollBack();
    echo $e->getMessage();
}
    $this->decon($DB_con);
 }
} 

public function addEtape($lastId,$descEtape){
    $DB_con = $this-> connexion($this->DB_host,$this->DB_name,$this->DB_pass,$this->DB_user);
    if(isset($_POST["submit3"])){
    $DB_con->beginTransaction();
    $sql = 'INSERT INTO etape (descEtape,recette_id) VALUES ( :descEtape, :recette_id);';
   
   try {
    echo $lastId;
    $query = $DB_con->prepare($sql);
    $query->bindValue(':recette_id', intval($lastId), PDO::PARAM_INT);
    $query->bindValue(':descEtape', $descEtape, PDO::PARAM_STR);
    $query->execute();
    $DB_con->commit();
    
} catch (Exception $e) {
    $DB_con->rollBack();
    echo $e->getMessage();
}
    $this->decon($DB_con);
 }

} 




}

?>