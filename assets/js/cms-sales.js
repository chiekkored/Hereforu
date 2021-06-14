function TableActions (value, row, index) {
  if (row.status == 0) {
    return [
      '<div class="btn-group" role="group">\
          <button type="button" class="btn btn-primary btn-sm btnView"><i class="fa fa-eye"></i><span class="d-none d-md-inline"> View</span></button>\
          <button type="button" class="btn btn-success btn-sm btnPaid"><i class="fa fa-check-circle"></i><span class="d-none d-md-inline"> Paid</span></button>\
      </div>\
      <div class="btn-group" role="group">\
          <form method="POST" action="sales/generate_invoice">\
              <input type="hidden" id="customer_uuid" name="customer_uuid" value="'+row.customer_uuid+'">\
              <input type="hidden" id="date_created" name="date_created" value="'+row.date_created+'">\
              <button type="submit" class="btn btn-secondary btn-sm"><i class="fa fa-file"></i><span class="d-none d-md-inline"> Generate Invoice</span></button>\
          </form>\
      </div>'
      ].join('');
  } else {
    return [
      '<div class="btn-group" role="group">\
          <button type="button" class="btn btn-primary btn-sm btnView"><i class="fa fa-eye"></i><span class="d-none d-md-inline"> View</span></button>\
      </div>\
      <div class="btn-group" role="group">\
          <form method="POST" action="sales/generate_invoice">\
              <input type="hidden" id="customer_uuid" name="customer_uuid" value="'+row.customer_uuid+'">\
              <input type="hidden" id="date_created" name="date_created" value="'+row.date_created+'">\
              <button type="submit" class="btn btn-secondary btn-sm"><i class="fa fa-file"></i><span class="d-none d-md-inline"> Generate Invoice</span></button>\
          </form>\
      </div>'
      ].join('');
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

var sales_today = 0;

function Price (value, row, index) {
  var val = parseFloat(value);
  sales_today += val;
  $('#sales_today').html('₱ ' + Number(sales_today).toLocaleString());

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

window.operateEvents = {
  'click .btnView': function (e, value, row, index) {
      e.preventDefault();

      //Ajax for recovering post
      $.ajax({
        url : 'sales/view_sales_customer',
        dataType : 'json',
        type : 'post',
        data : {
          customer_uuid : row.customer_uuid,
          date_created : row.date_created
        },
        success : function(data, textStatus, jqXHR) {

          $('#viewSalesCustomer #sales_table').html('');

          $('#viewSalesCustomer #customer_name').html(data[0].name);
          $('#viewSalesCustomer #date_sales').html(data[0].date_created);

          grandTotal = 0;
          for (var i = 0; i < data.length; i++) {
            grandTotal = parseFloat(data[i].price) + grandTotal;
            count = i+1
            $('#viewSalesCustomer #sales_table').append('<div class="col-6">\
                                                          <span>'+count+'. '+data[i].mine_code+'</span>\
                                                        </div>\
                                                        <div class="col-6">\
                                                          <span>₱ '+Number(data[i].price).toLocaleString(undefined, {minimumFractionDigits: 2})+'</span>\
                                                        </div>');
          }
          $('#viewSalesCustomer #grand_total').html('₱ '+Number(grandTotal).toLocaleString(undefined, {minimumFractionDigits: 2}));
          // $('#viewPost #link').html('<a class="text-info" href="http://hereforu.com/hereforyou/'+data.username+'/'+data.p_slug+'" target="_blank">[Link]</a>');
          // if (data.p_status == 0) {
          //   $('#viewPost #status').html('<span class="badge badge-success">Active</span>');
          // } else {
          //   $('#viewPost #status').html('<span class="badge badge-danger">Deleted</span>');
          // }
          
          // $('#viewPost #username').html('<a class="text-info" href="http://hereforu.com/hereforyou/'+data.username+'" target="_blank">'+data.username+'</a>');
          // $('#viewPost #supports').html(data.psic);
          // $('#viewPost #created_on').html(data.p_date_created);
          // $('#viewPost #views').html(data.pvic);
          // $('#viewPost #tags').html(data.p_tags);
          // $('#viewPost #reads').html(data.pric);
          // $('#viewPost #content_body').html(data.p_content);

          $('#viewSalesCustomer').modal('show');
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
            url : 'sales/paid',
            dataType : 'json',
            type : 'post',
            data : {
              customer_uuid : row.customer_uuid,
              date_created : row.date_created 
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
              $('#tblSales').bootstrapTable('refresh', {silent: true})
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
    'click .btnGenerate': function (e, value, row, index) {
      e.preventDefault();

      $.ajax({
        url : 'sales/generate_invoice',
        dataType : 'json',
        type : 'post',
        data : {
          customer_uuid : row.customer_uuid
        },
        success : function(data, textStatus, jqXHR) {

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
}

$(document).ready(
  function() {

    $('#tblSales').bootstrapTable('filterBy', {date_created: $('#sales_date').val()})

    $('#sales_date').change(function(e){
      sales_today = 0
      $('#sales_today').html('₱ ' + Number(sales_today).toLocaleString());

      $('#tblSales').bootstrapTable('filterBy', {date_created: $('#sales_date').val()})
    })

    console.log($('#tblSales').bootstrapTable('getData'))
});
