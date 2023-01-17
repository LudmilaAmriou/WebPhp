<?php
require_once('feteController.php');
require_once('./accueil/accueilController.php');
Class feteView { 

    public function afficher_recherche(){
     ?>
	<link href="/categorie/categorie.css" rel="stylesheet" type="text/css" />
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script  type="text/javascript"  src="/fete/fete.js"></script>
    <!-- Custom CSS -->
	<div class="container">
        <div class="row">
            <div class="col-md-3">                
                <div class="list-group">
     			<h4>fete</h4>
                    <div style="height: 180px; overflow-y: auto; overflow-x: hidden;">
     				<?php
                     $c = new feteController();
					 $result= $c->fete();
                    foreach($result as $row)
                    {
                    ?>
                    <div class="list-group-item checkbox">
                        <label><input type="checkbox" class="common_selector fete" value="<?php echo $row['typeFete']; ?>"  > <?php echo $row['typeFete']; ?></label>
                    </div>
                    <?php
                    }
                    ?>
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

	<?php
    }


	public function afficher_cat(){
		
		?>
	
			<?php
				  $row = [];
				  $cf = new feteController();
				  $row= $cf->filtre();
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




