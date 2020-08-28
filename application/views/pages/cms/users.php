<?php $this->load->view('includes/cms/header'); ?>
<?php $this->load->view('includes/cms/nav'); ?>
<?php $this->load->view('includes/cms/modals/users/add'); ?>
<?php $this->load->view('includes/cms/modals/users/edit'); ?>
<div class="pt-3 pb-2 mb-3 border-bottom">
	<h2>Users</h2>
  <ul class="nav nav-pills">
      <li class="nav-item nav-item-h mr-3">
        <a class="nav-link text-dark active" data-toggle="list" href="#users" role="tab"><i class="fa fa-users fa-2x"></i></a>
      </li>
    <li class="nav-item nav-item-h mr-3">
        <a class="nav-link text-dark" data-toggle="list" href="#admins" role="tab"><i class="fa fa-user-secret fa-2x"></i></a>
      </li>
  </ul>
</div>

<div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade show active" id="users" role="tabpanel">
      <div class="row">
        <div class="col-lg-12 mb-3">
          <div class="card bg-light">
            <div class="card-body">
              <h6><small><strong class="text-muted">USERS</strong></small></h6>
              <div id="users_toolbar">
                  <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <label class="btn btn-primary active">
                      <input type="radio" id="no_guests" checked><i class="mb-1" data-feather="user-x"></i><span class="d-none d-md-inline"> No Guests</span>
                    </label>
                    <label class="btn btn-primary">
                      <input type="radio" id="all_users"><i class="mb-1" data-feather="users"></i><span class="d-none d-md-inline"> All Users</span>
                    </label>
                  </div>
                </div>
              <table
                class="table table-borderless table-striped table-sm"
                id="tblUsers"
                data-toggle="table"
                data-search="true"
                data-toolbar="#users_toolbar"
                data-pagination="true"
                data-auto-refresh="true"
                data-auto-refresh-interval="60"
                data-auto-refresh-silent="true"
                data-url="users/users">
                <thead>
                  <tr>
                    <th data-field="psic" data-sortable="true" data-width="30"><i data-feather="heart"></i></th>
                    <th data-formatter="Username" data-width="400">Username</th>
                    <th data-formatter="Ip_address">IP Address</th>
                    <th data-formatter="U_created_on">Created On</th>
                    <th data-field="operate" data-formatter="TableActions" data-events="operateEvents">Action</th>
                  </tr>
                </thead>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="tab-pane fade" id="admins" role="tabpanel">

      <div class="row">
        <div class="col-lg-12 mb-3">
          <div class="card bg-light">
            <div class="card-body">
              <h6><small><strong class="text-muted">ADMINISTRATORS</strong></small></h6>
              <div id="admin_toolbar">
                <?php if ($this->session->userdata('SESS_ROLE') == 'Superadmin'): ?>
                  <button class="btn btn-success" data-toggle="modal" data-target="#addAdmin">
                    <i class="mb-1" data-feather="plus-circle"></i><span class="d-none d-md-inline"> Add Admin</span>
                  </button>
                <?php endif ?>
              </div>
              <table
                class="table table-borderless table-striped table-sm"
                id="tblAdmin"
                data-toggle="table"
                data-search="true"
                data-toolbar="#admin_toolbar"
                data-pagination="true"
                data-url="users/admin">
                <thead>
                  <tr>
                    <th data-field="username" data-width="400">Username</th>
                    <th data-field="created_on">Created On</th>
                    <th data-field="created_by">Created By</th>
                    <th data-field="admin_role">Role</th>
                    <?php if ($this->session->userdata('SESS_ROLE') == 'Superadmin'): ?>
                      <th data-field="operate" data-formatter="TableAdminActions" data-events="operateadminEvents">Action</th>
                    <?php endif ?>
                  </tr>
                </thead>
              </table>
            </div>
          </div>
        </div>
    </div>
</div>
<?php $this->load->view('includes/cms/footer'); ?>