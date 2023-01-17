<?php
require_once('gesRecetteController.php');
require_once('./accueil/accueilController.php');
Class gesRecetteView { 

    public function afficher_recherche(){
     ?>
	<link href="/categorie/categorie.css" rel="stylesheet" type="text/css" />
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script  type="text/javascript"  src="/gestionRecettes/gesRecette.js"></script>
    <link  rel="stylesheet" type="text/css"  href="/gestionRecettes/gesRecette.css?">
    <!-- Custom CSS -->
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
                        <label><input type="checkbox" class="common_selector ram" value="automne" >L'automne </label>
						<label><input type="checkbox" class="common_selector ram" value="hiver">L'hiver</label>
						<label><input type="checkbox" class="common_selector ram" value="printemps" >Le printemps</label>
						<label><input type="checkbox" class="common_selector ram" value="ete" >L'été</label>
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
	<?php
    }


	public function afficher_cat(){
		
		?>
      
			<?php
				
				  $cf = new gesRecetteController();
                  if (!isset($_POST["action2"]) && !isset($_POST["action3"]))
				  $row= $cf->recherche();
                  
				  if ($row >0){
                  $output.='<table id="dataTable">
                  <tr>
                    <th>recetteId</th>
                    <th>Nom Recette</th>
                    <th>Description</th>
                    <th>Categorie</th>
                    <th>Difficulte</th>
                  </tr>';
				  foreach ($row as $image) {
					  // Display the image using the <img> tag and the data from the database
					  $output .= '<tr data-id = "'.$image['recetteId'].'">
                      <td>'.$image['recetteId'].'</td>
                      <td>'.$image['titreCadre'].'</td>
                      <td>'.$image['descCadre'].'</td>
                      <td>'.$image['typeRec'].'</td>
                      <td>'.$image['difficulte'].'</td>
                      <td><button class="editBtn" data-id="'.$image['recetteId'].'">Modifier</button></td>
                      <td><button class="supBtn" data-id="'.$image['recetteId'].'">Supprimer</button></td>
                     </tr>';
					 }
                  $output.='</table>';  
			    }
                
					else
					{
					 $output = '<h3>Pas de donnes</h3>';
					}
                echo $output;
               
			?>
       
		</div>
        <div class ="create">
        <a href="addRecette.php">Ajouter une recette</a>
        </div>
	 <?php
	}    
}
?>




