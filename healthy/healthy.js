
$(document).ready(function(){
    
    function filter_data()
    {
        $('.filter_data').html('<div id="loading" style="" ></div>');
        var action = 'afficher_cat';
        var recette= document.getElementById("recette").value;
        console.log(recette);
        $.ajax({
            url:"Healthy.php",
            method:"POST",
            data:{action:action, recette:recette},
            success:function(data){
                $('.filter_data').html(data);
            }
        });
    }
    filter_data(); 

    $('.common_selector').click(function(){
        filter_data();
    });
});
