<?php $this->load->view('includes/cms/header'); ?>
<div class="container">
	<div class="row vh-100 d-flex justify-content-center align-items-center">
		<div class="col-lg-12 text-center">
			<div class="row">
				<div class="col-12">
					<img src="assets/img/logo-w.png" class="img-fluid mb-4" width="72" height="72">
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<h2><strong>Sign In</strong></h2>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<p>ADMINISTRATOR PANEL</p>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<form action="login" class="form-signin" novalidate>
					<div class="alert" id="auth_alert">
			  		</div>
					<label for="username" class="sr-only">Username</label>
				  	<input type="email" id="username" class="form-control" placeholder="Username" required autofocus>
				  	<label for="password" class="sr-only">Password</label>
				  	<input type="password" id="password" class="form-control" placeholder="Password" required>
				  	<button class="btn btn-lg btn-primary btn-block my-3" type="submit" id="btnLogin">Sign in</button>
				  	<p class="mt-5 mb-3 text-muted">&copy; Here For U</p>
					<?= form_close() ?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $this->load->view('includes/cms/footer'); ?>