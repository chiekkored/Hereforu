<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<link rel="icon" href="<?= base_url() ?>assets/img/logo-w.png" type="image/gif" sizes="16x16">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/css/custom.css">
<title>404 Page Not Found</title>
<style type="text/css">

.home {
	background-color: #FFBD1D;
}

.wall {
	background-color: #e9e9e9;
}
</style>
</head>
<body>
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
</body>
</html>