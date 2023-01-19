  <?php
 

 require_once('./accueil/accueilController.php');
  
  class ajoutRecetteView{
  
  public function afficher_addRecette(){
        ?>  
   

    <link  rel="stylesheet" type="text/css"  href="/ajouterRecette/ajoutRecette.css?">
        <div class = "information">
        <form id="add-recipe-form" method = "POST" action=""  enctype="multipart/form-data">
         <label for="titreCadre">Nom recette:</label>
         <input type="text" id="titreCadre" name="titreCadre" />
         
         <label for="descCadre">Description de la recette:</label>
         <input type="text" id="desCadre" name="descCadre" />
         
         <label for="image">Photo de la recette:</label>
         <input type="file" name="image" id="imageid" />
        
         <label for="difficulte">Difficulte:</label>
        <input type="text" id="difficulte" name="difficulte" />
        
        <label for="typeRec">categorie:</label>
        <select id = "typeRec" name = "typeRec" type="select">
            <label>Categorie</label>
            <?php
                     $c = new accueilController();
					          $result= $c->categorie();
                    foreach($result as $row)
                    {
                    ?>
                    <option value="<?php echo $row['nameadd']; ?>" ><?php echo $row['nom']; ?></option>
                    <?php
                    }
                    ?>
        </select>

        <label for="tempsPrep">Temps de preparation:</label>
        <input id = "tempsPrep" name = "tempsPrep" type="number" />

        <label for="tempsCuiss">Temps de cuisson:</label>
        <input id = "tempsCuiss" name = "tempsCuiss" type="number" />

        <label for="tempsRep">Temps de repos:</label>
        <input id = "tempsRep" name = "tempsRep" type="number" />


        <label for="notatoin">Notation:</label>
        <input id = "notation" name = "notation" type="number" />
        
        <label for="userid">Utilisateur:</label>
        <input id = "user_id" name = "user_id" type="number" />



        <input type="hidden" name="submit" value="submit" />
        <input type="submit" value="Ajouter recette" />
       </form>
     
  
        <?php
        
    }

    public function afficher_addIng(){
      ?>

    <form id="add-ing-form" action="" method = "POST">
      <input id="add-ingredient-button" value = "Creer ingredient" type="button"></button>
     
      <input type="hidden" name="submit2" value="submit2" />
      <input type="submit"  value="Ajouter ingredient"></input>
    </form>
    
   <?php
    }

    public function afficher_addEtape(){
      ?>

    <form id="add-etape-form" action="" method = "POST">
      <input id="add-etape-button" value = "Creer etape" type="button"></button>
     
      <input type="hidden" name="submit3" value="submit3" />
      <input type="submit"  value="Ajouter etape"></input>
    </form>
    </div>

    <script  type="text/javascript"  src="/ajouterRecette/ajoutRecette.js"></script>
   <?php
    }


  }
?>
