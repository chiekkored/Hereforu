$(document).ready(
  function() {
    $('#toggle').click(function(){
      $(this).children().toggleClass('fa-eye fa-eye-slash');
      let input = $('#password');
      input.attr('type', input.attr('type') === 'password' ? 'text' : 'password');
    });
    // Initialize hiding of the auth alert
    $('#auth_alert').hide();

    // -- Event Handlers START
    // Attach an event upon login
    $('#btnLogin').click(
      function(e) {
        // Prevent default action of button
        e.preventDefault();
        
        // Get username input
        var username = $('#username').val();
        // Get password input
        var password = $('#username').val();

        // Check if the username and password fields are filled up
        if(username.length > 0 && password.length > 0) {
          // Invoke AJAX request for attempting to login
          $.ajax({
            data : {
              username : username,
              password : password
            },
            dataType : 'json',
            type: 'post',
            url : 'auth/login',
            beforeSend: function(){
              $('#btnLogin').html('<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span> Loading').attr('disabled', true);
             },
            success : function(data) {
              if(data.success) {
                location.reload();
              } else {
                $('#btnLogin').html('Login').attr('disabled', false);
                $('#redirected_login_alert').hide();
                $('#auth_alert').show();
                $('#auth_alert').text(data.error_message);
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
        } else {
          $('.alert').show();
          $('.alert').text('Username and password should not be empty!');
          $('.alert').addClass('alert-danger');
        }
      }
    );
    // -- Event Handlers END
  }
);
