$(document).ready(function() { 
    $('#myForm').hide();
    $('#but').click( function () {
        $('#myForm').show();
            });

        });
$(document).ready(function() { 
    $('#cls').click(function () {
        $('#myForm').hide('#myForm');
            });
        });

$(document).ready(function(){
    $('#add-user-form').submit(function(e) {
    e.preventDefault();
    var formData = $(this).serialize();           
    $.ajax({
        type: 'POST',
        url: 'Template.php',
        data: formData,
        success: function(response) {
        console.log(response)
        $("#result").html("<p style = 'font-weight:bolder; color: #740000; '>Inscription avec succes... Attendez la validation de l'Administrateur</p>");
        }
        });
    });
});

          