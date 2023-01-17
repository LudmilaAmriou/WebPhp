<?php
require_once('tempController.php');
Class templateView { 
    public function afficher_entete(){
     ?>
    <!doctype html> 
    <html lang="fr">
      <head>
        <!--Titre de la page-->
       <title>Let's cook together</title>
       <meta charset="utf-8"  name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/> 
       <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
       <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
       <link href="/template/template.css" rel="stylesheet" type="text/css" />
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

     </head>
       <body>
       
       <div class ="try">
        <img src= "/template/img/assiete.png"/>
       </div>
      
        <div id="logo">
                <img src="template/img/logoo.png" alt="logo" />
                <p><b>Let's cook together...</b></p>
        </div>
        <div>
            <ul class="sm-icons">
                <li class="social"><a href="http://www.gmail.com/"><img class="sm-img" src="/template/img/gmail.png" alt="gmail" style= "width:70px;"></a></li>
                <li class="social"><a href="http://www.facebook.com/"><img class="sm-img" src="template/img/facebook.png" alt="facebook" style = "width:53px; "></a></li>
                <li class="social" style=" margin-left: -8px;"><a href="http://www.instagram.com/"><img class="sm-img" src="template/img/insta.png" alt="insta" style= "width:75px"></a></li>
            </ul>   
        </div>
     <?php
    }
    public function afficher_menu(){
        ?>
    <nav>
   
        <?php 
        
        $cf = new tempController();
        $row= $cf->menu();
        foreach($row as $item){
            echo "<a href='/{$item['name']}.php'>{$item['name']}</a>"; 
        }
        ?>
        <div id="indicator"></div>
    </nav>
        <?php
        }
    public function footer(){
        ?> 
        <footer class = "foot">
        <?php 
        
        $cf = new tempController();
        $row= $cf->menu();
        foreach($row as $item){
            echo "<a href='/{$item['name']}.php'>{$item['name']}</a>";
        }
        ?>
        </footer>
        </body>
        </html>
        <?php
        }
    
    }
?>
















