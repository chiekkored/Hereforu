<div class="modal fade" tabindex="-1" role="dialog" id="editPassword">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="edit_post" novalidate>
          <div class="form-group">
            <label for="password">New Password</label>
            <input type="password" class="form-control need-validate" id="password">
          </div>
          <div class="form-group">
            <label for="conf_password">Confirm Password</label>
            <input type="password" class="form-control need-validate" id="conf_password">
            <small class="text-danger" id="pwValidate">Password does not match.</small>
          </div>
      </div>
      </form>
      <div class="modal-footer">
        <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-info" id="btnEdit">Edit</button>
      </div>
    </div>
  </div>
</div>