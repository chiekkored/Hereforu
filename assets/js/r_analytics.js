$('#support_btn').hide();
$(document).ready(
  function() {
    if ($('#mr_wall').length != 0) {
      //Get all most viewed ajax
      $.ajax({
        dataType : 'json',
        type: 'get',
        url : window.location.origin + '/hereforyou/get_feed_mr',
        success : function(response) {

          if (response.length > 0) {
            for (var i = 0; i < response.length; i++) {
              //Populate feed
              $('#mr_wall').append(append_feed_mr(response[i]));
            }
          }else{
            $('#mr_wall').append(show_nofeed());
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

    $('p').readingTime();
    val = $('.eta').text();
    if ($('#support_btn').attr('data-is-support')) {
      val = 0;
    }
    if (val == 0) {
      $('.eta').html('Less than a');
    }
    setTimeout(function(){
      $('#support_btn').show('slow');
      $('#support_info').hide();
      $.ajax({
        data : {
          p_slug : $('h2').attr('data-slug')
        },
        dataType : 'json',
        type: 'post',
        url : window.location+'/has_read',
        error : function(jqXHR, textStatus, errorThrown) {
          // Log the status
          console.error(textStatus);
          // Log the error response object
          console.error(jqXHR);
          // Log error thrown
          console.error(errorThrown);
        }
      });


    }, val*60000);

    // $('#effaceBtn').click(function () {
    //   $.ajax({
    //       data : {
    //         p_slug : $('h2').attr('data-slug')
    //       },
    //       dataType : 'json',
    //       type: 'post',
    //       url : window.location+'/efface',
    //       error : function(jqXHR, textStatus, errorThrown) {
    //         // Log the status
    //         console.error(textStatus);
    //         // Log the error response object
    //         console.error(jqXHR);
    //         // Log error thrown
    //         console.error(errorThrown);
    //       }
    //     });
    // });
    $('#show_effaceBtn').click(function () {
      $('#thought_body').fadeIn('slow')
    })


    $('#supportBtn').click(function () {
      if (this.checked) {
        $.ajax({
          data : {
            p_slug : $('h2').attr('data-slug')
          },
          dataType : 'json',
          type: 'post',
          url : window.location+'/support',
          success : function(data) {
            $('#supportBtn').attr('disabled', true);
            psic_val = parseInt($('#psic').text());
            $('#psic').text(psic_val+1);
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
      else {
        console.log('un-checked');
      }
    });
  }
);
