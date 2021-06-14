<div class="modal fade" tabindex="-1" role="dialog" id="viewSalesCustomer">
  <div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">View Sales</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-12"> 
            <h3 id="customer_name"></h3>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <small class="font-italic text-muted"><i class="fa fa-calendar"></i> <span id="date_sales"></span></small>
          </div>
        </div>
        <div class="dropdown-divider"></div>
        <div class="row">
          <div class="col-12"> 
            <small><b class="text-muted">Sales List/s</b></small>
          </div>
        </div>
        <div class="row my-3" id="sales_table">
        </div>
        <div class="row">
          <div class="col-6">
          </div>
          <div class="col-6">
            <div class="dropdown-divider"></div>
          </div>
        </div>
        <div class="row">
          <div class="col-6">
            <span class="float-right font-weight-bold">Grand Total: </span>
          </div>
          <div class="col-6">
            <span class="font-weight-bold" id="grand_total"></span>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>