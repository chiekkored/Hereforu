    </main>
  </div>
</div>
</body>
	<script>
	  feather.replace()
	</script>
	<!-- JS, Popper.js, and jQuery -->
	<script src="<?= base_url() ?>assets/js/jquery-3.5.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
	<script src="<?= base_url() ?>assets/js/bs-validate.js"></script>
	<script src="https://unpkg.com/bootstrap-table@1.16.0/dist/bootstrap-table.min.js"></script>
	<script src="https://unpkg.com/bootstrap-table@1.18.2/dist/extensions/group-by-v2/bootstrap-table-group-by.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
	<script src="https://unpkg.com/bootstrap-table@1.16.0/dist/extensions/auto-refresh/bootstrap-table-auto-refresh.min.js"></script>
	<?php if ($this->uri->segment(1) === "dashboard"): ?>
		<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
		<script src="<?= base_url() ?>assets/js/cms.js"></script>
	<?php endif ?>
	<?php if ($this->uri->segment(1) === "sell"): ?>
		<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.js"></script>
		<script src="<?= base_url() ?>assets/js/cms-sell.js"></script>
	<?php endif ?>

	<?php if ($this->uri->segment(1) === "sales"): ?>
		<script src="<?= base_url() ?>assets/js/cms-sales.js"></script>
	<?php endif ?>

	<?php if ($this->uri->segment(1) === "customers"): ?>
		<script src="<?= base_url() ?>assets/js/cms-customers.js"></script>
	<?php endif ?>
	
</html>