function Index (value, row, index) {
  return [
      index + 1
  ].join('');
}

function Name (value, row, index) {
  return [
      '<b>' + value + '</b>'
  ].join('');
}

function Mine_code (value, row, index) {
  return [
      '<i class="text-muted">' + value + '</i>'
  ].join('');
}

var sales_today = 0;

function Price (value, row, index) {
  var val = parseFloat(value);
  sales_today += val;
  console.log(sales_today);
  $('#sales_today').html('₱ ' + sales_today.toLocaleString());

  return [
      '₱ ' + Number(value).toLocaleString(undefined, {minimumFractionDigits: 2})
  ].join('');
}

function TableActions (value, row, index) {
  return [
  '<button type="button" class="btn btn-danger btn-sm btnRemove"><i class="fa fa-trash"></i><span class="d-none d-md-inline"> Delete</span></button>'
  ].join('');
}

// function TableUserActions (value, row, index) {
//   if (row.p_status == 1 || row.p_status == 2) {
//     return [
//       '<div class="btn-group" role="group" aria-label="Basic example">\
//           <button type="button" class="btn btn-dark btn-sm btnRecover"><i class="fa fa-undo"></i><span class="d-none d-md-inline"> Recover</span></button>\
//       </div>'
//       ].join('');

//   } else {
//     if (row.p_is_featured == 0) {
//       return [
//         '<button type="button" class="btn btn-warning btn-sm btnFeature"><i class="fa fa-thumb-tack"></i><span class="d-none d-md-inline"> Feature</span></button>\
//         <button type="button" class="btn btn-danger btn-sm btnRemovePost"><i class="fa fa-trash"></i><span class="d-none d-md-inline"> Delete</span></button>'
//         ].join('');
//     } else {
//       return [
//         '<button type="button" class="btn btn-dark btn-sm btnUnfeature"><i class="fa fa-ban"></i><span class="d-none d-md-inline"> Unfeature</span></button>\
//         <button type="button" class="btn btn-danger btn-sm btnRemovePost"><i class="fa fa-trash"></i><span class="d-none d-md-inline"> Delete</span></button>'
//         ].join('');
//     }
//   }
// }

window.operateEvents = {
    // 'click .btnView': function (e, value, row, index) {
    //   e.preventDefault();

    //   //Ajax for view modal
    //   $.ajax({
    //   url : 'posts/view_post',
    //   dataType : 'json',
    //   type : 'post',
    //   data : {
    //     sm_id : row.site_metadata_id
    //   },
    //   success : function(data, textStatus, jqXHR) {
    //     $('#viewPost #content_title').html(data.sm_title);
    //     $('#viewPost #content_body').html(data.sm_content);
    //     $('#viewPost #content_date').html(data.sm_created_on);
    //     $('#viewPost #content_created').html(data.sm_created_by);
    //     if (data.sm_type == 1) {
    //       $('#viewPost #content_type').html('Notice');
    //     } else if (data.sm_type == 2){
    //       $('#viewPost #content_type').html('Featured Post');
    //     } else if (data.sm_type == 3){
    //       $('#viewPost #content_type').html('Pinned Post');
    //     }
    //     $('#viewPost').modal('show');
    //   },
    //   error : function(jqXHR, textStatus, errorThrown) {
    //     Swal.fire({
    //       icon: 'error',
    //       title: 'Error',
    //       text: 'Something went wrong!',
    //     });
    //     // Log the status
    //     console.error(textStatus);
    //     // Log the error response object
    //     console.error(jqXHR);
    //     // Log error thrown
    //     console.error(errorThrown);
    //   }
    // });
    // },
    // 'click .btnEdit': function (e, value, row, index) {
    //   e.preventDefault();

    //   //Ajax for Edit modal
    //   $.ajax({
    //   url : 'posts/view_post',
    //   dataType : 'json',
    //   type : 'post',
    //   data : {
    //     sm_id : row.site_metadata_id
    //   },
    //   success : function(data, textStatus, jqXHR) {

    //     $('#editPost #titleEdit').val(data.sm_title);
    //     $('#editPost #contentEdit').summernote('code', data.sm_content);
    //     $('#editPost').attr('data-post-id', row.site_metadata_id);

    //     $('#editPost').modal('show');

    //   },
    //   error : function(jqXHR, textStatus, errorThrown) {
    //     // Log the status
    //     console.error(textStatus);
    //     // Log the error response object
    //     console.error(jqXHR);
    //     // Log error thrown
    //     console.error(errorThrown);
    //   }
    // });
    // },
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
            url : 'sell/remove',
            dataType : 'json',
            type : 'post',
            data : {
              sell_id : row.sell_id
            },
            beforeSend: function(){
              Swal.fire({
                titleText: 'Deleting Order',
                onBeforeOpen: () => {
                  Swal.showLoading()
                }
              })
             },
            success : function(data, textStatus, jqXHR) {
              sales_today = 0;
              Swal.close();
              $('#tblMiners').bootstrapTable('refresh', {silent: true})
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

    $('#customer_name_input').hide();

    $('#addMinerBtn').click(function(e){
      e.preventDefault();

      $('#addBtn').prop('disabled', false)
      $("#addMiner #is_new").prop("checked", false);
      $('#customer_name_input').hide()
      $('#customer_name_dropdown').show()

      $('#addMiner #customer_dropdown').empty();

        //Ajax for
        $.ajax({
        url : 'sell/get_customers',
        dataType : 'json',
        type : 'get',
        beforeSend: function(){
          $('#addMiner #customer_dropdown').prop('disabled', true);
          $('#addMiner #customer_dropdown').append($('<option value="" selected disabled>Loading</option>'));
         },
        success : function(data, textStatus, jqXHR) {
          $('#addMiner #customer_dropdown').empty();
          if (data.length == 0) {
            $('#addMiner #customer_dropdown').prop('disabled', true);

          } else {
            $('#addMiner #customer_dropdown').append($('<option value="" selected disabled>Select a customer</option>'));
            $.each(data, function (i, item) {
            $('#addMiner #customer_dropdown').prop('disabled', false);
              $('#addMiner #customer_dropdown').append($('<option>', { 
                  value: item.customer_uuid,
                  text : item.name 
                }));
            });
          }
          // $('#addParticipants #addRowParticipants').append('percentageSection');
        },
        error : function(jqXHR, textStatus, errorThrown) {
          Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Unable to fetch customers!',
          });
          // Log the status
          console.error(textStatus);
          // Log the error response object
          console.error(jqXHR);
          // Log error thrown
          console.error(errorThrown);
        }
      });
    });

    $('#addMiner #is_new').click(function(e){
      if ($(this).is(':checked')) {
          $('#customer_name_dropdown').hide()
          $('#customer_name_input').show()
      }else{
          $('#customer_name_input').hide()
          $('#customer_name_dropdown').show()
      }
    });

    $('#addBtn').click(function(e){
      e.preventDefault();

      // Validation if input is not empty
      validated = true;


      if ($('#is_new').is(':checked')) {
        if (!validateField("#addMiner .need-validate-new")) {
          validated = false;
        }
      }else{
        if (!validateField("#addMiner .need-validate")) {
          validated = false;
        }
      }

      if (!validated) {
        return false;
      }


      $(this).prop('disabled', true)
      sales_today = 0;

      //Create a form data
      const post_data = new FormData();
      if ($('#is_new').is(':checked')) {
        post_data.append('customer_name', $('#customer_name').val());
      }else{
        post_data.append('customer_uuid', $('#customer_dropdown option:selected').val());
      }
      post_data.append('mine_code', $('#mine_code').val());
      post_data.append('price', $('#price').val());

      //Ajax for Edit modal
      $.ajax({
        url : 'sell/add_sell',
        dataType : 'json',
        type : 'post',
        data : post_data,
        processData: false,
        contentType: false,
        success : function(data, textStatus, jqXHR) {
          $('#addMiner').modal('hide')
          $('#tblMiners').bootstrapTable('refresh', {silent: true})
          $('#addMiner input').val('');
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
    
  }
);
