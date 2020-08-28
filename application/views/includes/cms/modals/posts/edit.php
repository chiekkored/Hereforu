<div class="modal fade" tabindex="-1" role="dialog" id="editPost">
  <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Post</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="edit_post" novalidate>
        <div class="row">
          <div class="col-12">
            <div class="row">
              <div class="col-8">
                <div class="form-group">
                  <label for="exampleFormControlInput1">Title</label>
                  <input type="text" class="form-control need-validate" id="titleEdit" placeholder="Title" required>
                </div>
              </div>
              <div class="col-4">
                <div class="form-group">
                  <label for="exampleFormControlInput1">Post Type</label>
                  <select class="form-control" id="typeEdit">
                    <option value="3">Pinned Post</option>
                    <option value="2" disabled>❌Featured Post (Side panel & Top card mobile)</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="form-group">
                  <label for="exampleFormControlTextarea1">Example textarea</label>
                  <textarea class="form-control need-validate" id="contentEdit" rows="5" required></textarea>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      </form>
      <div class="modal-footer">
        <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-info" id="editBtn">Edit</button>
      </div>
    </div>
  </div>
</div>