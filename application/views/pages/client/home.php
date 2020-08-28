<?php $this->load->view('includes/header'); ?>
<div class="home">
	<nav class="navbar navbar-light" style="background-color: #79d1d5;">
	  <div class="container">
	  	<span class="navbar-brand mb-0 h1 text-white">
		  <img src="assets/img/logo-w.png" width="30" height="30" class="d-inline-block align-top">
		  HereForU
			</span>
			<div class="d-block d-sm-none">
				<small class="text-decoration-none text-white">Already have an account? <a href="login">Sign in here</a></small>
			</div>
			<div class="d-none d-xl-block">
				<?= form_open('auth/login', 'class="form-inline" id="login" novalidate'); ?>
					<div class="form-group">
						<label for="username" class="sr-only">Username</label>
						<div class="input-group input-group-sm mr-2">
						    <div class="input-group-prepend">
						      <div class="input-group-text">@</div>
						    </div>
						<input type="text" name="username" id="username" class="form-control form-control-sm pr-2" placeholder="Username" autofocus required>
						</div>
					</div>
					<div class="form form-group">
						<label for="password" class="sr-only">Password</label>
						<input type="password" name="password" id="password" class="form-control form-control-sm pr-2 mr-2" placeholder="Password" required>
					</div>
					<button class="btn btn-warning btn-sm my-2 my-sm-0 text-white" type="submit" id="btnLogin">Log In</button>
				</form>
			</div>
	  </div>
	</nav>
	<div class="container mt-3">
		<div class="row vh-100">
			<div class="col-lg-5 d-flex align-items-center px-5">
				<div class="row">
					<div class="col-12">
						<h1><strong>Sign Up</strong></h1>
						<p class="lead">The secret to happiness is freedom and the secret to freedom is courage.</p>
						<div class="row py-sm-2">
							<div class="col-12">
								<?= form_open('auth/register', 'id="register" novalidate'); ?>
								  	<div class="form-group">
									  	<label for="reg_username">Username</label>
									  	<div id="check_username" class="float-right">
									  	</div>
									  	<input type="text" name="reg_username" id="reg_username" class="form-control" maxlength="12" required>
									  	<small class="form-text text-muted">Must be 5-12 characters long.</small>
								  	</div>
								  	<div class="form-group">
									  	<label for="reg_password">Password</label>
									  	<input type="password" name="reg_password" id="reg_password" class="form-control" required autocomplete="new-password">
								  	</div>
								  	<button type="submit" class="btn btn-dark btn-block mt-4 mb-3" id="btnRegister">Register</button>
								<?= form_close(); ?>
								<div class="row py-sm-2">
									<div class="col-12">
										<small>You can also <a href="" class="" id="btnGuest">Login as Guest</small></a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-7 d-flex justify-content-center align-items-center">
				<img src="<?=base_url();?>assets/img/home.png" class="img-fluid" style="pointer-events: none;">
			</div>
		</div>
	</div>
	<div class="sticky-bottom bg-dark">
		<small class="d-flex justify-content-center container">
			<span class="text-white mx-2">HereForU © 2020</span>
			<a href="http://about.hereforu.com/hereforyou/" target="_blank" class="text-white mx-2">About</a>
			<a href="http://about.hereforu.com/hereforyou/cookies" target="_blank" class="text-white mx-2">Cookies</a>
	        <a href="http://about.hereforu.com/hereforyou/privacy" target="_blank" class="text-white mx-2">Privacy</a>
	        <a href="http://about.hereforu.com/hereforyou/policy" target="_blank" class="text-white mx-2">Policy</a>
	        <a href="http://about.hereforu.com/hereforyou/terms" target="_blank" class="text-white mx-2">Terms</a>
	        <a href="http://about.hereforu.com/hereforyou/developer" target="_blank" class="text-white mx-2">Developer</a>
		</small>
	</div>
</div>
<?php $this->load->view('includes/footer'); ?>