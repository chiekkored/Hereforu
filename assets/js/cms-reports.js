function TableActions (value, row, index) {
  if (row.p_status != 2) {
    if (row.r_status == 0) {
      return [
        '<div class="btn-group" role="group">\
            <button type="button" class="btn btn-primary btn-sm btnView"><i class="fa fa-eye"></i><span class="d-none d-md-inline"> View</span></button>\
            <button type="button" class="btn btn-secondary btn-sm btnDeny"><i class="fa fa-minus-square"></i><span class="d-none d-md-inline"> Deny</span></button>\
            <button type="button" class="btn btn-danger btn-sm btnRemove"><i class="fa fa-trash"></i><span class="d-none d-md-inline"> Remove</span></button>\
        </div>'
        ].join('');
      } else if (row.r_status == 1) {

        return ['<i class="badge badge-secondary">Denied Report</i>'].join('');

      } else if (row.r_status == 2) {

        return ['<i class="badge badge-success">Post Removed</i>'].join('');
      }
  } else {

    return ['<i class="badge badge-success">Post Removed</i>'].join('');
  }
}

function TableBugsActions (value, row, index) {
  if (row.rb_status == 0) {
    return [
      '<div class="btn-group" role="group">\
          <button type="button" class="btn btn-success btn-sm btnDone"><i class="fa fa-check"></i><span class="d-none d-md-inline"> Fixed</span></button>\
      </div>'
      ].join('');
  } else {
    return [
      '<i class="badge badge-success">Bug Removed</i>'
      ].join('');
  }
}

function Username (value, row, index) {
  return [
      '<a href="http://hereforu.com/hereforyou/'+row.username+'" target="_blank">'+row.username+'</a>'
  ].join('');
}

window.operateEvents = {
  'click .btnView': function (e, value, row, index) {
      e.preventDefault();

      //Ajax for recovering post
      $.ajax({
        url : 'reports/view_post',
        dataType : 'json',
        type : 'post',
        data : {
          post_id : row.post_id
        },
        success : function(data, textStatus, jqXHR) {
          
          $('#viewPost #content_title').html(data.p_title);
          $('#viewPost #link').html('<a class="text-info" href="http://hereforu.com/hereforyou/'+data.username+'/'+data.p_slug+'" target="_blank">[Link]</a>');
          if (data.p_status == 0) {
            $('#viewPost #status').html('<span class="badge badge-success">Active</span>');
          } else {
            $('#viewPost #status').html('<span class="badge badge-danger">Deleted</span>');
          }
          
          $('#viewPost #username').html('<a class="text-info" href="http://hereforu.com/hereforyou/'+data.username+'" target="_blank">'+data.username+'</a>');
          $('#viewPost #supports').html(data.psic);
          $('#viewPost #created_on').html(data.p_date_created);
          $('#viewPost #views').html(data.pvic);
          $('#viewPost #tags').html(data.p_tags);
          $('#viewPost #reads').html(data.pric);
          $('#viewPost #content_body').html(data.p_content);

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
  'click .btnDeny': function (e, value, row, index) {
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
          title: 'Deny',
          text: "Are you sure you want to deny this report?",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Confirm',
          cancelButtonText: 'Cancel',
          reverseButtons: true
      }).then((result) => {
        if (result.value) {
          //Ajax for deleting event
          $.ajax({
            url : 'reports/deny_report',
            dataType : 'json',
            type : 'post',
            data : {
              report_id : row.report_id
            },
            beforeSend: function(){
              Swal.fire({
                titleText: 'Denying Report',
                onBeforeOpen: () => {
                  Swal.showLoading()
                }
              })
             },
            success : function(data, textStatus, jqXHR) {
              Swal.close();
              $('#tblReports').bootstrapTable('refresh', {silent: true})
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
          title: 'Deny',
          text: "Are you sure you want to deny this report?",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Confirm',
          cancelButtonText: 'Cancel',
          reverseButtons: true
      }).then((result) => {
        if (result.value) {
          //Ajax for deleting event
          $.ajax({
            url : 'reports/remove_report',
            dataType : 'json',
            type : 'post',
            data : {
              report_id : row.report_id,
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
              $('#tblReports').bootstrapTable('refresh', {silent: true})
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

window.bugEvents = {
  'click .btnDone': function (e, value, row, index) {
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
          title: 'Bug Report',
          text: "Toggle bug report done?",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Confirm',
          cancelButtonText: 'Cancel',
          reverseButtons: true
      }).then((result) => {
        if (result.value) {
          //Ajax for deleting event
          $.ajax({
            url : 'reports/bug_done',
            dataType : 'json',
            type : 'post',
            data : {
              report_bug_id : row.report_bug_id
            },
            beforeSend: function(){
              Swal.fire({
                titleText: 'Toggling Report',
                onBeforeOpen: () => {
                  Swal.showLoading()
                }
              })
             },
            success : function(data, textStatus, jqXHR) {
              Swal.close();
              $('#tblBugs').bootstrapTable('refresh', {silent: true})
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
