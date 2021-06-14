<div class="modal fade" tabindex="-1" role="dialog" id="addMiner">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Miner</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="add_post" novalidate>
        <div class="row">
          <div class="col-12">
            <div class="row">
              <div class="col-12">
                <div class="form-group">
                  <label for="type">Customer Name</label>
                  <div class="form-check form-check-inline float-right">
                    <label class="form-check-label mb-1 text-muted" for="is_new"><small>New Customer?</small></label>
                    <input class="form-check-input mx-1" type="checkbox" id="is_new">
                  </div>
                  <div id="customer_name_dropdown">
                    <select class="form-control need-validate" id="customer_dropdown" required>
                      <option value="" selected disabled></option>
                    </select>
                  </div>
                  <div id="customer_name_input">
                    <input type="text" class="form-control need-validate-new" id="customer_name" required>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label for="type">Mine Code</label>
                  <input type="text" class="form-control need-validate" id="mine_code" required>
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label for="price">Price</label>
                  <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">₱</span>
                      </div>
                    <input type="number" pattern="\d*" class="form-control need-validate" id="price" required>
                    <div class="input-group-append">
                        <span class="input-group-text">.00</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      </form>
      <div class="modal-footer">
        <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success" id="addBtn">Add</button>
      </div>
    </div>
  </div>
</div>