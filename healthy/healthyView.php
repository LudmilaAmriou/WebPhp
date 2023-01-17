<?php
require_once('healthyController.php');

Class healthyView { 

    public function afficher_seuil(){
     ?>
	<link href="/categorie/categorie.css" rel="stylesheet" type="text/css" />
	<link href="/healthy/healthy.css" rel="stylesheet" type="text/css" />
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script  type="text/javascript"  src="/healthy/healthy.js"></script>
    <!-- Custom CSS -->
	<div class="container">
        <div class="row">
            <div class="col-md-3">    
			<div class="list-group">
     			<h3>Seuil calories</h3>
                <div style="height: 80px; overflow-y: auto; overflow-x: hidden;">
                    <div class="list-group-item number">
                        <label><input style="width:200px ;border-radius:5px;  margin-left:-10px;" id = "recette" class="common_selector recette" value ="" step= '100' type="number" name="num" min="1" max="50000"></label>
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

	<?php
    }


	public function afficher_cat(){
		
		?>
	
			<?php
				
				  $cf = new healthyController();
				  $row= $cf->recette();
                 
				  if ($row >0){
				  foreach ($row as $image) {
                    $result = $cf->ing($image['recetteId']);
					  // Display the image using the <img> tag and the data from the database
					  $output .= '
					  <div class="col-sm-4 col-lg-3 col-md-3">
					   <div style="border:1px solid #ccc; border-radius:20px; padding:16px; margin-bottom:16px; height:450px;">
						<p align="center"><strong><a style="text-decoration: none;" href="/Recette.php?href='.$image['recetteId'].'">'. $image['titreCadre'] .'</a></strong></p>
						<img style= "height:200px;width:200px;border-radius:20px"src="data:image/jpeg;base64,'. base64_encode($image['imageId']) .'" alt="cat" class="img-responsive" >
						<p>Healthy: '. $image['methode'] .'</p>
					   </div>
					  </div>
					  ';
                      $i=0;
                      $output2.='<br><div>
                      <h5 style= "color:grey;" ><strong>Details des ingredients Healthy de '.$image['titreCadre'].'</strong></h5><br>';
                      foreach($result as $ing){
                        $i++;
                        $output2.='
                        <div>
                        <p>'.$i.'- '. $ing['nomIng'].':'.$ing['nbCalorie'].' kcal</p>                   
                        </div>
                      
                        ';
                      } 
					 }

                 }
					else
					{
					 $output = '<h3>Pas de donnes</h3>';
					}
					echo $output;
                    echo $output2;
			?>
		</div>
		
	 <?php
	}
    
}
?>




