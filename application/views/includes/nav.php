<nav class="navbar navbar-light" style="background-color: #79d1d5;">
  <div class="container">
  	<a href="<?= base_url(); ?>" class="navbar-brand mb-0 h1 text-white">
	  <img src="<?= base_url() ?>assets/img/w-logo.png" width="30" height="30" class="d-inline-block align-top">
		</a>
		<?php if ($this->session->userdata('SESS_IS_LOGGED')): ?>
			<div class="col-4 mr-auto">
				<!-- <input type="text" name="search" class="form-control form-control-sm rounded-pill" placeholder="Search" /> -->
			</div>
			<div class="form-inline">
				<div class="btn-group" id="global_id" data-id="<?= $this->session->userdata('SESS_USER_ID') ?>">
				  <button type="button" class="btn btn-link btn-sm text-white text-decoration-none" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="outline: none; box-shadow: none;">
				  	<div class="form-inline">
				  		<span class="mr-2 text-decoration-none"><strong><?php echo $this->session->userdata('SESS_USERNAME') ?></strong></span>
					    <svg class="bi bi-person-circle" width="2em" height="2em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
						  <path d="M13.468 12.37C12.758 11.226 11.195 10 8 10s-4.757 1.225-5.468 2.37A6.987 6.987 0 0 0 8 15a6.987 6.987 0 0 0 5.468-2.63z"/>
						  <path fill-rule="evenodd" d="M8 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
						  <path fill-rule="evenodd" d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z"/>
						</svg>
				  	</div>
				  </button>
				  <div class="dropdown-menu dropdown-menu-right">
				    <a class="dropdown-item" href="<?= base_url().$this->session->userdata('SESS_USERNAME') ?>">Profile</a>
				    <a class="dropdown-item" href="<?= base_url() ?>account">Account</a>
				    <div class="dropdown-divider"></div>
				    <a data-toggle="modal" href="#logout" class="dropdown-item text-dark text-decoration-none">Logout</a>
				  </div>
				</div>
			</div>
		<?php endif ?>
  </div>
</nav>

<!-- Logout Modal -->
<div class="modal fade" id="logout" tabindex="-1">
  	<div class="modal-dialog modal-dialog-centered modal-sm">
    	<div class="modal-content">
	      	<div class="modal-header">
	        	<h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
	        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          	<span aria-hidden="true">&times;</span>
	        	</button>
	      	</div>
	      	<div class="modal-body">
	        <?php if ($this->session->userdata('SESS_ROLE') == 'Guest'): ?>
	        	<p>You will not be able to retrieve your posts if you logout as a guest.</p>
        	<?php else: ?>
        		<p>Are you sure you want to log out from your account?</p>
	        <?php endif ?>
	      	</div>
	      	<div class="modal-footer">
	        	<button type="button" class="btn btn-link btn-sm" data-dismiss="modal">Close</button>
	        	<a class="btn btn-danger" href="<?= base_url() ?>logout">Logout</a>
	      	</div>
    	</div>
  	</div>
</div>
<!-- Report Modal -->
<div class="modal fade" id="report" tabindex="-1">
  	<div class="modal-dialog modal-dialog-centered modal-sm">
    	<div class="modal-content">
	      	<div class="modal-header">
	        	<h5 class="modal-title" id="exampleModalLabel">
	        		<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-exclamation-circle-fill mb-1" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                    </svg> Report post
	        	</h5>
	        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          	<span aria-hidden="true">&times;</span>
	        	</button>
	      	</div>
	      	<div class="modal-body">
	        <p>Are you sure you want to report this post?</p>
	      	</div>
	      	<div class="modal-footer">
	        	<button type="button" class="btn btn-link btn-sm" data-dismiss="modal">Close</button>
	        	<button class="btn btn-danger" type="button" id="confirmReportBtn">Confirm</button>
	      	</div>
    	</div>
  	</div>
</div>
<!-- Notice Modal -->
<div class="modal fade" id="notice" tabindex="-1">
  	<div class="modal-dialog modal-dialog-centered modal-lg">
    	<div class="modal-content modal-lg">
	      	<div class="modal-header">
	        	<h5 class="modal-title" id="notice_title"></h5>
	        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          	<span aria-hidden="true">&times;</span>
	        	</button>
	      	</div>
	      	<div class="modal-body">
	      		<div class="mb-5" id="notice_body"></div>
	      		<div class="form-check">
				  	<input class="form-check-input" type="checkbox" value="" id="noticeCheck">
				  	<label class="form-check-label" for="noticeCheck">
				    	Never show again
				  	</label>
				</div>
	      	</div>
	      	<div class="modal-footer">
	        	<button type="button" class="btn btn-warning btn-sm" data-dismiss="modal" id="noticeBtn">Confirm</button>
	      	</div>
    	</div>
  	</div>
</div>