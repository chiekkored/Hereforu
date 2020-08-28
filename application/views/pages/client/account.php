<?php $this->load->view('includes/header'); ?>
<?php $this->load->view('includes/nav'); ?>

<div class="container">
	<div class="row">
		<div class="col-lg-8 col-sm-12">
			<div class="card mx-3 mt-3">
				<div class="card-body">
					<div class="row">
						<div class="col-12">
							<h5 class="text-muted">
								<strong>Account</strong>
							</h5>
						</div>
					</div>
				</div>
			</div>
			<div class="card mx-3 my-3">
				<div class="card-body">
					<h6 class="card-title text-muted">
						<div class="row">
							<div class="col-7">
								<strong>Change password</strong>
							</div>
							<div class="col-5">
								<small><div class="alert" id="auth_alert" role="alert" style="padding: .25rem 1.25rem !important; margin-bottom: 0rem;"></div></small>
							</div>
						</div>
					</h6>
					<div class="dropdown-divider"></div>
					<div class="row my-3">
						<small class="col-12">
							<form novalidate>
						  	<div class="form-group">
						    	<label for="cur_password">Current Password</label>
							    <input type="password" class="form-control form-control-sm need-validate" id="cur_password" required>
						  	</div>
						  	<div class="form-group">
						    	<label for="password">Password</label>
							    <input type="password" class="form-control form-control-sm need-validate" id="password" required>
						  	</div>
						  	<div class="form-group">
							    <label for="conf_password">Confirm Password</label>
							    <input type="password" class="form-control form-control-sm need-validate" id="conf_password" required>
							    <small class="text-danger" id="pwValidate">Password does not match.</small>
						  	</div>
						  	<button type="submit" class="btn btn-primary" id="btnSubmit">Submit</button>
							<?= form_close() ?>
						</small>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-4 d-none d-lg-block">
			<div class="card mx-1 my-3">
				<div class="card-body">
					<div class="list-group list-group-flush">
						<a class="list-group-item list-group-item-action" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Account</a>
					</div>
				</div>
			</div>
			<div id="footer-panel">
				<div class="row">
					<div class="col-12">
						<small class="d-flex justify-content-center text-muted">
							<span class="mx-3">Privacy</span>
							<span class="mx-3">Terms</span>
							<span class="mx-3">Developer</span>
							<a href="<?= base_url() ?>report" class="text-muted mx-3">Report a bug</a>
						</small>
					</div>
				</div>
				<div class="row mt-2">
					<div class="col-12">
						<small class="d-flex justify-content-center text-muted">
							<span>HereForU 2020</span>
						</small>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $this->load->view('includes/footer'); ?>