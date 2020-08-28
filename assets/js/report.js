$(document).ready(
  function() {
    //Post bugs
    $('#btnSubmit').click(function(e){
      e.preventDefault();

      // Validation if input is not empty
      validated = true;

      if (!validateField("textarea")) {
        validated = false;
      }

      if (!validated) {
        return false;
      }

      $.ajax({
        data : {
          content : $('#content').val()
        },
        dataType : 'json',
        type: 'post',
        url : 'report/post',
        success : function(response) {
          $('#reportsuccess').modal('show')
          setTimeout(function() {
            window.close();
          }, 3000);
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
