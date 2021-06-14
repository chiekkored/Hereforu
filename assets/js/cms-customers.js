function TableActions (value, row, index) {

    if (row.status == 0) {

      return ['<div class="btn-group" role="group">\
      <button type="button" class="btn btn-primary btn-sm btnView"><i class="fa fa-eye"></i><span class="d-none d-md-inline"> <small>View</small></span></button>\
      <button type="button" class="btn btn-warning btn-sm btnEdit"><i class="fa fa-pencil"></i><span class="d-none d-md-inline"> <small>Edit</small></span></button>\
      </div>\
      <div class="btn-group" role="group">\
      <button type="button" class="btn btn-light btn-sm btnHide"><i class="fa fa-eye-slash"></i><span class="d-none d-md-inline"> <small>Hide</small></span></button>\
      <button type="button" class="btn btn-danger btn-sm btnDelete"><i class="fa fa-trash"></i><span class="d-none d-md-inline"> <small>Delete</small></span></button>\
      </div>'
  ].join('');
    } else {

      return ['<button type="button" class="btn btn-warning btn-sm btnEdit"><i class="fa fa-pencil"></i> <small>Edit</small></button>\
      <div class="btn-group" role="group">\
      <button type="button" class="btn btn-dark btn-sm btnShow"><i class="fa fa-eye"></i><span class="d-none d-md-inline"> <small>Show</small></span></button>\
      <button type="button" class="btn btn-danger btn-sm btnDelete"><i class="fa fa-trash"></i><span class="d-none d-md-inline"> <small>Delete</small></span></button>\
      </div>'
  ].join('');
    }
}

function CustomerViewActions (value, row, index) {

  if (row.status == 0) {
      return [
        '<div class="btn-group" role="group">\
            <button type="button" class="btn btn-warning btn-sm btnPaid"><i class="fa fa-exclamation-circle"></i><span class="d-none d-md-inline"> <small>Override Paid</small></span></button>\
        </div>'
        ].join('');
    }
}


function Address (value, row, index) {
  if (value != '') {
    return [value].join('');
  } else {
    return ['<small class="badge badge-secondary">None</small>'].join('');
  }
}

function Fb_link (value, row, index) {
  if (value != '') {
    return [
        '<a class="text-primary" href="'+row.fb_link+'" target="_blank">'+row.name+'</a>'
    ].join('');
  } else {
    return ['<small class="badge badge-secondary">None</small>'].join('');
  }
}

function Date_created (value, row, index) {
  return [
      value + ' - ' + row.time_created
  ].join('');
}

function Price (value, row, index) {
  return [
      '<b>₱ ' + Number(value).toLocaleString(undefined, {minimumFractionDigits: 2}) + '</b>'
  ].join('');
}

function Status (value, row, index) {
  if (row.status == 0) {
    return ['<div class="text-center"><span class="badge badge-warning badge-sm">Pending</span></div>'].join('');
  } else {
    return ['<div class="text-center"><span class="badge badge-success badge-sm">Paid</span></div>'].join('');}
}
// function Ip_address (value, row, index) {
//   return [
//       '<small>'+row.ip_address+'</small>'
//   ].join('');
// }

// function Username (value, row, index) {
//   return [
//       '<a class="text-info" href="http://hereforu.com/hereforyou/'+row.username+'" target="_blank">'+row.username+'</a>'
//   ].join('');
// }

// function U_created_on (value, row, index) {
//   return [
//       '<small>'+row.u_created_on+'</small>'
//   ].join('');
// }

window.operateEvents = {
  'click .btnView': function (e, value, row, index) {
      e.preventDefault();


      $('#viewCustomer').attr('data-customer-uuid', row.customer_uuid);

      $('#customer_sales').bootstrapTable('destroy')
      $('#customer_sales').bootstrapTable({
          url: 'customers/view_customer_sales',
          queryParams: function (p) {
              return {
                  uuid: row.customer_uuid, 
                  limit: p.limit,
                  offset: p.offset
              };
          }
      });
      //Ajax for recovering post
      $.ajax({
        url : 'customers/get',
        dataType : 'json',
        type : 'post',
        data : {
          customer_uuid : row.customer_uuid
        },
        success : function(data, textStatus, jqXHR) {

          $('#viewCustomer #sales_table').html('');

          $('#viewCustomer #customer_name').html(data.name);
          $('#viewCustomer #address').html(data.address);
          $('#viewCustomer #fb_link').attr('href', data.fb_link);
          $('#viewCustomer #phone_num').attr('href', 'Tel: '+data.phone_num);
          // $('#viewCustomer #date_sales').html(data[0].date_created);

          
          $('#viewCustomer').modal('show');
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

      //Ajax for recovering post
      $.ajax({
        url : 'customers/get',
        dataType : 'json',
        type : 'post',
        data : {
          customer_uuid : row.customer_uuid
        },
        // beforeSend: function(){
        //   Swal.fire({
        //     onBeforeOpen: () => {
        //       Swal.showLoading()
        //     }
        //   })
        //  },
        success : function(data, textStatus, jqXHR) {
          // Swal.close();
          $('#editCustomer').modal('show');

          $('#editCustomer').attr('data-customer-id', row.customer_uuid);

          $('#editCustomer #editName').val(data.name);
          $('#editCustomer #editFb_link').val(data.fb_link);
          $('#editCustomer #editAddress').val(data.address);
          $('#editCustomer #editPhone_num').val(data.phone_num);
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
  'click .btnHide': function (e, value, row, index) {
    e.preventDefault();

    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
          confirmButton: 'btn btn-success mx-1',
          cancelButton: 'btn btn-link mx-1'
        },
        buttonsStyling: false
      })

    swalWithBootstrapButtons.fire({
        width: 350,
        title: 'Hide Customer',
        text: "Are you sure you want to hide this customer?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Confirm',
        cancelButtonText: 'Cancel',
        reverseButtons: true
    }).then((result) => {
      if (result.value) {
        //Ajax for recovering post
        $.ajax({
          url : 'customers/hide',
          dataType : 'json',
          type : 'post',
          data : {
            customer_uuid : row.customer_uuid
          },
          beforeSend: function(){
            Swal.fire({
              titleText: 'Hiding User',
              onBeforeOpen: () => {
                Swal.showLoading()
              }
            })
           },
          success : function(data, textStatus, jqXHR) {
            Swal.close();
            $('#tblCustomer').bootstrapTable('refresh', {silent: true})
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
  'click .btnShow': function (e, value, row, index) {
    e.preventDefault();

    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
          confirmButton: 'btn btn-dark mx-1',
          cancelButton: 'btn btn-link mx-1'
        },
        buttonsStyling: false
      })

    swalWithBootstrapButtons.fire({
        width: 350,
        title: 'Unhide Customer',
        text: "Are you sure you want to unhide this customer?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Confirm',
        cancelButtonText: 'Cancel',
        reverseButtons: true
    }).then((result) => {
      if (result.value) {
        //Ajax for recovering post
        $.ajax({
          url : 'customers/show',
          dataType : 'json',
          type : 'post',
          data : {
            customer_uuid : row.customer_uuid
          },
          beforeSend: function(){
            Swal.fire({
              titleText: 'Unhiding Customer',
              onBeforeOpen: () => {
                Swal.showLoading()
              }
            })
           },
          success : function(data, textStatus, jqXHR) {
            Swal.close();
            $('#tblCustomer').bootstrapTable('refresh', {silent: true})
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
  'click .btnDelete': function (e, value, row, index) {
    e.preventDefault();

    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
          confirmButton: 'btn btn-light mx-1',
          cancelButton: 'btn btn-link mx-1'
        },
        buttonsStyling: false
      })

    swalWithBootstrapButtons.fire({
        width: 350,
        title: 'Delete Customer',
        text: "Are you sure you want to delete this customer?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Confirm',
        cancelButtonText: 'Cancel',
        reverseButtons: true
    }).then((result) => {
      if (result.value) {
        //Ajax for recovering post
        $.ajax({
          url : 'customers/remove',
          dataType : 'json',
          type : 'post',
          data : {
            customer_uuid : row.customer_uuid
          },
          beforeSend: function(){
            Swal.fire({
              titleText: 'Removing Customer',
              onBeforeOpen: () => {
                Swal.showLoading()
              }
            })
           },
          success : function(data, textStatus, jqXHR) {
            Swal.close();
            $('#tblCustomer').bootstrapTable('refresh', {silent: true})
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


window.operateCustomerEvents = {
  'click .btnPaid': function (e, value, row, index) {
      e.preventDefault();

      const swalWithBootstrapButtons = Swal.mixin({
          customClass: {
            confirmButton: 'btn btn-secondary mx-1',
            cancelButton: 'btn btn-link mx-1'
          },
          buttonsStyling: false
        })

      swalWithBootstrapButtons.fire({
          width: 350,
          title: 'Paid',
          text: "Are you sure you want to toggle this customer as paid?",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Confirm',
          cancelButtonText: 'Cancel',
          reverseButtons: true
      }).then((result) => {
        if (result.value) {
          //Ajax for deleting event
          $.ajax({
            url : 'customers/override_paid',
            dataType : 'json',
            type : 'post',
            data : {
              sell_id : row.sell_id,
            },
            beforeSend: function(){
              Swal.fire({
                titleText: 'Processing',
                onBeforeOpen: () => {
                  Swal.showLoading()
                }
              })
             },
            success : function(data, textStatus, jqXHR) {
              Swal.close();
              $('#customer_sales').bootstrapTable('refresh', {silent: true})
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


    if ($('#no_guests').is(':checked')) {
      $('#tblUsers').bootstrapTable('filterBy', {
        role: ['User', 'Moderator']
      })
    }

    $('#no_guests').click(function(e){
      e.preventDefault();
      $('#tblUsers').bootstrapTable('filterBy', {
          role: ['User', 'Moderator']
        })
    })

    $('#all_users').click(function(e){
      e.preventDefault();
      $('#tblUsers').bootstrapTable('filterBy', {
          role: ['User', 'Guest', 'Moderator']
        })
    })

    $('#btnAdd').click(function(e){
      e.preventDefault();
      
      // Validation if input is not empty
      validated = true;

      if (!validateField("#addCustomer .need-validate")) {
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
        url : 'customers/add',
        dataType : 'json',
        type : 'post',
        data : {
          name : $('#name').val(),
          fb_link : $('#fb_link').val(),
          phone_num : $('#phone_num').val(),
          address : $('#address').val()
        },
        beforeSend: function(){
          $('#addCustomer').modal('hide')
          Swal.fire({
            titleText: 'Adding customer',
            onBeforeOpen: () => {
              Swal.showLoading()
            }
          })
         },
        success : function(data, textStatus, jqXHR) {
            Swal.close();
            $('#tblCustomer').bootstrapTable('refresh', {silent: true})
            $('#addCustomer input').val('');
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

    $('#btnEdit').click(function(e){
      e.preventDefault();
      
      // Validation if input is not empty
      validated = true;

      if (!validateField("#editCustomer .need-validate")) {
        validated = false;
      }

      if (!validated) {
        return false;
      }


      //Ajax for POST admin change pass
      $.ajax({
        url : 'customers/edit',
        dataType : 'json',
        type : 'post',
        data : {
          customer_uuid : $('#editCustomer').attr('data-customer-id'),
          name : $('#editName').val(),
          fb_link : $('#editFb_link').val(),
          phone_num : $('#editPhone_num').val(),
          address : $('#editAddress').val()
        },
        beforeSend: function(){
          $('#editCustomer').modal('hide')
          Swal.fire({
            titleText: 'Editing customer',
            onBeforeOpen: () => {
              Swal.showLoading()
            }
          })
         },
        success : function(data, textStatus, jqXHR) {
            Swal.close();
            $('#tblCustomer').bootstrapTable('refresh', {silent: true})
            $('#editCustomer input').val('');
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
  }
);