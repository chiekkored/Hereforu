$.get('https://www.cloudflare.com/cdn-cgi/trace', function(data) {
  d = data.split('\n');
  ipa = d[2].substr(3);
  if (ipa) {
    localStorage.setItem("ip", ipa)
  }
})
if (!localStorage.getItem("ip")) {
  window.location.replace('ban');
}
ipa = localStorage.getItem("ip")
$.ajax({
data : {
  ipa : ipa
},
dataType : 'json',
type: 'post',
url : 'auth/check',
success : function(data) {
  if (data != 'success') {
    localStorage.setItem("b", true)
    window.location.replace('ban')
  }else{
    localStorage.removeItem("b")
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
$(document).ready(
  function() {
    if (localStorage.getItem("b")) {
      window.location.replace('ban')
    }
    // $('#btnLoginAsGuest').click(
    //   function(e) {
    //     // Prevent default action of button
    //     e.preventDefault();

    //     Swal.fire({
    //     title: 'Coming soon!',
    //     width: 600,
    //     padding: '3em',
    //     backdrop: `
    //       rgba(0,0,123,0.4)
    //       url("resources/images/nyan-cat.gif")
    //       left top
    //       no-repeat
    //     `
    //   })
    // });

    // Event Handlers START
    // Login
    $('#btnLogin').click(
      function(e) {
        // Prevent default action of button
        e.preventDefault();

        // Validation if input is not empty
        validated = true;

        if (!validateField("#login input")) {
          validated = false;
        }

        if (!validated) {
          return false;
        }
        // Validation end
        
        // Get username input
        var username = $('#username').val();
        // Get password input
        var password = $('#password').val();

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
            $('#btnLogin').html('<div class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></div> Logging In').attr('disabled', true);
           },
          success : function(data) {
            if (data.success == 1) {
              location.reload();
            } else {
              window.location.replace('login?err='+data.success);
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
      }
    );

    // Username check if exist
    user_valid = false;
    $('#reg_username').keyup(
      function(e){
        if ($(this).val().length > 4) {
          this.value = this.value.replace(/\s/g,'');
          // Invoke AJAX request for attempting to login
        $.ajax({
          data : {
            username : $(this).val()
          },
          dataType : 'json',
          type: 'post',
          url : 'auth/check_user',
          beforeSend: function(){
            $('#check_username').html('<div class="spinner-border spinner-border-sm" role="status"><small class="sr-only">Checking...</small></div>');
           },
          success : function(data) {
            if (data.isTaken) {
              $('#check_username').html('');
              $('#reg_username').removeClass('is-valid');
              $('#reg_username').addClass('is-invalid'); 
              user_valid = false;
            } else {
              $('#check_username').html('');
              $('#reg_username').removeClass('is-invalid');
              $('#reg_username').addClass('is-valid');
              user_valid = true;
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
        }else{
          $('#reg_username').removeClass('is-valid');
          $('#reg_username').removeClass('is-invalid');
          $('#check_username').html('');
          user_valid = false;
        }
    });

    // Register
    $('#btnRegister').click(
      function(e) {
        // Prevent default action of button
        e.preventDefault();

        // Validation if input is not empty
        validated = true;

        if (!validateField("#register input")) {
          validated = false;
        }

        if (!validated) {
          return false;
        }

        if (!user_valid) {
          $('#reg_username').addClass('is-invalid'); 
          return false;
        }
        // Validation end

        // Invoke AJAX request for register
        $.ajax({
          data : {
            username : $('#reg_username').val(),
            password : $('#reg_password').val(),
            ipa : localStorage.getItem("ip")
          },
          dataType : 'json',
          type: 'post',
          url : 'auth/register',
          beforeSend: function(){
            $('#btnRegister').html('<div class="spinner-border spinner-border-sm" role="status"><span class="sr-only">Loading...</span></div>').attr('disabled', true);
           },
          success : function(data) {
            location.reload();
            // console.log(data);
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
      }
    );
    // Login guest
    $('#btnGuest').click(
      function(e) {
        
        // Invoke AJAX request for register
        $.ajax({
          data : {
            ipa : ipa
          },
          dataType : 'json',
          type: 'post',
          url : 'loginguest',
          success : function(data) {
            location.reload();
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
      }
    );
    // Event Handlers END
  }
);
