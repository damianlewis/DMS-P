$(document).ready(function(){
    $('#supplier').change(function() {
        $.get("/api/dropdown/vehicles", 
            { option: $(this).val() }, 
            function(data) {
                var model = $('#vehicle');
                model.empty();

                $.each(data, function(index, element) {
                    model.append("<option value='"+ element.id +"'>" + element.registration_number + "</option>");
                });
            }
        );
    });
});