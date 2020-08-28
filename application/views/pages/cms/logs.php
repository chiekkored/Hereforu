<?php $this->load->view('includes/cms/header'); ?>
<?php $this->load->view('includes/cms/nav'); ?>
<div class="pt-3 pb-2 mb-3 border-bottom">
	<h2>Logs</h2>
</div>
<div class="row">
  <div class="col-12 my-3">
    <div class="card bg-light">
      <div class="card-body">
        <h6><small><strong class="text-muted">ACTIVITY LOGS</strong></small></h6>
        <table
          class="table table-borderless table-striped table-sm"
          id="tblLogs"
          data-toggle="table"
          data-search="true"
          data-pagination="true"
          data-url="logs/get">
          <thead>
            <tr>
              <th data-field="created_on">Date</th>
              <th data-field="content">Activity</th>
            </tr>
          </thead>
        </table>
      </div>
    </div>
  </div>
</div>
<?php $this->load->view('includes/cms/footer'); ?>