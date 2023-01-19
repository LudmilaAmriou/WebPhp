<?php
require_once('newsController.php');

Class newsView { 

    public function afficher_news(){
     ?>
        <link href="/news/news.css?" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      
        <div class = "cadre"> 
       
        <p style="font-size:1.20em; font-weight:bold; color: #717171;" align=center>Recettes a essayer et news a lire!</p>
        <?php
            $cf = new newsController();
            $row= $cf->news();
            foreach ($row as $recette) {
                echo '<div class="recette">';
                echo '<img style ="width: 300px; height: 300px; border-radius: 20px; margin-left:2%; margin-bottom:10px" src="data:image/jpeg;base64,' . base64_encode($recette['imageId']) . '" alt="lool" />';
                echo "<a href='/Recette.php?href=".$recette['cadreId']."'>".$recette["titreCadre"]."</a>";
                echo '</div>';    
            }  
        ?>
     <?php
    }
}
?>
















