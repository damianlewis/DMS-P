$(document).ready(function(){
    $('#supplier').change(function() {
        $.get("/api/dropdown/employees", 
            { option: $(this).val() }, 
            function(data) {
                var model = $('#employee');
                model.empty();

                $.each(data, function(index, element) {
                    model.append("<option value='"+ element.id +"'>" + element.first_name + " " + element.last_name + "</option>");
                });
            }
        );
    });
});