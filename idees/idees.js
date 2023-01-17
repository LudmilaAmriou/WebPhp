
$(document).ready(function(){
   var haha;
    function filter_data()
    
    {
        $('.filter_data').html('<div id="loading" style="" ></div>');
        var action = 'afficher_cat';
        var brand = get_filter('brand');
        var ram = get_filter('ram');
        var ing = get_filter('ing');
        var note = [document.getElementById("note").value];
        var cuiss = [parseInt(document.getElementById("cuiss").value)];
        var prep = [parseInt(document.getElementById("prep").value)];
        var total = [parseInt(document.getElementById("total").value)];
        var kcal = [parseInt(document.getElementById("kcal").value)];
       
        if (ram.length == 4){
            ram=["toutes"];
        }
    
         console.log(ing);
        $.ajax({
            url:"Idées.php",
            method:"POST",
            data:{action:action, brand:brand, ram:ram, note:note,cuiss:cuiss,prep:prep,total:total,kcal:kcal,ing:ing},
            success:function(data){
                $('.filter_data').html(data);
            }
        });
    }

    filter_data(); 

    function get_filter(class_name)
    {
        var filter = [];
        $('.'+class_name+':checked').each(function(){
            filter.push($(this).val());
        });
        return filter;
    }

    $('.common_selector').click(function(){
        filter_data();
    });


});
    
