<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta property="og:image" content="<?= base_url() ?>assets/img/thumb.png" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="<?= current_url() ?>" />
    <meta property="og:title" content="<?= str_replace("/ ","",$title); ?>" />
    <meta property="og:description" content="Click here to read the content." />
	<title>Here For U <?= $title ?></title>
	<link rel="icon" href="<?= base_url() ?>assets/img/logo-w.png" type="image/gif" sizes="16x16">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css">
	<!-- <?php if($this->uri->segment(1) === "login") : ?>
		<link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/css/login.css">
	<?php endif; ?> -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/placeholder-loading/dist/css/placeholder-loading.min.css"/>
	<link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/css/custom.css">
	<!-- <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/css/dark-mode.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/css/bs-tagsinput.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/css/heart-switch.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/css/efface.css"> -->
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body class="wall">