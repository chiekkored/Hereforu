<?php $this->load->view('includes/cms/header'); ?>
<?php $this->load->view('includes/cms/nav'); ?>
<?php $this->load->view('includes/cms/modals/reports/view'); ?>
<div class="pt-3 pb-2 mb-3 border-bottom">
	<h2>Reports</h2>
</div>
<div class="row">
  <div class="col-lg-6 mb-3">
    <div class="card bg-light">
      <div class="card-body">
        <h6><small><strong class="text-muted">REPORTED POSTS</strong></small></h6>
        <table
          class="table table-borderless table-striped table-sm"
          id="tblReports"
          data-toggle="table"
          data-search="true"
          data-pagination="true"
          data-auto-refresh="true"
          data-auto-refresh-interval="8"
          data-auto-refresh-silent="true"
          data-url="reports/posts">
          <thead>
            <tr>
              <th data-field="p_title" data-width="300">Title</th>
              <th data-field="username">Reported By</th>
              <th data-field="r_created_on">Reported On</th>
              <th data-field="operate" data-formatter="TableActions" data-events="operateEvents">Action</th>
            </tr>
          </thead>
        </table>
      </div>
    </div>
  </div>
  <div class="col-lg-6">
    <div class="card bg-light">
      <div class="card-body">
        <h6><small><strong class="text-muted">REPORTED BUGS</strong></small></h6>
        <table
          class="table table-borderless table-striped table-sm"
          id="tblBugs"
          data-toggle="table"
          data-search="true"
          data-url="reports/bugs">
          <thead>
            <tr>
              <th data-field="rb_content" data-width="300">Content</th>
              <th data-formatter="Username">Reported By</th>
              <th data-field="operate" data-formatter="TableBugsActions" data-events="bugEvents">Action</th>
            </tr>
          </thead>
        </table>
      </div>
    </div>
  </div>
</div>
<?php $this->load->view('includes/cms/footer'); ?>