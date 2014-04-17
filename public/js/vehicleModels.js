$(document).ready(function(){
    $('#make').change(function() {
        $.get("/api/dropdown", 
            { option: $(this).val() }, 
            function(data) {
                var model = $('#model');
                model.empty();

                $.each(data, function(index, element) {
                    model.append("<option value='"+ element.id +"'>" + element.model + "</option>");
                });
            }
        );
    });
});