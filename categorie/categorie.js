
$(document).ready(function(){
    
    function filter_data()
    {
        $('.filter_data').html('<div id="loading" style="" ></div>');
        var action = 'afficher_cat';
        var brand = get_filter('brand');
        const queryString = window.location.search;
        const urlParams = new URLSearchParams(queryString);
        cat= [urlParams.get('cat')];
        if (brand[0]==null && cat != "" ){
            brand = cat;
        }
        var ram = get_filter('ram');
        var note = [document.getElementById("note").value];
        var cuiss = [parseInt(document.getElementById("cuiss").value)];
        var prep = [parseInt(document.getElementById("prep").value)];
        var total = [parseInt(document.getElementById("total").value)];
        var kcal = [parseInt(document.getElementById("kcal").value)];
     
        if (ram.length == 4){
            ram=["toutes"];
        }
        $.ajax({
            url:"Categories.php",
            method:"POST",
            data:{action:action, brand:brand, ram:ram, note:note,cuiss:cuiss,prep:prep,total:total,kcal:kcal},
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
