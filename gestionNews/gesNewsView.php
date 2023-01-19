<?php
require_once('gesNewsController.php');
require_once('./accueil/accueilController.php');
Class gesNewsView { 

	public function afficher_newsInfo(){
		?>
    <link  rel="stylesheet" type="text/css"  href="/gestionRecettes/gesRecette.css">
    <link  rel="stylesheet" type="text/css"  href="/gestionIng/gestionIng.css">
   
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script  type="text/javascript"  src="/gestionNews/gesNews.js"></script>
    <div class="container">

        <table align = "center" id="dataTable">
            <tr>
                
                <th>Id</th>
                <th>Titre</th>
                <th>Selectionner</th>
            </tr>
            <?php
            $c = new gesNewsController();
            $row = $c->cadreInfo();
           
            foreach ($row as $image) {
                // Display the image using the <img> tag and the data from the database

                 echo '<tr data-id ="'.$image['cadreId'].'">'; 
                 echo '<td>'.$image['cadreId'].'</td>'; 
                 echo '<td>'.$image['titreCadre'].'</td>'; 
                 echo '<td><input type= "checkbox" class="common_selector news"  value ="'.$image['cadreId'].'"></input>';
                 echo '</tr>';
                }
                echo '</table>';      
			?>
		</div>
    
	 
	 <?php
	}    
}
?>




