function TableActions (value, row, index) {
  if (row.status == 1) {

    deac_state = '<button type="button" class="btn btn-success btn-sm btnAct"><i class="fa fa-check-circle"></i><span class="d-none d-md-inline"> <small>Activate</small></span></button>'
  } else {

    deac_state = '<button type="button" class="btn btn-danger btn-sm btnDeac"><i class="fa fa-exclamation-circle"></i><span class="d-none d-md-inline"> <small>Deactivate</small></span></button>'
  }

  if (row.is_banned == 1) {

    ban_state = '<button type="button" class="btn btn-light btn-sm btnUnban"><i class="fa fa-smile-o"></i><span class="d-none d-md-inline"> <small>Unban</small></span></button>'
  } else {

    ban_state = '<button type="button" class="btn btn-dark btn-sm btnBan"><i class="fa fa-frown-o"></i><span class="d-none d-md-inline"> <small>Ban</small></span></button>'
  }
  return [
  '<div class="btn-group" role="group">\
      '+deac_state+'\
      '+ban_state+'\
  </div>'
  ].join('');
}

function TableAdminActions (value, row, index) {

    if (row.status == 0) {

      return ['<div class="btn-group" role="group">\
              <button type="button" class="btn btn-info btn-sm btnChangePass"><i class="fa fa-pencil"></i><span class="d-none d-md-inline"> <small>Change Password</small></span></button>\
              <button type="button" class="btn btn-danger btn-sm btnDeacAdmin"><i class="fa fa-exclamation-circle"></i><span class="d-none d-md-inline"> <small>Deactivate</small></span></button>\
          </div>'].join(''); 
    } else {

      return ['<div class="btn-group" role="group">\
              <button type="button" class="btn btn-info btn-sm btnChangePass"><i class="fa fa-pencil"></i><span class="d-none d-md-inline"> <small>Change Password</small></span></button>\
              <button type="button" class="btn btn-light btn-sm btnActAdmin"><i class="fa fa-check-circle"></i><span class="d-none d-md-inline"> <small>Activate</small></span></button>\
          </div>'].join('');
    }
}

function Ip_address (value, row, index) {
  return [
      '<small>'+row.ip_address+'</small>'
  ].join('');
}

function Username (value, row, index) {
  return [
      '<a class="text-info" href="http://hereforu.com/hereforyou/'+row.username+'" target="_blank">'+row.username+'</a>'
  ].join('');
}

function U_created_on (value, row, index) {
  return [
      '<small>'+row.u_created_on+'</small>'
  ].join('');
}

window.operateEvents = {
  'click .btnDeac': function (e, value, row, index) {
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
          title: 'Deactivate',
          text: "Are you sure you want to deactive this account?",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Confirm',
          cancelButtonText: 'Cancel',
          reverseButtons: true
      }).then((result) => {
        if (result.value) {
          //Ajax for recovering post
          $.ajax({
            url : 'users/deactivate_user',
            dataType : 'json',
            type : 'post',
            data : {
              user_id : row.user_id
            },
            beforeSend: function(){
              Swal.fire({
                titleText: 'Deactivating Account',
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
  'click .btnAct': function (e, value, row, index) {
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
        title: 'Activate',
        text: "Are you sure you want to activate this user?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Confirm',
        cancelButtonText: 'Cancel',
        reverseButtons: true
    }).then((result) => {
      if (result.value) {
        //Ajax for recovering post
        $.ajax({
          url : 'users/activate_user',
          dataType : 'json',
          type : 'post',
          data : {
            user_id : row.user_id
          },
          beforeSend: function(){
            Swal.fire({
              titleText: 'Activating User',
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
  'click .btnBan': function (e, value, row, index) {
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
        title: 'Ban',
        text: "Are you sure you want to ban this IP address?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Confirm',
        cancelButtonText: 'Cancel',
        reverseButtons: true
    }).then((result) => {
      if (result.value) {
        //Ajax for recovering post
        $.ajax({
          url : 'users/ban_user',
          dataType : 'json',
          type : 'post',
          data : {
            ipa : row.ip_address
          },
          beforeSend: function(){
            Swal.fire({
              titleText: 'Banning IP',
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
  'click .btnUnban': function (e, value, row, index) {
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
        title: 'Unban',
        text: "Are you sure you want to unban this IP address?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Confirm',
        cancelButtonText: 'Cancel',
        reverseButtons: true
    }).then((result) => {
      if (result.value) {
        //Ajax for recovering post
        $.ajax({
          url : 'users/unban_user',
          dataType : 'json',
          type : 'post',
          data : {
            ipa : row.ip_address
          },
          beforeSend: function(){
            Swal.fire({
              titleText: 'Unbanning IP',
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

window.operateadminEvents = {
  'click .btnChangePass': function (e, value, row, index) {
      e.preventDefault();

      //Ajax for GET admin accounts
      $.ajax({
        url : 'users/admin',
        dataType : 'json',
        type : 'post',
        data : {
          user_admin_id : row.user_admin_id
        },success : function(data, textStatus, jqXHR) {

          $('#editPassword').attr('data-post-id', row.user_admin_id);

          $('#editPassword').modal('show');
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
  'click .btnDeacAdmin': function (e, value, row, index) {
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
        title: 'Deactivate',
        text: "Are you sure you want to deactivate this admin?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Confirm',
        cancelButtonText: 'Cancel',
        reverseButtons: true
    }).then((result) => {
      if (result.value) {
        //Ajax for recovering post
        $.ajax({
          url : 'users/deactivate_admin',
          dataType : 'json',
          type : 'post',
          data : {
            user_id : row.user_admin_id
          },
          beforeSend: function(){
            Swal.fire({
              titleText: 'Deactivating User',
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
  'click .btnActAdmin': function (e, value, row, index) {
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
        title: 'Activate',
        text: "Are you sure you want to activate this admin?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Confirm',
        cancelButtonText: 'Cancel',
        reverseButtons: true
    }).then((result) => {
      if (result.value) {
        //Ajax for recovering post
        $.ajax({
          url : 'users/activate_admin',
          dataType : 'json',
          type : 'post',
          data : {
            user_id : row.user_admin_id
          },
          beforeSend: function(){
            Swal.fire({
              titleText: 'Activating User',
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
  }
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

      if (!validateField("#addAdmin .need-validate")) {
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
        url : 'users/register',
        dataType : 'json',
        type : 'post',
        data : {
          username : $('#username').val(),
          password : $('#password').val()
        },
        beforeSend: function(){
          $('#addAdmin').modal('hide')
          Swal.fire({
            titleText: 'Adding administrator',
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

    })

    $('#btnEdit').click(function(e){
      e.preventDefault();
      
      // Validation if input is not empty
      validated = true;

      if (!validateField("#editPassword .need-validate")) {
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
        url : 'users/admin_pass',
        dataType : 'json',
        type : 'post',
        data : {
          password : $('#password').val(),
          user_id : $('#editPassword').attr('data-post-id')
        },
        beforeSend: function(){
          $('#editPassword').modal('hide')
          Swal.fire({
            titleText: 'Updating Password',
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

    })
  }
);