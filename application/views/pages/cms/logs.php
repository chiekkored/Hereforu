<?php $this->load->view('includes/cms/header'); ?>
<?php $this->load->view('includes/cms/nav'); ?>
<div class="pt-3 pb-2 mb-3 border-bottom">
  <div class="row justify-content-between align-items-center">
    <div class="col">
      <h2 class="font-weight-bold">Logs</h2>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-lg-12 mb-3">
    <div class="card bg-light">
      <div class="card-body">
        <h6><small><strong class="text-muted">LOG RECORDS</strong></small></h6>
        <small>
          <table
            class="table table-borderless table-striped table-sm"
            id="tblLogs"
            data-toggle="table"
            data-pagination="true"
            data-page-size="25"
            data-url="logs/get_all">
            <thead>
              <tr>
                <th data-field="created_on" data-width="200">Date</th>
                <th data-field="content">Content</th>
              </tr>
            </thead>
          </table>
        </small>
      </div>
    </div>
  </div>
</div>
<?php $this->load->view('includes/cms/footer'); ?>