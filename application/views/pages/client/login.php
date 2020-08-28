<?php $this->load->view('includes/header'); ?>
<div class="home">
	<nav class="navbar navbar-light fixed-top" style="background-color: #79d1d5;">
	  <a href="<?= base_url(); ?>" class="navbar-brand mb-0 h1 text-white">
	  <img src="assets/img/logo-w.png" width="30" height="30" class="d-inline-block align-top">
		HereforU</a>
	</nav>
	<div class="container">
		<div class="row vh-100 d-flex justify-content-center align-items-center">
			<div class="col-lg-6 px-lg-5">
				<div class="card shadow py-5 px-3 mx-3">
					<div class="text-center">
						<img src="<?=base_url();?>assets/img/login.png" style="pointer-events: none; width: 50%; height: auto;">
					</div>
				  	<div class="card-body">
				  		<h3 class="card-title text-center py-2"><strong>SIGN IN</strong></h3>
				  		<?php if($this->input->get('err') == null) : ?>
						<?php elseif($this->input->get('err') == 0) : ?>
							<div class="alert alert-danger" role="alert" id="redirected_login_alert">
							  You have entered an invalid username or password.
							</div>
						<?php elseif($this->input->get('err') == 2) : ?>
							<div class="alert alert-danger" role="alert" id="redirected_login_alert">
							  You account has been deactivated. If you violated a policy, consider this a warning or you will be permanently blocked from the website.
							</div>
						<?php elseif($this->input->get('err') == 3) : ?>
							<div class="alert alert-danger" role="alert" id="redirected_login_alert">
							  Account permanently banned.
							</div>
						<?php endif; ?>
				  		<div class="alert" id="auth_alert">
				  		</div>
				    	<?= form_open('auth/login','id="login" novalidate'); ?>
						<div class="form-group py-2">
						  	<label for="username" class="sr-only">Username</label>
						  	<div class="input-group">
				                <input type="text" class="form-control border-top-0 border-right-0 border-left-0" id="username" placeholder="Username" required autofocus>
				                <div class="input-group-append">
				                  <span class="input-group-text bg-transparent border-top-0 border-right-0 border-left-0">
				                      <svg class="bi bi-person-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor">
				                        <path fill-rule="evenodd" d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"/>
				                      </svg>
				                    </span>
				                </div>
			              	</div>
					  	</div>
						<div class="form-group py-2">
						  	<label for="password" class="sr-only">Password</label>
						  	<div class="input-group">
				                <input type="password" class="form-control border-top-0 border-right-0 border-left-0" id="password" placeholder="Password" required>
				                <div class="input-group-append">
				                  	<span class="input-group-text bg-transparent border-top-0 border-right-0 border-left-0" id="toggle">
				                      	<i class="fa fa-eye-slash"></i>
				                    </span>
				                </div>
			              	</div>
					  	</div>
						<button class="btn btn-warning btn-block rounded-pill text-white mt-4" type="submit" id="btnLogin">LOGIN</button>
						<?= form_close(); ?>
				  	</div>
				  	<small class="text-center pt-3 px-3">Not a member? <a href="<?= base_url() ?>">Sign up here</a></small>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="sticky-bottom bg-dark">
	<small class="d-flex justify-content-center container">
		<span class="text-white mx-2">HereForU © 2020</span>
		<a href="http://about.hereforu.com/hereforyou/cookies" class="text-white mx-2">Cookies</a>
        <a href="http://about.hereforu.com/hereforyou/privacy" class="text-white mx-2">Privacy</a>
        <a href="http://about.hereforu.com/hereforyou/policy" class="text-white mx-2">Policy</a>
        <a href="http://about.hereforu.com/hereforyou/terms" class="text-white mx-2">Terms</a>
        <a href="http://about.hereforu.com/hereforyou/developer" class="text-white mx-2">Developer</a>
	</small>
</div>
<?php $this->load->view('includes/footer'); ?>