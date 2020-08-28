<?php $this->load->view('includes/header'); ?>
<div class="home">
	<div class="container">
		<div class="row vh-100">
			<div class="col-12 text-center align-self-center">
				<div class="row d-flex justify-content-center align-items-center">
					<div class="col-12 py-3 mx-3">
						<h2><strong>404 Page Not Found</strong></h2>
						<p class="lead">The page you are looking for was not found.</p>
						<a href="<?= base_url() ?>" class="btn btn-dark rounded-pill"><small><strong>GO HOME</strong></small></a>
					</div>
				</div>
				<div class="row d-flex justify-content-center align-items-center">
					<div class="col-lg-6 col-sm-12 py-5">
						<img src="<?=base_url();?>assets/img/notfound.png" class="img-fluid">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $this->load->view('includes/footer'); ?>