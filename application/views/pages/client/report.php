<?php $this->load->view('includes/header'); ?>
<?php $this->load->view('includes/nav'); ?>
<div class="modal" tabindex="-1" role="dialog" id="reportsuccess" data-backdrop="static">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Report bug</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Your report has been submitted. Thank you for contacting us.</p>
      </div>
    </div>
  </div>
</div>
<div class="container">
	<div class="row">
		<div class="col-lg-8 col-sm-12">
			<div class="card mx-3 mt-3">
				<div class="card-body">
					<div class="row">
						<div class="col-12">
							<h5 class="text-muted">
								<strong>Report</strong>
							</h5>
						</div>
					</div>
				</div>
			</div>
			<div class="card mx-3 my-3">
				<div class="card-body">
					<div class="row my-3">
						<small class="col-12">
							<?= form_open('report/post', 'id="post" novalidate'); ?>
						  	<div class="form-group">
						    	<label for="content">Describe the bug</label>
							    <textarea class="form-control" id="content" placeholder="From what page, describe the bug you think we need to fix and what errors you saw." rows="4" required></textarea>
							    <small class="text-muted">You will be redirected to home after you submit successfully.</small>
						  	</div>
						  	<button type="button" class="btn btn-primary" id="btnSubmit">Submit</button>
							<?= form_close() ?>
						</small>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-4 d-none d-lg-block">
			<div class="card mx-1 my-3">
				<div class="card-body">
					<div class="row border-bottom ">
						<div class="col-12">
							<h5>Contact Me</h5>
						</div>
					</div>
					<div class="row my-3">
						<div class="col-12">
							<small><p><b>Emai:</b> chiekkored@gmail.com</p></small>
						</div>
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