<?php
require_once('ideesController.php');
require_once('./accueil/accueilController.php');
Class ideesView { 

    public function afficher_recherche(){
     ?>
	<link href="/idees/idees.css" rel="stylesheet" type="text/css" />
    <link href="/categorie/categorie.css" rel="stylesheet" type="text/css" />
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script  type="text/javascript"  src="/idees/idees.js?v=1"></script>
	<div class="container">
        <div class="row">
            <div class="col-md-3">    
			<div class="list-group">
     			<h3>Notation</h3>
                <div style="height: 80px; overflow-y: auto; overflow-x: hidden;">
                    <div class="list-group-item number">
                        <label><input style="width:200px ;border-radius:5px;  margin-left:-10px;" id = "note" class="common_selector note" value ="" type="number" name="num" min="1" max="5"></label>
                    </div>
                </div>
                </div>                
                <div class="list-group">
     			<h4>Categorie</h4>
                    <div style="height: 180px; overflow-y: auto; overflow-x: hidden;">
     				<?php
                     $c = new accueilController();
					 $result= $c->categorie();
                    foreach($result as $row)
                    {
                    ?>
                    <div class="list-group-item checkbox">
                        <label><input type="checkbox" class="common_selector brand" value="<?php echo $row['nameadd']; ?>"  > <?php echo $row['nom']; ?></label>
                    </div>
                    <?php
                    }

                    ?>
                    </div>
                </div>
    		<div class="list-group">
     		<h4>Saison</h4>
                    <div class="list-group-item checkbox">
                        <label><input type="checkbox" class="common_selector ram" value="automne" >L'automne </label><br>
						<label><input type="checkbox" class="common_selector ram" value="hiver">L'hiver</label><br>
						<label><input type="checkbox" class="common_selector ram" value="printemps" >Le printemps</label><br>
						<label><input type="checkbox" class="common_selector ram" value="ete" >L'été</label><br>
				</div>
                </div>
			<div class="list-group">
     			<h4>Temps de cuisson</h4>
                <div style="height: 100px; overflow-y: auto; overflow-x: hidden;">
                    <div class="list-group-item range">
					<label>Entre 0 et 500 mins <input style="width:200px ;border-radius:5px;  margin-left:-10px;" step="10" id = "cuiss" class="common_selector cuiss" value ="" type="number" name="num" min="0" max="500"></label>
                    </div>
                </div>
            </div> 
			<div class="list-group">
     			<h4  style="width:500px">Temps de preparation</h4>
                <div style="height: 100px; overflow-y: auto; overflow-x: hidden;">
                    <div class="list-group-item range">
					<label>Entre 0 et 500 mins <input style="width:200px ;border-radius:5px;  margin-left:-10px;" id = "prep" step="10" class="common_selector prep" value ="" type="number" name="num" min="1" max="500"></label>
                    </div>
                </div>
                </div> 
			<div class="list-group">
				<h4>Temps total</h4>
                <div style="height: 100px; overflow-y: auto; overflow-x: hidden;">
                    <div class="list-group-item range">
					<label>Entre 1 et 1000 mins <input style="width:200px ;border-radius:5px;  margin-left:-10px;" id = "total" step="10" class="common_selector total" value ="" type="number" name="num" min="1" max="1000"></label>
                    </div>
                </div>
            </div> 
			<div class="list-group">
			<h4>Nombre de calories</h4>
                <div style="height: 100px; overflow-y: auto; overflow-x: hidden;">
                    <div class="list-group-item range">
					<label>Entre 100 et 10000 kcals <input style="width:200px ;border-radius:5px;  margin-left:-10px;" id = "kcal" class="common_selector kcal" value ="" type="number" name="num" step="100" min="100" max="10000"></label>
                    </div>
                </div>
            </div> 
            </div>
           
            <div class="col-md-9">
             <br />
                <div class="row filter_data">
                </div>
            </div>
        </div>
       
    </div>
   <div class = "contain-closed" id = "show">
   <h4>Ingredients</h4>
    <form method="POST" id = 'formu' action = '' class="list-group">
    <div class="list-group-item checkbox">
    <?php
                     $c = new ideesController();
					 $result= $c->ingred();
                    foreach($result as $row)
                    {
                    ?>
                    <div class="list-group-item checkbox">
                        <label><input type="checkbox"  class="common_selector ing" value="<?php echo $row['nomIng']; ?>"  > <?php echo $row['nomIng']; ?></label>
                    </div>
                    <?php
                    }

                    ?>
	</div>
    <input class="btn btn-outline-danger" id='confirme' type="submit" value="Submit">
    </form>
    </div>
	<?php
    }


	public function afficher_cat(){
		
		?>
	
			<?php
				
				  $cf = new ideesController();
                  $row=$cf->recherche();
                  $rowf= [];
                  $row2=$cf->ingredfin(array_column($row, 'recetteId'));
                  if ($row>0){
                  foreach($row as $r){
                    if (in_array($r['recetteId'],$row2)){
                      array_push($rowf,$r);
                    }
                  }
                }
                if (isset($rowf[0]) || isset($_POST['ing'])){
                    $row = $rowf;    
              }
              
				  if ($row >0){
				  foreach ($row as $image) {
					  // Display the image using the <img> tag and the data from the database
					  $output .= '
					  <div class="col-sm-4 col-lg-3 col-md-3">
					   <div style="border:1px solid #ccc; border-radius:20px; padding:16px; margin-bottom:16px; height:450px;">
						<p align="center"><strong><a style="text-decoration: none;" href="/Recette.php?href='.$image['recetteId'].'">'. $image['titreCadre'] .'</a></strong></p>
						<img style= "height:200px;width:200px;border-radius:20px"src="data:image/jpeg;base64,'. base64_encode($image['imageId']) .'" alt="cat" class="img-responsive" >
						<p>note : '. $image['notation'] .' 
						</br> saison : '. $image['saisonIng'] .'<p>
					   </div>
					  </div>
					  ';
					 }
				  }
					else
					{
					 $output = '<h3>Pas de donnes</h3>';
					}
					echo $output;
			?>
		</div>
		
	 <?php
	}
    
}
?>




