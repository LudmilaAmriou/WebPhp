<?php
class adminView{

    public function afficher_cadres(){
        ?>
       <link href="/adminAcc/admin.css?" rel="stylesheet" type="text/css" />
       <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
       <div class="container">
           <div class="box">
             <img src= "/adminAcc/img/recette.png"/>
             <a href="/gesRecette.php"  target="_blank">Gestion des recette</a>
           </div>
           <div class="box">
             <img style= "width:300px; margin-left:13%; margin-top:10%" src= "/adminAcc/img/ing.png"/>
             <a style= "margin-top:10.5%; margin-left:23%"  target="_blank" href="/gesIngredient.php ">Gestion des ingredients</a>
           </div>
           
            <div class="box"> 
             <img style= "width:320px; margin-left:7%; margin-top:10%" src= "/adminAcc/img/news.png"/>
             <a style= "margin-top:10%; margin-left:29%"  target="_blank"  href="/gesNews.php">Gestion des News</a>
            </div>
            
           <div class="box">
             <img style= "width:243px; margin-left:19%; margin-top:16%" src= "/adminAcc/img/user.png"/>
             <a style= "margin-top:18.8%; margin-left:23%"  target="_blank"  href="/gesUser.php">Gestion des Utilisateurs</a>
           </div>
       </div>
        <?php
    }    
 }





?>