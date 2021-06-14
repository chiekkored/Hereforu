<div class="modal fade" tabindex="-1" role="dialog" id="addCustomer">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="mb-1" data-feather="user-plus"></i> Add Customer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" novalidate>
          <div class="form-group">
            <label for="name">Customer Name</label>
            <input type="text" class="form-control need-validate" id="name" required />
          </div>
          <div class="form-group">
            <label for="fb_link">Facebook Link</label>
            <input type="text" class="form-control need-validate" id="fb_link" required />
          </div>
          <div class="form-group">
            <label for="phone_num">Phone Number</label>
            <input type="text" class="form-control need-validate" id="phone_num" required />
          </div>
          <div class="form-group">
            <label for="address">Address</label>
            <input type="text" class="form-control need-validate" id="address" required />
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-link" data-dismiss="modal"><small>Close</small></button>
        <button type="button" class="btn btn-success" id="btnAdd">Add</button>
      </div>
    </div>
  </div>
</div>