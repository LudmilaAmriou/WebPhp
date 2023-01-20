
$(document).ready(function(){
    
    function filter_data()
    {
        $('.filter_data').html('<div id="loading" style="" ></div>');
        var action = 'afficher_cat';
        var valide = get_filter('valide');
        $.ajax({
            url:"gesUser.php",
            method:"POST",
            data:{action:action, valide:valide},
            success:function(response){
                $('.filter_data').html(response);
                $(document).on('click', '.editBtn', function() {
                    var userId = $(this).data('id');
                    var row = $(this).parent().parent();
                    row.find('td:nth-child(6)').html('<select style="width:100px" type="select" id="valide_'+userId+'"><option value = "1">Valider</option><option value="0">Laisser</option></select>'); 
                    $(this).parent().html('<button class="saveBtn" data-id="'+userId+'">Enregistrer</button>');
                });

                $(document).on('click', '.supBtn', function() {
                    var userId = $(this).data('id');
                    $(this).parent().html('<button class="confBtn" data-id="'+userId+'">Confirmer?!</button>');
                });
                
                    $(document).on('click', '.saveBtn', function() {
                        var userId = $(this).data('id');     
                        var valide = $('#valide_'+userId).val();
                        var action2 = 'editUser';
                        $.ajax({
                                url: 'gesUser.php',
                                type: 'POST',
                                data: {action2:action2,userId: userId,valide:valide},
                                success: function(response) {
                                    console.log(response);
                                    var row = $('button[data-id="'+userId+'"]').parent().parent();
                                    if (valide==1){
                                    row.find('td:nth-child(6)').text("Oui");
                                    }else{
                                    row.find('td:nth-child(6)').text("Non");
                                    }
                                    $('button[data-id="'+userId+'"]').parent().html('<button class="editBtn" data-id="'+userId+'">Modifier</button>');
                            }
                        });
                    });
                    $(document).on('click', '.confBtn', function() {
                        var userId = $(this).data('id');     
                        var action3 = 'delUser';
                        $.ajax({
                                url: 'gesUser.php',
                                type: 'POST',
                                data: {action3:action3,userId: userId},
                                success: function(response) {
                                    console.log(response);
                            }
                        });
                    });
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

