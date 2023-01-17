<?php
require_once('saisonController.php');

Class saisonView { 

        public function afficher_recSaison(){
         ?>
            <link href="/saison/saison.css?" rel="stylesheet" type="text/css" />
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
          
            <div class = "cadre"> 
            <p style="font-size:1.20em; font-weight:bold; color: #717171;" align=center>C'est l'hiver, il est temps de penser aux ...</p>
            <?php
                $cf = new saisonController();
                $row= $cf->recSaison();
                foreach ($row as $recette) {
                    echo '<div class="recette">';
                    echo '<img style ="width: 300px; height: 300px; border-radius: 20px; margin-left:2%; margin-bottom:10px" src="data:image/jpeg;base64,' . base64_encode($recette['imageId']) . '" alt="lool" />';
                    echo "<a href='/Recette.php?href=".$recette['cadreId']."'>".$recette["titreCadre"]."</a>";
                    echo '</div>';    
                }
                
            ?>
             
            </div>
         <?php
        }
        
    }
    ?>