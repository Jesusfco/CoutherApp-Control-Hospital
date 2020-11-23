$(document).ready(function() {          
    
    $('#search_pacient').autocomplete({

    source: function(request, response) {
        $.ajax({
        method: 'GET',
        url: window.location.origin + "/app/sugest/pacientes",
        dataType: "json",
        data: {term: request.term },
        success: function(data) {                                                                        
            response(data);
        }

        });                               
    },               
    select: function(event, ui) {                      
        
        var x = {
            id: ui.item.data,
            name: ui.item.value,
        }

        $("#paciente_id").val(x.id)
        $("#search_pacient").val(x.name)

    }

});
})