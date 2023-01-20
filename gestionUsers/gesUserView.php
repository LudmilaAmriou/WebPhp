<?php
require_once('gesUserController.php');
require_once('./accueil/accueilController.php');
Class gesUserView { 

    public function afficher_recherche(){
     ?>
	<link href="/categorie/categorie.css" rel="stylesheet" type="text/css" />
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <link  rel="stylesheet" type="text/css"  href="/gestionRecettes/gesRecette.css?">
    <script  type="text/javascript"  src="/gestionUsers/gestionUsers.js?"></script>

    <!-- Custom CSS -->
	<div class="container">
        <div class="row">
            <div class="col-md-3">                    
                <div class="list-group">
     			<h4>Type d'utilisateur</h4>
                    <div style="height: 180px; overflow-y: auto; overflow-x: hidden;">
                    <div class="list-group-item checkbox">
                        <label><input type="checkbox" class="common_selector valide" value="0"  >Non validé</label>
                        <label><input type="checkbox" class="common_selector valide" value="1"  >Validé</label>
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
				
				  $cf = new gesUserController();
                  if (!isset($_POST["action2"]) && !isset($_POST["action3"]))
				  $row = $cf->recherche();
				  if ($row >0){
                  $output.='<table id="dataTable">
                  <tr>
                    <th>userId</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Mail</th>
                    <th>Date de naissance</th>
                    <th>Validité</th>
                  </tr>';
				  foreach ($row as $image) {
					  // Display the image using the <img> tag and the data from the database
					  $output .= '<tr data-id = "'.$image['userId'].'">
                      <td>'.$image['userId'].'</td>
                      <td>'.$image['nom'].'</td>
                      <td>'.$image['prenom'].'</td>
                      <td>'.$image['mail'].'</td>
                      <td>'.$image['date'].'</td>';
                      if ($image['valide']){
                        $output.='<td>Oui</td>';
                      }
                      else{
                        $output.='<td>Non</td>';
                      }
                      $output .= '<td><button class="editBtn" data-id="'.$image['userId'].'">Modifier</button></td>
                      <td><button class="supBtn" data-id="'.$image['userId'].'">Supprimer</button></td>
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
   
	 <?php
	}    
}
?>




