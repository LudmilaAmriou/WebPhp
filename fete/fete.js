
$(document).ready(function(){
    
    function filter_data()
    {
        $('.filter_data').html('<div id="loading" style="" ></div>');
        var action = 'afficher_cat';
        var fete= get_filter('fete');
        $.ajax({
            url:"Fêtes.php",
            method:"POST",
            data:{action:action,fete:fete},
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
