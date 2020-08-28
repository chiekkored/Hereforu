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
$.ajax({
data : {
  ipa : localStorage.getItem("ip")
},
dataType : 'json',
type: 'post',
url : 'auth/check',
success : function(data) {
  if (data != 'success') {
    localStorage.setItem("b", true)
    window.location.replace('ban');
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
function get_feed_a(){
  //Get all posts ajax
  $.ajax({
    dataType : 'json',
    type: 'get',
    url : 'get_feed_a',
    beforeSend: function(){
      $('#t_wall').append(show_phfeed());
      $('#p_wall #ng_feed').html('<a href="" id="btnNg_tab">No Guest</a>').removeClass('active');
     },
    success : function(response) {
      $('#p_wall #a_feed').html('All').addClass('active');
      f = response.thoughts;
      // t = response.tags.map(({ t_name }) => t_name);
      // console.log(t);

      $('#wall .ph-item').hide();

      if (f.length > 0) {
        for (var i = 0; i < f.length; i++) {
          //Populate feed
          if (f[i].p_is_featured == 1) {
            $('#f_wall').append(append_feed(f[i]));
          }else{
            $('#t_wall').append(append_feed(f[i]));
          }
          
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
}

function get_feed_mr(){
  //Get all most read posts ajax
  $.ajax({
    dataType : 'json',
    type: 'get',
    url : 'get_feed_mr',
    success : function(response) {

      $('#most_read .ph-item').hide();

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
$(document).ready(
  function() {
    if (localStorage.getItem("b")) {
      window.location.replace('ban')
    }
    // Focuses post card when clicked
    // $('#post input').focus(function () {
    //     $('#card-post').dimBackground();
    // }).blur(function () {
    //     $('#card-post').undim();
    // });

    // Initializations
    $('#post textarea').focus(function () {
        $('#card-post').dimBackground();
    }).blur(function () {
        $('#card-post').undim();
    });
    // Auto resize textarea
    $('.ta-expand').autosize({append: "\n"});

    // Instantiate the Bloodhound suggestion engine
    // Populate tags
    // const tags = new Bloodhound({
    //   datumTokenizer: datum => Bloodhound.tokenizers.whitespace(datum.value),
    //   queryTokenizer: Bloodhound.tokenizers.whitespace,
    //   remote: {
    //     url: 'get_tags',
    //     // Map the remote source JSON array to a JavaScript object array
    //     transform: response => $.map(response, tag => ({
    //       value: tag.t_name
    //     }))
    //   }
    // });
    // tags.initialize();

    $('#post #tags').tagsinput({
      maxChars: 14,
      maxTags: 4
    });
    //   typeaheadjs: [{
    //         minLength: 2,
    //         highlight: true,
    //   },{
    //       minlength: 2,
    //       name: 'tags',
    //       displayKey: 'value',
    //       valueKey: 'value',
    //       source: tags.ttAdapter()
    //   }],
    //   freeInput: true,
    //   cancelConfirmKeysOnEmpty: true
    // });

    // Get notice
    $.ajax({
      dataType : 'json',
      type: 'get',
      url : 'notice',
      success: function(data) {
        notice = data.notice;
        if (notice) {
          for (var i = 0; i < notice.length; i++) {
            if (notice[i].sm_type == 1) {
              $('#notice h5').html(notice[i].sm_title);
              $('#notice #notice_body').html(notice[i].sm_content);
              if (!localStorage.getItem("notice")) {
                $('#notice').modal('show');
              }
            } else if(notice[i].sm_type == 3) {
              $('#p_wall').append(append_pinned(notice[i]))
            }
          }
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

    // Call get all post function
        get_feed_a();
        get_feed_mr();

    // Write a post
    $('#btnPost').click(
      function(e) {
        // Prevent default action of button
        e.preventDefault();

        // Validation if input is not empty
        validated = true;

        if (!validateField("#post #title")) {
          validated = false;
        }
        if (!validateField("#post textarea")) {
          validated = false;
        }

        if (!validated) {
          return false;
        }

        g_name = $('#name').val();
        if (!g_name) {
          g_name = '';
        }
        // Validation end

        // Invoke AJAX request for register
        $.ajax({
          data : {
            title : $('#title').val(),
            content : $('#content').val(),
            g_name : g_name,
            p_tags : $("#form_tags input").tagsinput('items')[1]
          },
          dataType : 'json',
          type: 'post',
          url : 'post_feed',
          beforeSend: function(){
            $('#post #title').attr('disabled', true);
            $('#wall_subform').hide();
            $('#wall_post_b').slideUp();
           },
          success : function(data) {
            $('#post #title').attr('disabled', false);
            $('#name, #title, #content').val('');
            $('.ta-expand').attr('style', '');
            $('#post #tags').tagsinput('destroy');
            $('#post #tags').tagsinput({
              maxChars: 10,
              maxTags: 4
            });
            $('#post #tags').tagsinput('removeAll');
            $('#wall_post_b').slideDown();
            $('#wall_subform').show();
            $('#f_wall').html('');
            $('#t_wall').html('');
            get_feed_a()
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

    // Change wall to No Guest
    $('#btnNg_tab').on('click', function(e){
      // Prevent default action of button
      e.preventDefault();

      //Get no guest posts ajax
      $.ajax({
        dataType : 'json',
        type: 'get',
        url : 'get_feed_ng',
        beforeSend: function(){
          $('#p_wall #a_feed').html('<a href="" id="btnA_tab">All</a>').removeClass('active');
          $('#t_wall').html('');
          $('#t_wall').append(show_phfeed());
         },
        success : function(response) {
          $('#p_wall #ng_feed').html('No Guest').addClass('active');
          f = response.thoughts;
          // t = response.tags.map(({ t_name }) => t_name);
          // console.log(t);

          $('.ph-item').hide();

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
    });

    // Report button
    $(document).on("click","#btnReport",function() {
      id = $(this).attr('data-id');
      $('#report').attr('data-post-id', id).modal('show')
    })

    // Confirm report post
    $('#confirmReportBtn').click(function(){
      id = $(this).closest('.modal').attr('data-post-id');
      $.ajax({
        data : {
          id : id
        },
        dataType : 'json',
        type: 'post',
        url : window.location.origin+'/hereforyou/post/report',
        success : function(data) {
          $('#report').modal('hide');
          if (data == "success") {
            $('#notif_alert').html('<div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="3000" style="position: absolute; bottom: 1rem; left: 1rem; min-width: 200px">\
                <div class="toast-header">\
                  <img src="assets/img/logo.png" width="15" height="15" class="rounded mr-2">\
                  <strong class="mr-auto">Here For You</strong>\
                  <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">\
                    <span aria-hidden="true">&times;</span>\
                  </button>\
                </div>\
                <div class="toast-body">\
                  You report has been submitted.\
                </div>\
              </div>')
            $('.toast').toast('show');
          } else {
            $('#notif_alert').html('<div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="3000" style="position: absolute; bottom: 1rem; left: 1rem; min-width: 200px">\
                <div class="toast-header">\
                  <img src="assets/img/logo.png" width="15" height="15" class="rounded mr-2">\
                  <strong class="mr-auto">Here For You</strong>\
                  <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">\
                    <span aria-hidden="true">&times;</span>\
                  </button>\
                </div>\
                <div class="toast-body text-danger">\
                  Guest users cannot report a post.\
                </div>\
              </div>')
            $('.toast').toast('show');
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

    // Delete button
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

    // Change wall to No Guest
    $('#btnA_tab').on('click', function(e){
      // Prevent default action of button
      e.preventDefault();

      get_feed_a();
    });


    $('#noticeBtn').click(function(e){
      e.preventDefault();

      if ($('#noticeCheck').is(':checked')) {
        localStorage.setItem("notice", "true");
      }
    })
});