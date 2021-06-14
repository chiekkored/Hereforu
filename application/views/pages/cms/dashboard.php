<?php $this->load->view('includes/cms/header'); ?>
<?php $this->load->view('includes/cms/nav'); ?>
<div class="pt-3 pb-2 mb-3 border-bottom">
  <div class="row justify-content-between align-items-center">
    <div class="col">
      <h2 class="font-weight-bold">Dashboard</h2>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-6">
    <div class="card">
      <div class="card-body">
        <small class="text-muted font-weight-bold">Daily Sales</small>
        <div id="daily_sales"></div>
      </div>
    </div>
  </div>
  <div class="col-6">
    <div class="card">
      <div class="card-body">
        <small class="text-muted font-weight-bold">Daily Miners</small>
        <div id="daily_miners"></div>
      </div>
    </div>
  </div>
</div>
<?php $this->load->view('includes/cms/footer'); ?>