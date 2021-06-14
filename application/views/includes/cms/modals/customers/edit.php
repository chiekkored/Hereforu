<div class="modal fade" tabindex="-1" role="dialog" id="editCustomer">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Customer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" novalidate>
          <div class="form-group">
            <label for="editName">Customer Name</label>
            <input type="text" class="form-control need-validate" id="editName" disabled />
          </div>
          <div class="form-group">
            <label for="editFb_link">Facebook Link</label>
            <input type="text" class="form-control need-validate" id="editFb_link" required />
          </div>
          <div class="form-group">
            <label for="editPhone_num">Phone Number</label>
            <input type="text" class="form-control need-validate" id="editPhone_num" required />
          </div>
          <div class="form-group">
            <label for="editAddress">Address</label>
            <input type="text" class="form-control need-validate" id="editAddress" required />
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-link" data-dismiss="modal"><small>Close</small></button>
        <button type="button" class="btn btn-warning" id="btnEdit">Edit</button>
      </div>
    </div>
  </div>
</div>