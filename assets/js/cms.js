$(document).ready(
  function() {

    // Initialize hiding of the validation alert
    $('#pwChangeValidate').hide();
    // Change password
    pwValidated = true;
    $('#conf_admin_password').keyup(function(){
      if ($(this).val() != $('#admin_password').val()) {
        $('#pwChangeValidate').show();
        pwValidated = false;
      }else{
        $('#pwChangeValidate').hide();
        pwValidated = true;
      }
    })

    // -- Event Handlers START
    // Attach an event upon login
    $('#btnChange').click(function(e){
      e.preventDefault();
      
      // Validation if input is not empty
      validated = true;

      if (!validateField("#changepass .need-validate")) {
        validated = false;
      }

      if (!validated) {
        return false;
      }

      if (!pwValidated) {
        return false;
      }


      //Ajax for POST admin change pass
      $.ajax({
        url : 'change_pass',
        dataType : 'json',
        type : 'post',
        data : {
          password : $('#admin_password').val(),
          cur_password : $('#cur_password').val()
        },
        beforeSend: function(){
          $('#changepass').modal('hide')
          Swal.fire({
            titleText: 'Updating Password',
            onBeforeOpen: () => {
              Swal.showLoading()
            }
          })
         },
          success : function(data, textStatus, jqXHR) {
            Swal.close();
            Swal.fire(
              'Success!',
              'Password successfully changed.',
              'success'
            )
        },
        error : function(jqXHR, textStatus, errorThrown) {
          Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Something went wrong!',
          });
          // Log the status
          console.error(textStatus);
          // Log the error response object
          console.error(jqXHR);
          // Log error thrown
          console.error(errorThrown);
        }
      });

    })
    // -- Event Handlers END
  }
);
