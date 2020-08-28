<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3 text-lg-center" href="#">
    <img class="mb-1" src="assets/img/logo.png" width="23" height="23"> HereForU</a>
  </a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <ul class="navbar-nav px-3">
    <li class="nav-item form-inline">
      <a class="nav-link mx-2" data-toggle="modal" href="#changepass"><i class="fa fa-key"></i></a>
      <a class="nav-link mx-2" href="logout"><i class="fa fa-sign-out"></i></a>
    </li>
  </ul>
</nav>


<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item my-1">
            <a class="nav-link <?php if($this->uri->uri_string() === "" || $this->uri->segment(1) === "dashboard") : ?>active<?php endif; ?>" href="dashboard">
              <span data-feather="home"></span>
              <small class="text-muted mx-2">Dashboard</small>
              <!-- <span class="badge badge-secondary float-right mt-1">3</span> -->
            </a>
          </li>
          <li class="nav-item my-1">
            <a class="nav-link <?php if($this->uri->segment(1) === "posts") : ?>active<?php endif; ?>" href="posts">
              <span data-feather="edit"></span>
              <small class="text-muted mx-2">Posts</small>
            </a>
          </li>
          <li class="nav-item my-1">
            <a class="nav-link <?php if($this->uri->segment(1) === "reports") : ?>active<?php endif; ?>" href="reports">
              <span data-feather="alert-triangle"></span>
              <small class="text-muted mx-2">Reports</small>
            </a>
          </li>
          <li class="nav-item my-1">
            <a class="nav-link <?php if($this->uri->segment(1) === "users") : ?>active<?php endif; ?>" href="users">
              <span data-feather="users"></span>
              <small class="text-muted mx-2">Users</small>
            </a>
          </li>
          <li class="nav-item my-1">
            <a class="nav-link <?php if($this->uri->segment(1) === "logs") : ?>active<?php endif; ?>" href="logs">
              <span data-feather="file-text"></span>
              <small class="text-muted mx-2">Logs</small>
            </a>
          </li>
        </ul>
      </div>
    </nav>
<div class="modal fade" tabindex="-1" role="dialog" id="changepass">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Change Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="change_pass" novalidate>
          <div class="form-group">
            <label for="password">Current Password</label>
            <input type="password" class="form-control need-validate" id="cur_password">
          </div>
          <div class="form-group">
            <label for="password">New Password</label>
            <input type="password" class="form-control need-validate" id="admin_password">
          </div>
          <div class="form-group">
            <label for="conf_password">Confirm Password</label>
            <input type="password" class="form-control need-validate" id="conf_admin_password">
            <small class="text-danger" id="pwChangeValidate">Password does not match.</small>
          </div>
      </div>
      </form>
      <div class="modal-footer">
        <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-info" id="btnChange">Submit</button>
      </div>
    </div>
  </div>
</div>
        <main class="col-md-9 ml-sm-auto col-lg-10 px-md-4">