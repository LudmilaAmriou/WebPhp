<?php
require_once('gesIngController.php');
require_once('./accueil/accueilController.php');
require_once('./nutrition/nutController.php');

Class gesIngView { 

	public function afficher_infoIng(){
		
		?>
    <link  rel="stylesheet" type="text/css"  href="/gestionRecettes/gesRecette.css?">
    <link  rel="stylesheet" type="text/css"  href="/gestionIng/gestionIng.css">
    <div class="container">
        <table id="dataTable">
            <tr>
                
                <th>Nom de l'ingredient</th>
                <th>Nombre de calories (Kcal)</th>
                <th>Autres informations nutritionnelles</th>
                <th>Saison</th>
                <th>Healthy</th>
                <th>Modification</th>
            </tr>
            <?php
            $c = new nutController();
            $row = $c->ingInfo();
           
            foreach ($row as $image) {
                // Display the image using the <img> tag and the data from the database

                 echo '<tr data-id ="'.$image['nutId'].'">';
                 echo '<td data-id ="'.$image['nutId'].'">'.$image['nomIng'].'</td>'; 
                 echo '<td>'.$image['nbCalorie'].'</td>'; 
                 echo '<td>'.$image['info'].'</td>'; 
                 echo '<td>'.$image['saisonIng'].'</td>'; 
                 if ($image['healthy']){
                    echo "<td> Healthy </td>";
                 }
                 else{
                    echo "<td>Non Healthy</td>";
                 }
                 echo '<td><button class="editBtn" data-id ="'.$image['nutId'].'">Modifier</button></td>';
                 echo '</tr>';
                }
                echo '</table>';      
			?>
		</div>
        <script  type="text/javascript"  src="/gestionIng/gestionIng.js"></script>
	 <?php
	}   
}
?>




