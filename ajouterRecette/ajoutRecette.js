$(document).ready(function(){
   
    $('#add-recipe-form').submit(function(e) {
        e.preventDefault();
        var formData = $(this).serialize();
       
       
        $.ajax({
          type: 'POST',
          url: 'addRecette.php',
          data: formData,
          success: function(response) {
            console.log(response)
            alert('Recette ajoutee!')
    
          }
        });
      });
  
        $('#add-ingredient-button').click(function(){
            var newIngredientField = '<label for="nomIng">Nom ingredient:</label>' +
                                     '<input type="text"  name="nomIng"></input>' +
                                     '<label for ="pourcentage"> Quantite </label> ' +
                                     '<input type = "text" name = "pourcentage"></input>';
            $('#add-ing-form').append(newIngredientField);
           
        });

        $('#add-ing-form').submit(function(e) {
          e.preventDefault();
          var formData = $(this).serialize();
          $.ajax({
            type: 'POST',
            url: 'addRecette.php',
            data: formData,
            success: function(response) {
             console.log(response);
      
            }
          });
        });



        $('#add-etape-button').click(function(){
          var newIngredientField = '<label for="descEtape">Description:</label>' +
                                   '<input type="text"  name="descEtape"></input>';
          $('#add-etape-form').append(newIngredientField);
         
      });

      $('#add-etape-form').submit(function(e) {
        e.preventDefault();
        var formData = $(this).serialize();
        $.ajax({
          type: 'POST',
          url: 'addRecette.php',
          data: formData,
          success: function(response) {
           console.log(response);
    
          }
        });
      });

    });
    