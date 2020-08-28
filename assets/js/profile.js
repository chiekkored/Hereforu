$(document).ready(
  function() {
    //Get all profile thoughts ajax
    $.ajax({
      dataType : 'json',
      data: { 
        id: $('#t_wall').attr('data-user-id')
      },
      type: 'post',
      url : window.location.href + '/profile_thoughts',
      beforeSend: function(){
        $('#t_wall').append(show_phfeed());
       },
      success : function(response) {
        f = response;
        // t = response.tags.map(({ t_name }) => t_name);
        // console.log(t);

        $('#wall .ph-item').hide();

        if (f.length > 0) {
          for (var i = 0; i < f.length; i++) {
            //Populate feed
            $('#t_wall').append(append_feed(f[i]));
          }
        }else{
          $('#t_wall').append(show_nofeed());
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

    //Delete post
    $(document).on("click","#btnDelete",function() {
      id = $(this).attr('data-id')
      $.ajax({
        data : {
          id : id
        },
        dataType : 'json',
        type: 'post',
        url : window.location.origin+'/hereforyou/post/delete',
        success: function(data) {
          if (data) {
            $(document).find(`.feed-item[data-post-id=${id}]`).hide();
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
