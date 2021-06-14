
        var daily_sales_options = {
          chart: {
            type: 'line',
            toolbar: {
                show: false,
              },
          },
          series: [{
            name: 'sales',
            data: [30,40,35,50,49,60,70,91,125]
          }],
          xaxis: {
            categories: [1991,1992,1993,1994,1995,1996,1997, 1998,1999]
          }
        }

var daily_miners_options = {
  chart: {
    type: 'bar',
    toolbar: {
        show: false,
      },
  },
  series: [{
    name: 'sales',
    data: [30,40,35,50,49,60,70,91,125]
  }],
  xaxis: {
    categories: [1991,1992,1993,1994,1995,1996,1997, 1998,1999]
  }
}

$(document).ready(
  function() {

    $.ajax({
      url : 'dashboard/get_daily_sales',
      dataType : 'json',
      type : 'get',
      success : function(data, textStatus, jqXHR) {
        var prices = [];

        for (var i = 0; i < data.length; i++) {
          if (data[i].price) {
            prices.push(Number(data[i].price));
          } else {
            prices.push(0);
          }
        }
        console.log(prices);
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


    var daily_sales = new ApexCharts(document.querySelector("#daily_sales"), daily_sales_options);
    var daily_miners = new ApexCharts(document.querySelector("#daily_miners"), daily_miners_options);

    daily_sales.render();
    daily_miners.render();
  }
);
