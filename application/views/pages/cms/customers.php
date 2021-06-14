<?php $this->load->view('includes/cms/header'); ?>
<?php $this->load->view('includes/cms/nav'); ?>
<?php $this->load->view('includes/cms/modals/customers/view'); ?>
<?php $this->load->view('includes/cms/modals/customers/add'); ?>
<?php $this->load->view('includes/cms/modals/customers/edit'); ?>
<div class="pt-3 pb-2 mb-3 border-bottom">
	<h2 class=" font-weight-bold">Customers</h2>
  <!-- <ul class="nav nav-pills">
      <li class="nav-item nav-item-h mr-3">
        <a class="nav-link text-dark active" data-toggle="list" href="#users" role="tab"><i class="fa fa-users fa-2x"></i></a>
      </li>
    <li class="nav-item nav-item-h mr-3">
        <a class="nav-link text-dark" data-toggle="list" href="#admins" role="tab"><i class="fa fa-user-secret fa-2x"></i></a>
      </li>
  </ul> -->
</div>

<!-- <div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade show active" id="users" role="tabpanel">
      <div class="row">
        <div class="col-lg-12 mb-3">
          <div class="card bg-light">
            <div class="card-body">
              <h6><small><strong class="text-muted">CUSTOMERS</strong></small></h6>
              <div id="users_toolbar">
                  <button type="button" class="btn btn-success" data-toggle="modal"
                data-target="#addUser"><i class="mb-1" data-feather="user-plus"></i> Add Customer</button>
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
    </div> -->

      <div class="row">
        <div class="col-lg-12 mb-3">
          <div class="card bg-light">
            <div class="card-body">
              <h6><small><strong class="text-muted">CUSTOMERS</strong></small></h6>
              <div id="admin_toolbar">
                  <button class="btn btn-success" data-toggle="modal" data-target="#addCustomer">
                    <i class="mb-1" data-feather="user-plus"></i><span class="d-none d-md-inline"> Add Customer</span>
                  </button>
              </div>
              <table
                class="table table-borderless table-striped table-sm"
                id="tblCustomer"
                data-toggle="table"
                data-search="true"
                data-sortable="true"
                data-toolbar="#admin_toolbar"
                data-pagination="true"
                data-url="customers/get_all">
                <thead class="thead-dark">
                  <tr>
                    <th data-field="name" data-width="200" data-sortable="true">Name</th>
                    <th data-field="address" data-formatter="Address">Address</th>
                    <th data-field="fb_link" data-formatter="Fb_link">Facebook Link</th>
                    <th data-field="phone_num">Phone Number</th>
                    <th data-field="operate" data-formatter="TableActions" data-events="operateEvents">Action</th>
                  </tr>
                </thead>
              </table>
            </div>
          </div>
        </div>
    </div>
<?php $this->load->view('includes/cms/footer'); ?>