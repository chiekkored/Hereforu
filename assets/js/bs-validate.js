function validateField(field) {
    var $fields = $(field);
    var result = true;

    $.each($fields, function (index, field) {
        var $formGroup = $(field).parents('.form-group');

        if (field.value.trim().length == 0) {
            $formGroup.addClass('was-validated');
            $(field).focus();
            result = false;

            // return false;
        }
        else {
            $formGroup.removeClass('was-validated');
        }


    });

    return result;
}