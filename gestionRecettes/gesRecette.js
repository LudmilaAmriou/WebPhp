
$(document).ready(function(){
    
    function filter_data()
    {
        $('.filter_data').html('<div id="loading" style="" ></div>');
        var action = 'afficher_cat';
        var brand = get_filter('brand');
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
            url:"gesRecette.php",
            method:"POST",
            data:{action:action, brand:brand, ram:ram, note:note,cuiss:cuiss,prep:prep,total:total,kcal:kcal},
            success:function(data){
                $('.filter_data').html(data);
                $(document).on('click', '.editBtn', function() {
                    var recetteId = $(this).data('id');
                    var row = $(this).parent().parent();
                    var titreCadre = row.find('td:nth-child(2)').text();
                    var descCadre = row.find('td:nth-child(3)').text();
                    var  typeRec = row.find('td:nth-child(4)').text();
                    var  difficulte = row.find('td:nth-child(5)').text();
                    row.find('td:nth-child(2)').html('<input type="text" id="titreCadre_'+recetteId+'" value="'+titreCadre+'">');
                    row.find('td:nth-child(3)').html('<input type="text" id="descCadre_'+recetteId+'" value="'+descCadre+'">');
                    row.find('td:nth-child(4)').html('<input type="text" id="typeRec_'+recetteId+'" value="'+typeRec+'">');
                    row.find('td:nth-child(5)').html('<input type="text" id="difficulte_'+recetteId+'" value="'+difficulte+'">');
                    $(this).parent().html('<button class="saveBtn" data-id="'+recetteId+'">Enregistrer</button>');
                });

                $(document).on('click', '.supBtn', function() {
                    var cadreId = $(this).data('id');
                    $(this).parent().html('<button class="confBtn" data-id="'+cadreId+'">Confirmer?!</button>');
                });
                
                    $(document).on('click', '.saveBtn', function() {
                        var recetteId = $(this).data('id');     
                        var titreCadre = $('#titreCadre_'+recetteId).val();
                        var descCadre = $('#descCadre_'+recetteId).val();
                        var typeRec = $('#typeRec_'+recetteId).val();
                        var difficulte = $('#difficulte_'+recetteId).val();
                        var action2 = 'editRecette';
                        $.ajax({
                                url: 'gesRecette.php',
                                type: 'POST',
                                data: {action2:action2,recetteId: recetteId, titreCadre: titreCadre, descCadre: descCadre, typeRec: typeRec, difficulte: difficulte},
                                success: function(response) {
                                    console.log(response);
                                    var row = $('button[data-id="'+recetteId+'"]').parent().parent();
                                    row.find('td:nth-child(2)').text(titreCadre);
                                    row.find('td:nth-child(3)').text(descCadre);
                                    row.find('td:nth-child(4)').text(typeRec);
                                    row.find('td:nth-child(5)').text(difficulte);
                                    $('button[data-id="'+recetteId+'"]').parent().html('<button class="editBtn" data-id="'+recetteId+'">Modifier</button>');
                            }
                        });
                    });
                    $(document).on('click', '.confBtn', function() {
                        var cadreId = $(this).data('id');     
                        var action3 = 'delRecette';
                        $.ajax({
                                url: 'gesRecette.php',
                                type: 'POST',
                                data: {action3:action3,cadreId: cadreId},
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

