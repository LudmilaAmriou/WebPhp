<?php
require_once('recetteController.php');
Class recetteView { 

    public function afficher_recette(){
      ?>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <link href="/recette/recette.css" rel="stylesheet" type="text/css" />
        <div class= "container">
        <?php
        $href = isset($_GET['href']) ? $_GET['href'] : "";
        $cf = new recetteController();  
        $row= $cf->recette($href);
        echo '<img style ="width: 400px; height: 390px; border-radius: 20px; margin-top:3%; margin-left:2%" src="data:image/jpeg;base64,' . base64_encode($row['imageId']) . '" alt="lool" />'; 
        echo '<div class = "desc">';
        echo '<h1>'.$row['titreCadre'] .'</h1>';
        echo '<br>';
        echo '<p style="color:#3a3939;width: 70%">'. $row['descCadre'].'</p>';
        echo '</div>';
        echo '<div class= "prop">';
        echo '<img src= "/recette/img/note.png"/>';
        echo '<p>Notation '.$row['notation'] .'</p>';
        echo '<img src= "/recette/img/diff.png"/>';
        echo '<p>'.$row['difficulte'] .'</p>';
        echo '<img src= "/recette/img/prep.png"/>';
        echo '<p>Prep '.$row['tempsPrep'] .' min</p>';
        echo '<img src= "/recette/img/cuiss.png"/>';
        echo '<p>Cuisson '.$row['tempsCuiss'] .' min</p>';
        echo '<img src= "/recette/img/total.png"/>';
        echo '<p>Total '.$row['tempsCuiss'] + $row['tempsPrep'].' min</p>';
        echo '</div>';
        ?>
     <?php
    }

    public function afficher_ingredient(){
     ?>
      <div class = "ing" style="position: relative; left:30%; top:30%; background-image: url('/recette/img/chef.jpg');">
        <h1>
        <img src= "/recette/img/ing.png"/>  
        Ingredients
        </h1>
       
        <?php
        $href = isset($_GET['href']) ? $_GET['href'] : "";
        $calorie = 0;
         $cf = new recetteController();  
         $row= $cf->ingredient($href);
         foreach( $row as $ing){
          echo '<p>'. $ing['pourcentage'].' '.$ing['nomIng'].'</p>';
          $calorie = $calorie + $ing['nbCalorie'];
         }
        echo '</div>';
        echo '<div class = "prop" style ="margin-left:-16%;">';
        echo '<img style = "width:12%; margin-top:4%" src= "/recette/img/kcal.png"/><br>';
        echo '<p style = "position:absolute; top:21%; left:12%">'.$calorie .' kcal';
        echo '</div>';
        ?>
  
    <?php
    }

    public function afficher_etape(){
      ?>
       <div class = "ing" style="position: relative; left:-37%">
         <h1>
         <img src= "/recette/img/etape.png"/>  
         Etapes
         </h1>
         <?php
         $href = isset($_GET['href']) ? $_GET['href'] : "";
          $cf = new recetteController();  
          $i=1;
          $row= $cf->etape($href);
          foreach( $row as $etape){
           echo '<p>'. $i.'- '. $etape['descEtape'].'</p>';
           $i=$i+1;
          }
         ?>
       </div>
       </div>
     <?php
     }



    
    }
?>
















