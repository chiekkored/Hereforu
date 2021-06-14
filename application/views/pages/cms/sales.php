<?php $this->load->view('includes/cms/header'); ?>
<?php $this->load->view('includes/cms/nav'); ?>
<?php $this->load->view('includes/cms/modals/sales/view'); ?>
<div class="pt-3 pb-2 mb-3 border-bottom">
  <div class="row justify-content-between align-items-center">
    <div class="col">
      <h2 class="font-weight-bold">Sales</h2>
    </div>
    <div class="col">
      <div class="row">
        <div class="col-12 text-right">
          <small class="text-muted font-italic">TOTAL SALES</small>
          <h2 class="font-weight-bold text-info" id="sales_today">₱ 0</h2>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="card bg-light">
  <div class="card-body">
    <h6><small><strong class="text-muted">SALES SUMMARY</strong></small></h6>
    <div id="toolbar">
      <input type="date" class="form-control" value="<?= date('Y-m-d') ?>" id="sales_date" />
    </div>
    <table
      class="table table-borderless table-striped table-sm"
      id="tblSales"
      data-toggle="table"
      data-toolbar="#toolbar"
      data-sortable="true"
      data-search="true"
      data-url="sales/get">
      <thead class="thead-dark">
        <tr>
          <th data-formatter="Status" data-width="25">Status</th>
          <th data-field="name" data-width="150" data-sortable="true">Name</th>
          <th data-field="count">Pcs</th>
          <th data-field="price" data-formatter="Price">Total</th>
          <th data-field="operate" data-formatter="TableActions" data-events="operateEvents">Action</th>
        </tr>
      </thead>
    </table>
  </div>
</div>
<?php $this->load->view('includes/cms/footer'); ?>