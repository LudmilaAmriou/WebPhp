<?php
require_once('./user.php');
class tempModel {
   protected $DB_host = "localhost";
   protected $DB_user = "ludmila";
   protected  $DB_pass = "dalilahlili";
   protected $DB_name = "projet_tdw";

   protected function connexion($DB_host,$DB_name,$DB_pass,$DB_user){
    try{
     $DB_con = new PDO("mysql:host={$DB_host};dbname={$DB_name}",$DB_user,$DB_pass);
     $DB_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     
    }
    catch(PDOException $e){
     echo $e->getMessage();
    }
    return $DB_con;
   }

   protected function deconnexion($DB_con){
    unset($_SESSION["user_session"]);
    header("Location:accueil.php");
   }

   protected function decon($DB_con){
    $DB_con = null;
   }

   public function user_connect(){
    $DB_con = $this-> connexion($this->DB_host,$this->DB_name,$this->DB_pass,$this->DB_user);
    $user = new USER($DB_con);
    if($user->is_loggedin()!="")
        {
        $user->redirect('Profil.php');
        }

        if(isset($_POST['btn-login']))
        {
       
        $uname = $_POST['email'];
        $upass = $_POST['psw'];
        
        if($user->login($uname,$upass))
        {
        
        $user->redirect('Profil.php');
        }
        else
        {

            $error = "Nom ou mot de passe incorrect!";
            ?>
            <div class="alert alert-danger">
                <i class="glyphicon glyphicon-warning-sign"></i>&nbsp; <?php echo $error; ?> !
            </div>
            <?php
    
        } 
    }
    return $user;
}

   
   public function menu(){
    $menu = array();
    $DB_con = $this-> connexion($this->DB_host,$this->DB_name,$this->DB_pass,$this->DB_user);
    $sql = "SELECT * FROM menu;";
    try {
        $query = $DB_con->prepare($sql);
    } catch (Exception $e) {
        echo $e->getMessage();
    }
    $this->decon($DB_con);
    $q = $query->execute();
    while ($row = $query->fetch()) {
        $menu[] = $row;
    }
    return $menu;
   }
}   

?>