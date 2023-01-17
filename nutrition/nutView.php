<?php
require_once('nutController.php');
Class nutView { 

    public function afficher_ingInfo(){
      ?>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <link href="/nutrition/nutrition.css?" rel="stylesheet" type="text/css" />
        <div class= "container">
        <?php
        $cf = new nutController();  
        $row= $cf->ingInfo();
        foreach( $row as $ing){
        echo '<h3>'.$ing['nomIng'] .'</h3>';
        echo '<div class = "desc">';
        echo '<p style="color:#3a3939;width: 70%">Ici la saison naturelle: '. $ing['saisonIng'].'</p>';
        if ($ing['healthy']){
            echo '<p style="color:#3a3939;width: 70%">Cet ingredient est Healthy!</p>';
        }
        else{
            echo "<p style='color:#3a3939;width: 70%'>Cet ingredient n'est Healthy!</p>";
        }
        echo '<p style="color:#3a3939;width: 70%">Ici les informations nutritionelle: '. $ing['info'].'</p>';
        echo '</div>';
    }
        ?>
     </div>
     <?php

    }
}
?>
















