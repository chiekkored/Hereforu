$(document).ready(
  function() {
    $('#pwValidate').hide();
    // Change password
    pwValidated = true;
    $('#conf_password').keyup(function(){
      if ($(this).val() != $('#password').val()) {
        $('#pwValidate').show();
        pwValidated = false;
      }else{
        $('#pwValidate').hide();
        pwValidated = true;
      }
    })
    $('#btnSubmit').click(function(e){
      e.preventDefault();
      // Validation if input is not empty
      validated = true;

      if (!validateField(".need-validate")) {
        validated = false;
      }

      if (!validated) {
        return false;
      }

      if (!pwValidated) {
        return false;
      }

      $.ajax({
        data : {
          cur_password : $('#cur_password').val(),
          password : $('#password').val()
        },
        dataType : 'json',
        type: 'post',
        url : 'account/change_password',
        success : function(response) {
          if (response.success) {
            $('#auth_alert').show();
            $('#auth_alert').text(response.error_message);
            $('#auth_alert').addClass('alert-success');
            $('.need-validate').val('');
          } else {
            $('#auth_alert').show();
            $('#auth_alert').text(response.error_message);
            $('#auth_alert').addClass('alert-danger');
          }
          
        },
        error : function(jqXHR, textStatus, errorThrown) {
          // Log the status
          console.error(textStatus);
          // Log the error response object
          console.error(jqXHR);
          // Log error thrown
          console.error(errorThrown);
        }
      });
    })
  }
);
