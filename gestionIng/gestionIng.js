
$(document).ready(function(){

    $(document).on('click', '.editBtn', function() {
        var nutId = $(this).data('id');
        var row = $(this).parent().parent();
        //var nomIng = row.find('td:nth-child(2)').text();
        var nbCalorie = row.find('td:nth-child(2)').text();
        console.log(row);
        var  info = row.find('td:nth-child(3)').text();
        var  saison = row.find('td:nth-child(4)').text();
        row.find('td:nth-child(2)').html('<input style="width:100px" type="number" id="nbCalorie_'+nutId+'" value="'+nbCalorie+'">');
        row.find('td:nth-child(3)').html('<input style="width:100px" type="text" id="info_'+nutId+'" value="'+info+'">');
        row.find('td:nth-child(4)').html('<input style="width:100px" type="text" id="saison_'+nutId+'" value="'+saison+'">');
        row.find('td:nth-child(5)').html('<select style="width:100px" type="select" id="healthy_'+nutId+'"><option value = "1">Healthy</option><option value="0">Non Healthy</option></select>');
        $(this).parent().html('<button class="saveBtn" data-id="'+nutId+'">Enregistrer</button>');
    });
    
    $(document).on('click', '.saveBtn', function() {
            var nutId = $(this).data('id');     
            var nomIng = $('td[data-id="'+nutId+'"]').text();
            var nbCalorie = $('#nbCalorie_'+nutId).val();
            var info = $('#info_'+nutId).val();
            var saison = $('#saison_'+nutId).val();
            var healthy= $('#healthy_'+nutId).val();
            var action = 'editIng';
            $.ajax({
                    url: 'gesIngredient.php',
                    type: 'POST',
                    data: {action:action, nomIng:nomIng,nbCalorie: nbCalorie, info: info, saison: saison, healthy: healthy},
                    success: function(response) {
                        var row = $('button[data-id="'+nutId+'"]').parent().parent();
                        row.find('td:nth-child(2)').text(nbCalorie);
                        row.find('td:nth-child(3)').text(info);
                        row.find('td:nth-child(4)').text(saison);
                        row.find('td:nth-child(5)').text(healthy);
                        $('button[data-id="'+nutId+'"]').parent().html('<button class="editBtn" data-id="'+nutId+'">Modifier</button>');
                }
            });
        });
});

