<div class="modal fade" tabindex="-1" role="dialog" id="viewCustomer">
  <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">View Customer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row d-flex justify-content-between">
          <div class="col-6"> 
            <h3 id="customer_name"></h3>
          </div>
          <div class="col-6">
            <span class="float-right"><a id="phone_num" target="_blank" href=""><i class="fa fa-phone-square fa-2x text-success"></i></a> <a id="fb_link" target="_blank" href=""><i class="fa fa-facebook-square fa-2x text-primary"></i></a></span>
          </div>
        </div>
        <div class="mb-3 row">
          <div class="col-12"> 
            <small class="font-italic" id="address"></small>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <small>
              <table class="table table-striped table-sm"
              id="customer_sales"
              data-group-by="true"
              data-group-by-field="date_created">
                <thead>
                  <tr>
                    <th data-field="date_created" data-formatter="Date_created">Date Created</th>
                    <th data-field="mine_code">Code</th>
                    <th data-field="price" data-formatter="Price">Price</th>
                    <th data-formatter="Status" data-width="25">Status</th>
                    <th data-field="operate" data-formatter="CustomerViewActions" data-events="operateCustomerEvents">Action</th>
                  </tr>
                </thead>
              </table>
            </small>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>