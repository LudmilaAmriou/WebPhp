<?php
session_start();
class USER
{
    private $db;

    function __construct($DB_con)
    {
      $this->db = $DB_con;
    }
     
    public function login($uname,$upass)
    {
      
       try
       {
          $stmt = $this->db->prepare('SELECT * FROM utilisateur WHERE mail = ? LIMIT 1');
          $stmt->execute(array($uname));
          $userRow=$stmt->fetch(PDO::FETCH_ASSOC);
          if($stmt->rowCount() > 0)
          {
             if($upass == $userRow['password'])
             {
                $_SESSION['user_session'] = $userRow;
                return true;
             }
             else
             {
                return false;
             }
          }
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
 
   public function is_loggedin()
   {
      if(isset($_SESSION['user_session']))
      {
         return true;
      }
   }
 
   public function redirect($url)
   {
       header("Location: $url");
   }
 
   public function logout()
   {
        session_destroy();
        unset($_SESSION['user_session']);
        return true;
   }

   public function user(){
    return  $_SESSION['user_session'];  
   }
}
?>