
$(document).ready(function(){
    
    function filter_data()
    {   
        var news= get_filter('news');
        var action = 'insertNews';
        $.ajax({
            url:"News.php",
            method:"POST",
            data:{action:action,news:news},
            success:function(response){
             console.log(response)
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
