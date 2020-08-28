function Index (value, row, index) {
  return [
      index + 1
  ].join('');
}

function Type (value, row, index) {
  if (row.sm_type == 1) {
    return [
        'Notice'
    ].join('');
  } else if (row.sm_type == 2) {
    return [
        'Featured post'
    ].join('');
  } else if (row.sm_type == 3) {
    return [
        'Pinned post'
    ].join('');
  }
}

function TableActions (value, row, index) {
  return [
  '<div class="btn-group" role="group">\
      <button type="button" class="btn btn-primary btnView"><i class="fa fa-eye"></i><span class="d-none d-md-inline"> View</span></button>\
      <button type="button" class="btn btn-info btnEdit"><i class="fa fa-pencil"></i><span class="d-none d-md-inline"> Edit</span></button>\
      <button type="button" class="btn btn-danger btnRemove"><i class="fa fa-trash"></i><span class="d-none d-md-inline"> Delete</span></button>\
  </div>'
  ].join('');
}

function TableUserActions (value, row, index) {
  if (row.p_status == 1 || row.p_status == 2) {
    return [
      '<div class="btn-group" role="group" aria-label="Basic example">\
          <button type="button" class="btn btn-dark btn-sm btnRecover"><i class="fa fa-undo"></i><span class="d-none d-md-inline"> Recover</span></button>\
      </div>'
      ].join('');

  } else {
    if (row.p_is_featured == 0) {
      return [
        '<button type="button" class="btn btn-warning btn-sm btnFeature"><i class="fa fa-thumb-tack"></i><span class="d-none d-md-inline"> Feature</span></button>\
        <button type="button" class="btn btn-danger btn-sm btnRemovePost"><i class="fa fa-trash"></i><span class="d-none d-md-inline"> Delete</span></button>'
        ].join('');
    } else {
      return [
        '<button type="button" class="btn btn-dark btn-sm btnUnfeature"><i class="fa fa-ban"></i><span class="d-none d-md-inline"> Unfeature</span></button>\
        <button type="button" class="btn btn-danger btn-sm btnRemovePost"><i class="fa fa-trash"></i><span class="d-none d-md-inline"> Delete</span></button>'
        ].join('');
    }
  }
}

function Title (value, row, index) {
    return [
        '<a class="text-info" href="http://hereforu.com/hereforyou/'+row.username+'/'+row.p_slug+'" target="_blank">'+row.p_title+'</a>'
    ].join('');
}

function Username (value, row, index) {
  if (row.p_type == 'User') {
    return [
        '<a class="text-info" href="http://hereforu.com/hereforyou/'+row.username+'" target="_blank">'+row.username+'</a>'
    ].join('');
  } else {
    return [
        '<a class="text-info" href="http://hereforu.com/hereforyou/'+row.username+'" target="_blank"><small>'+row.guest_name+' ('+row.username+')</small></a>'
    ].join('');
  }
}

function P_date_created (value, row, index) {
    return [
        '<small>'+row.p_date_created+'</small>'
    ].join('');
}

window.operateEvents = {
    'click .btnView': function (e, value, row, index) {
      e.preventDefault();

      //Ajax for view modal
      $.ajax({
      url : 'posts/view_post',
      dataType : 'json',
      type : 'post',
      data : {
        sm_id : row.site_metadata_id
      },
      success : function(data, textStatus, jqXHR) {
        $('#viewPost #content_title').html(data.sm_title);
        $('#viewPost #content_body').html(data.sm_content);
        $('#viewPost #content_date').html(data.sm_created_on);
        $('#viewPost #content_created').html(data.sm_created_by);
        if (data.sm_type == 1) {
          $('#viewPost #content_type').html('Notice');
        } else if (data.sm_type == 2){
          $('#viewPost #content_type').html('Featured Post');
        } else if (data.sm_type == 3){
          $('#viewPost #content_type').html('Pinned Post');
        }
        $('#viewPost').modal('show');
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
    },
    'click .btnEdit': function (e, value, row, index) {
      e.preventDefault();

      //Ajax for Edit modal
      $.ajax({
      url : 'posts/view_post',
      dataType : 'json',
      type : 'post',
      data : {
        sm_id : row.site_metadata_id
      },
      success : function(data, textStatus, jqXHR) {

        $('#editPost #titleEdit').val(data.sm_title);
        $('#editPost #contentEdit').summernote('code', data.sm_content);
        $('#editPost').attr('data-post-id', row.site_metadata_id);

        $('#editPost').modal('show');

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
    },
    'click .btnRemove': function (e, value, row, index) {
      e.preventDefault();

      const swalWithBootstrapButtons = Swal.mixin({
          customClass: {
            confirmButton: 'btn btn-danger mx-1',
            cancelButton: 'btn btn-link mx-1'
          },
          buttonsStyling: false
        })

      swalWithBootstrapButtons.fire({
          width: 350,
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Confirm',
          cancelButtonText: 'Cancel',
          reverseButtons: true
      }).then((result) => {
        if (result.value) {
          //Ajax for deleting event
          $.ajax({
            url : 'posts/delete_post',
            dataType : 'json',
            type : 'post',
            data : {
              sm_id : row.site_metadata_id
            },
            beforeSend: function(){
              Swal.fire({
                titleText: 'Deleting Post',
                onBeforeOpen: () => {
                  Swal.showLoading()
                }
              })
             },
            success : function(data, textStatus, jqXHR) {
              Swal.close();
              $('#tblAdmin').bootstrapTable('refresh', {silent: true})
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
        }
      })
    },
  }

window.postEvents = {
  'click .btnRecover': function (e, value, row, index) {
      e.preventDefault();

      const swalWithBootstrapButtons = Swal.mixin({
          customClass: {
            confirmButton: 'btn btn-danger mx-1',
            cancelButton: 'btn btn-link mx-1'
          },
          buttonsStyling: false
        })

      swalWithBootstrapButtons.fire({
          width: 350,
          title: 'Recover',
          text: "Are you sure you want to recover this post?",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Confirm',
          cancelButtonText: 'Cancel',
          reverseButtons: true
      }).then((result) => {
        if (result.value) {
          //Ajax for recovering post
          $.ajax({
            url : 'posts/recover_post',
            dataType : 'json',
            type : 'post',
            data : {
              post_id : row.post_id
            },
            beforeSend: function(){
              Swal.fire({
                titleText: 'Recovering Post',
                onBeforeOpen: () => {
                  Swal.showLoading()
                }
              })
             },
            success : function(data, textStatus, jqXHR) {
              Swal.close();
              $('#tblUsers').bootstrapTable('refresh', {silent: true})
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
        }
      })
    },
  'click .btnFeature': function (e, value, row, index) {
    e.preventDefault();

      //Ajax for view modal
      $.ajax({
      url : 'posts/feature_post',
      dataType : 'json',
      type : 'post',
      data : {
        post_id : row.post_id
      },
      beforeSend: function(){
        Swal.fire({
          titleText: 'Featuring Post',
          onBeforeOpen: () => {
            Swal.showLoading()
          }
        })
       },
      success : function(data, textStatus, jqXHR) {
        Swal.close();
        $('#tblUsers').bootstrapTable('refresh', {silent: true})
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
  },
  'click .btnUnfeature': function (e, value, row, index) {
    e.preventDefault();

      //Ajax for view modal
      $.ajax({
      url : 'posts/unfeature_post',
      dataType : 'json',
      type : 'post',
      data : {
        post_id : row.post_id
      },
      beforeSend: function(){
        Swal.fire({
          titleText: 'Unfeaturing Post',
          onBeforeOpen: () => {
            Swal.showLoading()
          }
        })
       },
      success : function(data, textStatus, jqXHR) {
        Swal.close();
        $('#tblUsers').bootstrapTable('refresh', {silent: true})
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
  },
  'click .btnRemovePost': function (e, value, row, index) {
    e.preventDefault();

    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
          confirmButton: 'btn btn-danger mx-1',
          cancelButton: 'btn btn-link mx-1'
        },
        buttonsStyling: false
      })

    swalWithBootstrapButtons.fire({
        width: 350,
        title: 'Remove',
        text: "Are you sure you want to remove this post?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Confirm',
        cancelButtonText: 'Cancel',
        reverseButtons: true
    }).then((result) => {
      if (result.value) {
        //Ajax for remove post
        $.ajax({
          url : 'posts/remove_post',
          dataType : 'json',
          type : 'post',
          data : {
            post_id : row.post_id
          },
          beforeSend: function(){
            Swal.fire({
              titleText: 'Removing Post',
              onBeforeOpen: () => {
                Swal.showLoading()
              }
            })
           },
          success : function(data, textStatus, jqXHR) {
            Swal.close();
            $('#tblUsers').bootstrapTable('refresh', {silent: true})
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
      }
    })
  },
}

$(document).ready(
  function() {

    // Initialize textarea
    $('#content').summernote({
      dialogsInBody: true,
      toolbar: [
        ['font', ['bold', 'underline', 'clear']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['insert', ['link', 'picture', 'video']],
        ['view', ['codeview']],
      ]
    });

    $('#editPost #contentEdit').summernote({
      dialogsInBody: true,
      toolbar: [
        ['font', ['bold', 'underline', 'clear']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['insert', ['link', 'picture', 'video']],
        ['view', ['codeview']],
      ]
    });
    // Initialize bootstrap table - admin posts
    // $('#tblAdmin').bootstrapTable()

    $('#addBtn').click(function(e){
      e.preventDefault();

      // Validation if input is not empty
      validated = true;

      if (!validateField("#addPost .need-validate")) {
        validated = false;
      }

      if (!validated) {
        return false;
      }

      //Create a form data
      const post_data = new FormData();
      post_data.append('sm_title', $('#title').val());
      post_data.append('sm_type', $('#type option:selected').val());
      post_data.append('sm_content', $('#content').val());

      //Ajax for Edit modal
      $.ajax({
        url : 'posts/add_post',
        dataType : 'json',
        type : 'post',
        data : post_data,
        processData: false,
        contentType: false,
        success : function(data, textStatus, jqXHR) {
          $('#addPost').modal('hide')
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
    })

    $('#editBtn').click(function(e){
      e.preventDefault();

      // Validation if input is not empty
      validated = true;

      if (!validateField("#editPost .need-validate")) {
        validated = false;
      }

      if (!validated) {
        return false;
      }
      //Create a form data
      const post_data = new FormData();
      post_data.append('sm_id', $('#editPost').attr('data-post-id'));
      post_data.append('sm_title', $('#titleEdit').val());
      post_data.append('sm_type', $('#typeEdit option:selected').val());
      post_data.append('sm_content', $('#contentEdit').val());

      //Ajax for Edit modal
      $.ajax({
        url : 'posts/edit_post',
        dataType : 'json',
        type : 'post',
        data : post_data,
        processData: false,
        contentType: false,
        beforeSend: function(){
          $('#editPost').modal('hide')
          Swal.fire({
            titleText: 'Editing Post',
            onBeforeOpen: () => {
              Swal.showLoading()
            }
          })
         },
        success : function(data, textStatus, jqXHR) {
          Swal.close()
          $('#tblAdmin').bootstrapTable('refresh', {silent: true})
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

    if ($('#no_deleted').is(':checked')) {
      $('#tblUsers').bootstrapTable('filterBy', {
        p_status: ['0', '2']
      })
    }

    $('#no_deleted').click(function(e){
      e.preventDefault();
      $('#tblUsers').bootstrapTable('filterBy', {
          p_status: ['0', '2']
        })
    })

    $('#all_posts').click(function(e){
      e.preventDefault();
      $('#tblUsers').bootstrapTable('filterBy', {
          p_status: ['0', '1', '2']
        })
    })
    
  }
);
