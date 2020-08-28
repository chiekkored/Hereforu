<?php $this->load->view('includes/cms/header'); ?>
<?php $this->load->view('includes/cms/nav'); ?>
<?php $this->load->view('includes/cms/modals/posts/add'); ?>
<?php $this->load->view('includes/cms/modals/posts/view'); ?>
<?php $this->load->view('includes/cms/modals/posts/edit'); ?>
<div class="pt-3 pb-2 mb-3 border-bottom">
	<h2>Posts</h2>
	<ul class="nav nav-pills">
	  	<li class="nav-item nav-item-h mr-3">
	    	<a class="nav-link text-dark active" data-toggle="list" href="#post-pinned" role="tab"><i class="fa fa-user-secret fa-2x"></i></a>
  		</li>
		<li class="nav-item nav-item-h mr-3">
    		<a class="nav-link text-dark" data-toggle="list" href="#post-all" role="tab"><i class="fa fa-users fa-2x"></i></a>
  		</li>
	</ul>
</div>
<div class="tab-content" id="nav-tabContent">
  	<div class="tab-pane fade show active" id="post-pinned" role="tabpanel">
      <div class="card bg-light">
        <div class="card-body">
          <h6><small><strong class="text-muted">ADMINISTRATOR'S POSTS</strong></small></h6>
          <div id="toolbar">
            <button class="btn btn-success" data-toggle="modal" data-target="#addPost">
              <i class="mb-1" data-feather="plus-circle"></i><span class="d-none d-md-inline"> Add post</span>
            </button>
          </div>
          <table
            class="table table-borderless table-striped table-sm"
            id="tblAdmin"
            data-toggle="table"
            data-toolbar="#toolbar"
            data-search="true"
            data-url="posts/admin">
            <thead>
              <tr>
                <th data-formatter="Index">ID</th>
                <th data-field="sm_title" data-width="300">Title</th>
                <th data-formatter="Type">Post Type</th>
                <th data-field="c_sm_created_on">Created On</th>
                <th data-field="sm_created_by">Created By</th>
                <th data-field="operate" data-formatter="TableActions" data-events="operateEvents">Action</th>
              </tr>
            </thead>
          </table>
        </div>
      </div>
  	</div>
  	<div class="tab-pane fade" id="post-all" role="tabpanel">
  		<div class="card bg-light">
        <div class="card-body">
          <h6><small><strong class="text-muted">USER'S POSTS</strong></small></h6>
          <div id="users_toolbar">
            <div class="btn-group btn-group-toggle" data-toggle="buttons">
              <label class="btn btn-primary active">
                <input type="radio" id="no_deleted" checked><i class="mb-1" data-feather="file-minus"></i><span class="d-none d-md-inline"> Hide Deleted</span>
              </label>
              <label class="btn btn-primary">
                <input type="radio" id="all_posts"><i class="mb-1" data-feather="file-plus"></i><span class="d-none d-md-inline"> All Posts</span>
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
            data-auto-refresh-interval="8"
            data-auto-refresh-silent="true"
            data-url="posts/users">
            <thead>
              <tr>
                <th data-field="pvic" data-width="10" data-sortable="true"><i data-feather="eye"></i></th>
                <th data-field="pric" data-width="10" data-sortable="true"><i data-feather="book-open"></i></th>
                <th data-field="psic" data-width="10" data-sortable="true"><i data-feather="heart"></i></th>
                <th data-formatter="Title" data-width="300">Title</th>
                <th data-formatter="Username" data-width="100">Written by</th>
                <th data-formatter="P_date_created">Date Created</th>
                <th data-field="operate" data-formatter="TableUserActions" data-events="postEvents">Action</th>
              </tr>
            </thead>
          </table>
        </div>
      </div>
  	</div>
</div>
<?php $this->load->view('includes/cms/footer'); ?>