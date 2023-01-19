<?php
require_once('accueilController.php');



Class accueilView { 

    public function afficher_diapo(){
     ?>
        <a href= '/Template.php' class = "connect" >Se connecter</a>
        <link href="/accueil/accueil.css?" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <div class = "slideshow-container"> 
        <?php
            $cf = new accueilController();
            $row= $cf->diapo();
            
            foreach ($row as $image) {
                // Display the image using the <img> tag and the data from the database
                echo '<div class="mySlides fade-in">';
                echo '<img style ="width: 400px; height: 390px; border-radius: 20px;" src="data:image/jpeg;base64,' . base64_encode($image['imageId']) . '" alt="lool" />';
                echo '<p class = "text">'.$image["titreCadre"].'</p>';
                echo '</div>';   
            }
            
        ?>
        
        <div style="text-align:center">
        <span class="dot"></span> 
        <span class="dot"></span> 
        <span class="dot"></span> 
      </div>
      </div>
      <div class="left-side">
      <img class="sm-img" src="/accueil/img/fraise.png" alt="fraise" style=" width:100px ;position: absolute;left:5%">
    
        <h2>Let's cook together...!</h2>
        <p >Découvrez des milliers d'idées recettes et astuces pour ravir vos invités ou simplement pour égayer votre quotidien.</p>
        <br><b><p  id="write"></p></b>
     <a href="#" class ="button">Voir plus >></a>
    </div>
   
      

     <?php
    }

    public function afficher_recette($type,$cf,$id){
      ?>
    <?php
        $row = $cf->recette($type); 
       
        $href = $row[0]['cadreId'];
        echo "<div id=carous$id>";
        echo '<div class = "slide active">';
        if (count($row)){
        echo '<h1>'.$row[0]['titreCadre'] .'</h1>'; 
        echo '<img style ="width: 400px; height: 390px; border-radius: 50px;" src="data:image/jpeg;base64,' . base64_encode($row[0]['imageId']) . '" alt="lool" />';
        echo '<p>'.$row[0]['descCadre'].'...</p>'; 
        echo "<a href='/Recette.php?href=$href'> Lire la suite</a>";
        }
        else{
            echo '<h4 style="margin-top:30%">Pas de recette dans cette categorie pour le moment.. :/</h4>';
        }
        echo '</div>';
        $i = 0;
        foreach ($row as $item){  
        if ($i>0){
        $href = $item['cadreId']; 
        echo '<div class = "slide">';
        echo '<h1>'.$item['titreCadre'] .'</h1>'; 
        echo '<img style ="width: 400px; height: 390px; border-radius: 50px;" src="data:image/jpeg;base64,' . base64_encode($item['imageId']) . '" alt="lool" />';
        echo '<p>'.$item['descCadre'].'...</p>'; 
        echo "<a href='/Recette.php?href=$href'> Lire la suite</a>";
        echo '</div>';
        }
        $i = $i+1;
        }
        echo '</div>';
        echo "<button class = 'previous' id='prev$id'>&#8249;</button>";
        echo "<button class = 'next' id='next$id'>&#8250;</button>";
    ?>
     <script  type="text/javascript"  src="/accueil/accueil.js?v=1"></script>
     <?php
    }
    

    public function afficher_categorie(){
        ?>
        <div class="section" style="top:100%">
        <img src="/accueil/img/saladsection.png" alt="salad" style="width:500px;position: absolute;right:0; bottom:0">
            <img src="/accueil/img/entre.jpg" alt="entree" style= "position: absolute; top:2%;left:1% ;border-radius:20px">
            <?php 
            $cf = new accueilController();
            $row= $cf->categorie();
            $cat='entree';
            echo "<a href='Categories.php?cat=$cat'>". $row[0]['nom'] . " >> </a>"; 
            $this->afficher_recette('entree',$cf,1);
            ?>
        </div>

        <div class="section" style="top:200%">
        <img src="/accueil/img/platesect.png" alt="plat" style="width:250px;position: absolute;right:0%; bottom:0">
            <img src="/accueil/img/plat2.jpg" alt="plat" style= "position: absolute; top:2%;left:1% ;border-radius:20px">
            <?php 
            $cf = new accueilController();
            $row= $cf->categorie();
            echo "<a href='Categories.php?cat=plat'>". $row[1]['nom'] . " >> </a>"; 
            $this->afficher_recette('plat',$cf,2);
            
            ?>
        </div>

        <div class="section" style="top:300%">
        <img src="/accueil/img/des.png" alt="dessert" style="height:200px;position: absolute;right:0%; top:0%">
            <img src="/accueil/img/dessert.jpg" alt="dessert" style= "position: absolute; top:2%;left:1% ;border-radius:20px">
            <?php 
            $cf = new accueilController();
            $row= $cf->categorie();
            echo "<a href= '/Categories.php?cat=dessert'>". $row[2]['nom'] . " >> </a>"; 
           $this->afficher_recette('dessert',$cf,3);
            ?>
        </div>

        <div class="section" style="top:400%">
    
        <img src="/accueil/img/boissonsec.png" alt="boisson" style="height:300px;position: absolute; border-raduis: 20px;right:0%; bottom:-12%">
       
            <img src="/accueil/img/boisson.jpg" alt="entree" style= "position: absolute; top:2%;left:1% ;border-radius:20px">
            <?php 
            $cf = new accueilController();
            $row= $cf->categorie();
            echo "<a href='Categories.php?cat=boisson'>". $row[3]['nom'] . " >> </a>"; 
            $this->afficher_recette('boisson',$cf,4);
            ?>
        </div>
       
        <?php
        }
    
    }
?>
